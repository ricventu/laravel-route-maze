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

        if (! $filesystem->exists($directory)) {
            return;
        }

        $namespace = str($namespace);

        foreach ($filesystem->allFiles($directory) as $file) {

            $class = (string) $namespace
                ->append('\\', $file->getRelativePathname())
                ->replace(['/', '.php'], ['\\', '']);

            if (! class_exists($class)) {
                continue;
            }

            $reflection = new ReflectionClass($class);
            if ($reflection->isAbstract()) {
                continue;
            }

            if (
                method_exists($class, 'isDiscovered') &&
                (! $class::isDiscovered())
            ) {
                continue;
            }

            $prefix = str($class)->afterLast('\\')->replace('Controller', '')->snake('-');

            Route::prefix($prefix)->name($prefix)
                ->group(function () use ($reflection, $class) {
                foreach ($reflection->getMethods(ReflectionMethod::IS_PUBLIC & ~ReflectionMethod::IS_STATIC) as $method) {
                    if ($method->isConstructor()) {
                        continue;
                    }
                    if ($method->getName() == '__invoke') {
                        Route::get('/', $class);
                        continue;
                    }
                }
            });
        }
    }

}
