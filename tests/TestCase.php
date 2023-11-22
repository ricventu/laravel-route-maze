<?php

namespace Ricventu\RouteMaze\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Ricventu\RouteMaze\RouteMazeServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            RouteMazeServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        // config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-route-maze_table.php.stub';
        $migration->up();
        */
    }
}
