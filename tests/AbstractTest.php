<?php

use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\assertCount;
use function PHPUnit\Framework\assertEquals;

it('not exists', function () {
    Route::maze(__DIR__.'/Controllers/Abstract', 'Ricventu\\RouteMaze\\Tests\\Controllers\\Abstract');
    $routes = Route::getRoutes()->getRoutes();
    assertCount(2, $routes);

    assertEquals('impl', $routes[1]->uri);
    assertEquals('impl', $routes[1]->getName());
    assertEquals('Ricventu\RouteMaze\Tests\Controllers\Abstract\ImplController@show', $routes[0]->action['controller']);
    assertEquals(['GET', 'HEAD'], $routes[1]->methods);
    assertEquals('impl/show/{id}', $routes[0]->uri);
    assertEquals('impl.show', $routes[0]->getName());
    assertEquals('Ricventu\RouteMaze\Tests\Controllers\Abstract\ImplController@index', $routes[1]->action['controller']);
    assertEquals(['GET', 'HEAD'], $routes[0]->methods);
});
