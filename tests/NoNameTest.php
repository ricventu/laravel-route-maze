<?php

use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\assertCount;
use function PHPUnit\Framework\assertEquals;

it('no name controller', function () {
    Route::maze(__DIR__.'/Controllers/NoNameController', 'Ricventu\\RouteMaze\\Tests\\Controllers\\NoNameController');
    $routes = Route::getRoutes()->getRoutes();
    assertCount(4, $routes);
    assertEquals('products', $routes[0]->uri);
    assertEquals('products', $routes[0]->getName());
    assertEquals('products/list-products', $routes[1]->uri);
    assertEquals('products.list-products', $routes[1]->getName());
    assertEquals('/', $routes[2]->uri);
    assertEquals('', $routes[2]->getName());
    assertEquals('list-products', $routes[3]->uri);
    assertEquals('list-products', $routes[3]->getName());
});
