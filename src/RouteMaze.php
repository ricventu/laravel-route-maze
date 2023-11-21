<?php

namespace Ricventu\RouteMaze;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Livewire\Component;
use ReflectionClass;
use ReflectionMethod;
use Ricventu\RouteMaze\Tests\FakeData\Level1\Level1Controller;
use SplFileInfo;

class RouteMaze
{
    public function maze(string $directory, string $namespace)
    {
        $this->registerRoutes($directory, $namespace);
    }

    protected function registerRoutes(string $directory, string $namespace): void
    {
        $filesystem = app(Filesystem::class);

        if (!$filesystem->exists($directory)) {
            return;
        }

        $namespace = str($namespace);

        foreach ($filesystem->allFiles($directory) as $file) {

            $class = (string)$namespace
                ->append('\\', $file->getRelativePathname())
                ->replace(['/', '.php'], ['\\', '']);

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

            if (method_exists($class, 'mazeName')) {
                $routeName = str($class::mazeName());
            } else {
                $routeName = str($class)->afterLast('\\')->replace('Controller', '')->snake('-');
            }

            foreach ($reflection->getMethods(ReflectionMethod::IS_PUBLIC & ~ReflectionMethod::IS_STATIC) as $method) {
                if ($method->isConstructor()) {
                    continue;
                }
                $route = null;
                $methodName = str($method->getName());

                if ($methodName->is('__invoke')) {
                    $route = Route::get('/', $class);
                    if ($routeName->isNotEmpty()) {
                        $route->name($routeName->value());
                    }
                } else if ($methodName->is('index')) {
                    $route = Route::get('/', [$class, 'index']);
                    if ($routeName->isNotEmpty()) {
                        $route->name($routeName->value());
                    }
                } else if ($methodName->startsWith('get')) {
                    $this->addAction($methodName, $routeName, $class, 'get');
                } else if ($methodName->startsWith('post')) {
                    $this->addAction($methodName, $routeName, $class, 'post');
                } else if ($methodName->startsWith('delete')) {
                    $this->addAction($methodName, $routeName, $class, 'delete');
                }
            }
        }
    }

    public function addAction(mixed $methodName, mixed $routeName, string $class, string $method): void
    {
        $name = $methodName->after($method)->snake('-');
        Route::$method($routeName . '/' . $name, [$class, $methodName->value()])
            ->name($routeName->isEmpty() ? $name : $routeName . '.' . $name);
    }
}
