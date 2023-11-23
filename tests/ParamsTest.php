<?php

use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\assertCount;
use function PHPUnit\Framework\assertEquals;

it('parameters', function () {
    Route::maze(__DIR__ . '/Controllers/Params', 'Ricventu\\RouteMaze\\Tests\\Controllers\\Params');
    $routes = Route::getRoutes()->getRoutes();
    assertCount(3, $routes);
    assertEquals('params/{id}', $routes[0]->uri);
    assertEquals('params/get/{id1}/{id2}', $routes[1]->uri);
    assertEquals('params/get-custom-request/{id1}/{id2}', $routes[2]->uri);
});
