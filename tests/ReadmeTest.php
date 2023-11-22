<?php

use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\assertEquals;

it('Readme example', function () {
    Route::maze(__DIR__.'/Controllers/Readme', 'Ricventu\\RouteMaze\\Tests\\Controllers\\Readme');
    $routes = Route::getRoutes()->getRoutes();
    assertEquals(5, count($routes));
    assertEquals('some-category/products', $routes[0]->uri);
    assertEquals('some-category.products', $routes[0]->getName());
    assertEquals('Ricventu\RouteMaze\Tests\Controllers\Readme\SomeCategory\ProductsController@index', $routes[0]->action['controller']);
    assertEquals(['GET', 'HEAD'], $routes[0]->methods);
    assertEquals('some-category/products/show/{id}', $routes[1]->uri);
    assertEquals('some-category.products.show', $routes[1]->getName());
    assertEquals('Ricventu\RouteMaze\Tests\Controllers\Readme\SomeCategory\ProductsController@show', $routes[1]->action['controller']);
    assertEquals(['GET', 'HEAD'], $routes[1]->methods);
    assertEquals('some-category/products/store', $routes[2]->uri);
    assertEquals('some-category.products.store', $routes[2]->getName());
    assertEquals('Ricventu\RouteMaze\Tests\Controllers\Readme\SomeCategory\ProductsController@store', $routes[2]->action['controller']);
    assertEquals(['POST'], $routes[2]->methods);
    assertEquals('some-category/products/update/{id}', $routes[3]->uri);
    assertEquals('some-category.products.update', $routes[3]->getName());
    assertEquals('Ricventu\RouteMaze\Tests\Controllers\Readme\SomeCategory\ProductsController@update', $routes[3]->action['controller']);
    assertEquals(['POST'], $routes[3]->methods);
    assertEquals('some-category/products/destroy/{id}', $routes[4]->uri);
    assertEquals('some-category.products.destroy', $routes[4]->getName());
    assertEquals('Ricventu\RouteMaze\Tests\Controllers\Readme\SomeCategory\ProductsController@destroy', $routes[4]->action['controller']);
    assertEquals(['POST'], $routes[4]->methods);
});
