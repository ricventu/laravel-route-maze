<?php

use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\assertEquals;

it('parameters', function () {
    Route::maze(__DIR__.'/Controllers/TestParams', 'Ricventu\\RouteMaze\\Tests\\Controllers\\TestParams');
    $routes = Route::getRoutes()->getRoutes();
    assertEquals('params/{id}', $routes[0]->uri);
    assertEquals('params/get/{id1}/{id2}', $routes[1]->uri);
});
