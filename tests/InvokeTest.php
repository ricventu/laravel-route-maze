<?php

use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\assertEquals;

it('parameters', function () {
    Route::maze(__DIR__.'/Controllers/Invoke', 'Ricventu\\RouteMaze\\Tests\\Controllers\\Invoke');
    $routes = Route::getRoutes()->getRoutes();
    assertEquals('invoke', $routes[0]->uri);
});
