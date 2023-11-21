<?php

namespace Ricventu\RouteMaze;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Ricventu\RouteMaze\Commands\RouteMazeCommand;

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
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-route-maze_table')
            ->hasCommand(RouteMazeCommand::class);
    }
}
