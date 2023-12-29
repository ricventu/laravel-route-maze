<?php

namespace Ricventu\RouteMaze;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Stringable;
use ReflectionClass;
use ReflectionMethod;
use Ricventu\RouteMaze\Methods\Method;

class RouteMaze
{
    public function maze(string $directory, string $namespace)
    {
        /** @var Filesystem $filesystem */
        $filesystem = app(Filesystem::class);

        if (! $filesystem->exists($directory)) {
            return;
        }
        $this->registerRoutesWithMiddlewares($filesystem, $directory, $namespace, collect());
    }

    protected function registerRoutesWithMiddlewares(Filesystem $filesystem, string $directory, string $namespace, Collection $pathParameters, string $namePrefix = ''): void
    {
        if ($filesystem->exists($directory.DIRECTORY_SEPARATOR.'middlewares.php')) {
            $middlewares = $filesystem->getRequire($directory.DIRECTORY_SEPARATOR.'middlewares.php');
            Route::middleware($middlewares)
                ->group(fn () => $this->registerRoutes($filesystem, $directory, $namespace, $pathParameters, $namePrefix));
        } else {
            $this->registerRoutes($filesystem, $directory, $namespace, $pathParameters, $namePrefix);
        }
    }

    protected function registerRoutes(Filesystem $filesystem, string $directory, string $namespace, Collection $pathParameters, string $namePrefix): void
    {
        $namespace = str($namespace);

        foreach ($filesystem->directories($directory) as $subDirectory) {
            $config = [];
            if ($filesystem->exists($subDirectory.DIRECTORY_SEPARATOR.'maze.php')) {
                $config = $filesystem->getRequire($subDirectory.DIRECTORY_SEPARATOR.'maze.php');
            }

            if (isset($config['disabled']) && $config['disabled']) {
                continue;
            }
            $directoryName = str(basename($subDirectory));

            if ($directoryName->startsWith('_') && $directoryName->endsWith('_')) {
                $parameterName = lcfirst($directoryName->between('_', '_'));
                $pathParameters->push($parameterName);
                Route::prefix('{'.$parameterName.'}')
                    ->group(fn () => $this->registerRoutesWithMiddlewares($filesystem, $subDirectory, $namespace->append('\\', basename($subDirectory)), $pathParameters));
            } else {
                if (isset($config['ignore_path_name']) && $config['ignore_path_name']) {
                    $this->registerRoutesWithMiddlewares($filesystem, $subDirectory, $namespace->append('\\', basename($subDirectory)), $pathParameters);

                    continue;
                }
                if ($filesystem->exists($subDirectory.DIRECTORY_SEPARATOR.'maze.php')) {
                    $config = $filesystem->getRequire($subDirectory.DIRECTORY_SEPARATOR.'maze.php');
                    if (isset($config['ignore_path_name']) && $config['ignore_path_name']) {
                        $this->registerRoutesWithMiddlewares($filesystem, $subDirectory, $namespace->append('\\', basename($subDirectory)), $pathParameters);

                        continue;
                    }
                }
                $directoryName = $directoryName->kebab();
                Route::name($namePrefix.$directoryName)
                    ->prefix($directoryName)
                    ->group(fn () => $this->registerRoutesWithMiddlewares($filesystem, $subDirectory, $namespace->append('\\', basename($subDirectory)), $pathParameters, '.'));
            }
        }

        foreach ($filesystem->files($directory) as $file) {
            $class = (string) $namespace
                ->append('\\', $file->getRelativePathname())
                ->replace(['/', '.php'], ['\\', '']);

            if (! str($class)->endsWith('Controller')) {
                continue;
            }

            if (! class_exists($class)) {
                continue;
            }

            $reflection = new ReflectionClass($class);
            if ($reflection->isAbstract()) {
                continue;
            }

            if (
                method_exists($class, 'mazeDisabled') &&
                ($class::mazeDisabled())
            ) {
                continue;
            }

            $classPrefix = str($class)->afterLast('\\')->replace('Controller', '')->kebab();

            foreach ($reflection->getMethods(ReflectionMethod::IS_PUBLIC & ~ReflectionMethod::IS_STATIC) as $method) {
                $route = null;
                $methodName = str($method->getName());

                if ($methodName->is(['__invoke', 'index'])) {
                    $routes = [];
                    foreach ($method->getAttributes() as $attribute) {
                        $attribute = $attribute->newInstance();
                        if (is_subclass_of($attribute, Method::class)) {
                            $routes[] = Route::addRoute(
                                $attribute->getMethods(),
                                (string) $classPrefix->append($this->getParameters($method, $pathParameters)),
                                [$class, (string) $methodName]
                            )->name((string) $classPrefix->prepend($namePrefix));
                        }
                    }
                    if (empty($routes)) {
                        // default to get
                        $route = Route::get((string) $classPrefix->append($this->getParameters($method, $pathParameters)), [$class, (string) $methodName]);
                        if ($classPrefix->isNotEmpty()) {
                            $route->name((string) $classPrefix->prepend($namePrefix));
                        }
                    }
                } else {
                    $this->addRoutesFromAttributes($class, $pathParameters, $method, $classPrefix, $methodName, $namePrefix);
                }
            }
        }
    }

    protected function addRoutesFromAttributes(string $class, Collection $pathParameters, ReflectionMethod $method, Stringable $classPrefix, Stringable $methodName, string $namePrefix): array
    {
        $routes = [];
        $routeName = $classPrefix->isEmpty() ? $methodName->kebab()->prepend($namePrefix) : $classPrefix->prepend($namePrefix)->append('.', $methodName->kebab());
        $uri = $classPrefix->append('/', $methodName->kebab(), $this->getParameters($method, $pathParameters));
        foreach ($method->getAttributes() as $attribute) {
            $attribute = $attribute->newInstance();
            if (is_subclass_of($attribute, Method::class)) {
                $routes[] = Route::addRoute(
                    $attribute->getMethods(),
                    (string) $uri,
                    [$class, (string) $methodName]
                )->name($routeName);
            }
        }

        return $routes;
    }

    protected function getParameters(ReflectionMethod $method, Collection $pathParameters)
    {
        $parameters = str('');
        foreach ($method->getParameters() as $parameter) {
            $parameterName = $parameter->getName();
            $parameterType = $parameter->getType();

            if ($pathParameters->contains($parameterName)) {
                continue;
            }

            if ($parameterType instanceof \ReflectionNamedType) {
                if (! $parameterType->isBuiltin()) {
                    if ($parameterType->getName() === Request::class) {
                        continue;
                    }
                    if (class_exists($parameterType->getName())) {
                        $reflection = new ReflectionClass($parameterType->getName());
                        if ($reflection->isAbstract()) {
                            continue;
                        }
                        if ($reflection->isSubclassOf(Request::class)) {
                            continue;
                        }
                    }
                }
            } elseif ($parameterName === 'request') {
                continue;
            }

            $parameters = $parameters->append('/{', $parameterName, '}');
        }

        return $parameters;
    }
}
