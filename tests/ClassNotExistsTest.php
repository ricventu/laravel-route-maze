<?php

use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\assertCount;

it('class exists', function () {
    Route::maze(__DIR__.'/Controllers/ClassNotExists', 'Ricventu\\RouteMaze\\Tests\\Controllers\\ClassNotExists');
    $routes = Route::getRoutes()->getRoutes();

    assertCount(0, $routes);

});
