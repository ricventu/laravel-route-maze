<?php

use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\assertEquals;

it('parameters', function () {
    Route::maze(__DIR__.'/Controllers/Index', 'Ricventu\\RouteMaze\\Tests\\Controllers\\Index');
    $routes = Route::getRoutes()->getRoutes();
    assertEquals('index', $routes[0]->uri);
});
