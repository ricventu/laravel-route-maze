<?php

use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\assertCount;
use function PHPUnit\Framework\assertEquals;

it('ignore path', function () {
    Route::maze(__DIR__.'/Controllers/IgnorePath', 'Ricventu\\RouteMaze\\Tests\\Controllers\\IgnorePath');
    $routes = Route::getRoutes()->getRoutes();
    assertCount(2, $routes);
    assertEquals('products', $routes[0]->uri);
    assertEquals('products', $routes[0]->getName());
    assertEquals('not-ignored-path/products', $routes[1]->uri);
    assertEquals('not-ignored-path.products', $routes[1]->getName());
});
