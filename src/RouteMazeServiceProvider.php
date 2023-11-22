<?php

namespace Ricventu\RouteMaze;

use Illuminate\Routing\Router;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class RouteMazeServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-route-maze')
            ->hasConfigFile();
    }

    public function packageRegistered()
    {
        app(Router::class)->macro('maze', function (string $directory, string $namespace) {
            return \Ricventu\RouteMaze\Facades\RouteMaze::maze($directory, $namespace);
        });
    }
}
