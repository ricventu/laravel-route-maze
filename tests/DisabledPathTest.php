<?php

use Illuminate\Support\Facades\Route;
use function PHPUnit\Framework\assertCount;

it('disabled path', function () {
    Route::maze(__DIR__.'/Controllers/DisablePath', 'Ricventu\\RouteMaze\\Tests\\Controllers\\DisablePath');
    $routes = Route::getRoutes()->getRoutes();
    assertCount(1, $routes);

});
