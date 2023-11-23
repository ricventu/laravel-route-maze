<?php

use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\assertEquals;

it('extends controller', function () {
    Route::maze(__DIR__.'/Controllers/ExtendsController', 'Ricventu\\RouteMaze\\Tests\\Controllers\\ExtendsController');
    $routes = Route::getRoutes()->getRoutes();
    assertEquals(1, count($routes));
});
