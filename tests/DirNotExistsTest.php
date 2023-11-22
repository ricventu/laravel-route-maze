<?php

use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\assertCount;

it('not exists', function () {
    Route::maze(__DIR__.'/Controllers/NotExists', 'Ricventu\\RouteMaze\\Tests\\Controllers\\NotExists');
    $routes = Route::getRoutes()->getRoutes();

    assertCount(0, $routes);

});
