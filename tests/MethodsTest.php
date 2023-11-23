<?php

use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\assertEquals;

it('methods example', function () {
    Route::maze(__DIR__.'/Controllers/Methods', 'Ricventu\\RouteMaze\\Tests\\Controllers\\Methods');
    $routes = Route::getRoutes()->getRoutes();
    assertEquals(6, count($routes));

    assertEquals(['GET', 'HEAD'], $routes[0]->methods);
    assertEquals('some-category/products', $routes[0]->uri);
    assertEquals('some-category.products', $routes[0]->getName());
    assertEquals('Ricventu\RouteMaze\Tests\Controllers\Methods\SomeCategory\ProductsController@index', $routes[0]->action['controller']);

    assertEquals(['GET', 'HEAD'], $routes[1]->methods);
    assertEquals('some-category/products/show/{id}', $routes[1]->uri);
    assertEquals('some-category.products.show', $routes[1]->getName());
    assertEquals('Ricventu\RouteMaze\Tests\Controllers\Methods\SomeCategory\ProductsController@show', $routes[1]->action['controller']);

    assertEquals(['POST'], $routes[2]->methods);
    assertEquals('some-category/products/store', $routes[2]->uri);
    assertEquals('some-category.products.store', $routes[2]->getName());
    assertEquals('Ricventu\RouteMaze\Tests\Controllers\Methods\SomeCategory\ProductsController@store', $routes[2]->action['controller']);

    assertEquals(['PATCH'], $routes[3]->methods);
    assertEquals('some-category/products/update/{id}', $routes[3]->uri);
    assertEquals('some-category.products.update', $routes[3]->getName());
    assertEquals('Ricventu\RouteMaze\Tests\Controllers\Methods\SomeCategory\ProductsController@update', $routes[3]->action['controller']);

    assertEquals(['PUT'], $routes[4]->methods);
    assertEquals('some-category/products/set/{id}', $routes[4]->uri);
    assertEquals('some-category.products.set', $routes[4]->getName());
    assertEquals('Ricventu\RouteMaze\Tests\Controllers\Methods\SomeCategory\ProductsController@set', $routes[4]->action['controller']);

    assertEquals(['DELETE'], $routes[5]->methods);
    assertEquals('some-category/products/destroy/{id}', $routes[5]->uri);
    assertEquals('some-category.products.destroy', $routes[5]->getName());
    assertEquals('Ricventu\RouteMaze\Tests\Controllers\Methods\SomeCategory\ProductsController@destroy', $routes[5]->action['controller']);
});
