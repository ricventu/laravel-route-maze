<?php

use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\assertEquals;

it('middlewares', function () {
    Route::maze(__DIR__.'/Controllers/TestMiddlewares', 'Ricventu\\RouteMaze\\Tests\\Controllers\\TestMiddlewares');
    assertEquals(['auth'], Route::getRoutes()->getRoutes()[0]->getAction()['middleware']);
});
