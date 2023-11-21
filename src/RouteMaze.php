<?php

namespace Ricventu\RouteMaze;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use ReflectionClass;
use ReflectionMethod;

class RouteMaze
{
    public function maze(string $directory, string $namespace)
    {
        $this->registerRoutes($directory, $namespace, collect());
    }

    protected function registerRoutes(string $directory, string $namespace, Collection $pathParameters): void
    {
        /** @var Filesystem $filesystem */
        $filesystem = app(Filesystem::class);

        if (!$filesystem->exists($directory)) {
            return;
        }

        $namespace = str($namespace);

        foreach ($filesystem->directories($directory) as $subDirectory) {
            $name = str(basename($subDirectory));

            if ($name->startsWith('_') && $name->endsWith('_')) {
                $parameterName = $name->between('_', '_');
                $pathParameters->push($parameterName);
                Route::prefix("{" . $parameterName . "}")
                    ->group(function () use ($subDirectory, $namespace, $pathParameters) {
                        $this->registerRoutes($subDirectory, $namespace->append('\\', basename($subDirectory)), $pathParameters);
                    });
            } else {
                $name = $name->snake('-');
                Route::name($name . '.')
                    ->prefix($name)
                    ->group(function () use ($subDirectory, $namespace, $pathParameters) {
                        $this->registerRoutes($subDirectory, $namespace->append('\\', basename($subDirectory)), $pathParameters);
                    });
            }
        }

        foreach ($filesystem->files($directory) as $file) {
            $class = (string)$namespace
                ->append('\\', $file->getRelativePathname())
                ->replace(['/', '.php'], ['\\', '']);

            if (!str($class)->endsWith('Controller')) {
                continue;
            }

            if (!class_exists($class)) {
                continue;
            }

            $reflection = new ReflectionClass($class);
            if ($reflection->isAbstract()) {
                continue;
            }
            if (
                method_exists($class, 'mazeDisabled') &&
                (!$class::makeDisabled())
            ) {
                continue;
            }

            $routeName = str($class)->afterLast('\\')->replace('Controller', '')->snake('-');
            $routePath = str($routeName);

            foreach ($reflection->getMethods(ReflectionMethod::IS_PUBLIC & ~ReflectionMethod::IS_STATIC) as $method) {
                if ($method->isConstructor()) {
                    continue;
                }
                $route = null;
                $methodName = str($method->getName());

                if ($methodName->is('__invoke')) {
                    $route = Route::get((string)$routePath->append($this->getParameters($method, $pathParameters)), $class);
                    if ($routeName->isNotEmpty()) {
                        $route->name((string)$routeName);
                    }
                } elseif ($methodName->is('index')) {
                    $route = Route::get((string)$routePath->append($this->getParameters($method, $pathParameters)), [$class, 'index']);
                    if ($routeName->isNotEmpty()) {
                        $route->name((string)$routeName);
                    }
                } else {
                    foreach (['get', 'post', 'delete'] as $action) {
                        if ($methodName->startsWith($action)) {
                            $name = $methodName->after($action)->snake('-');
                            if ($name->isEmpty()) {
                                $name = str($action);
                                $path = str($routePath);
                            } else {
                                $path = $routePath->append('/', $name);
                            }
                            Route::$action(
                                $path->append((string)$this->getParameters($method, $pathParameters)),
                                [$class, (string)$methodName]
                            )
                                ->name($routeName->isEmpty() ? $name : $routeName . '.' . $name);
                        }
                    }
                }
            }
        }
    }

    public function getParameters(ReflectionMethod $method, Collection $pathParameters)
    {
        $parameters = str('');
        foreach ($method->getParameters() as $parameter) {
            $parameterName = $parameter->getName();
            $parameterType = $parameter->getType();
            if ($parameterType instanceof \ReflectionNamedType) {
                $parameterType = $parameterType->getName();
            }
            if ($parameterType === Request::class) {
                continue;
            }
            if ($pathParameters->contains($parameterName)) {
                continue;
            }
            $parameters = $parameters->append('/{', $parameterName, '}');
        }

        return $parameters;
    }
}
