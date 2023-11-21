<?php

use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\assertEquals;

it('Index', function () {
    Route::maze(__DIR__.'/Controllers/Test1', 'Ricventu\\RouteMaze\\Tests\\Controllers\\Test1');
    assertEquals('/test1', route('test1', absolute: false));
    $this->get(route('test1'))->assertSee('Test1Controller');
});

it('Invokable', function () {
    Route::maze(__DIR__.'/Controllers/Test2', 'Ricventu\\RouteMaze\\Tests\\Controllers\\Test2');
    assertEquals('/test2', route('test2', absolute: false));
    $this->get(route('test2'))->assertSee('Test2Controller');
});
