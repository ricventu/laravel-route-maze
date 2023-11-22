<?php

use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\assertCount;

it('disabled controller', function () {
    Route::maze(__DIR__.'/Controllers/Disabled', 'Ricventu\\RouteMaze\\Tests\\Controllers\\Disabled');
    $routes = Route::getRoutes()->getRoutes();

    assertCount(1, $routes);

});
