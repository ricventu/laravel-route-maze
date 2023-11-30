<?php

use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\assertEquals;

it('parameters', function () {
    Route::maze(__DIR__.'/Controllers/Invoke', 'Ricventu\\RouteMaze\\Tests\\Controllers\\Invoke');
    $routes = Route::getRoutes()->getRoutes();
    assertEquals(2, count($routes));
    assertEquals('invoke', $routes[0]->uri);
    assertEquals('invoke', $routes[0]->getName());
    assertEquals('invoke-post', $routes[1]->getName());
    assertEquals('invoke-post', $routes[1]->uri);
});
