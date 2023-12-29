<?php

use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\assertEquals;

it('Test Params In Path', function () {
    Route::maze(__DIR__.'/Controllers/TestParamsInPath', 'Ricventu\\RouteMaze\\Tests\\Controllers\\TestParamsInPath');
    $routes = Route::getRoutes()->getRoutes();
    assertEquals('parent/{param1}/params/{param2}', $routes[0]->uri);
    assertEquals('parent.params', $routes[0]->getName());
    assertEquals('{param1}/params/{param2}', $routes[1]->uri);
    assertEquals('params', $routes[1]->getName());
});
