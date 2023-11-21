<?php

use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\assertEquals;

it('Index', function () {
    Route::maze(__DIR__.'/../src/Testing/Controllers/Test1', 'Ricventu\\RouteMaze\\Testing\\Controllers\\Test1');
    assertEquals('/', route('test1', absolute: false));
    $this->get(route('test1'))->assertSee('Test1Controller');
});

it('Invokable', function () {
    Route::maze(__DIR__.'/../src/Testing/Controllers/Test2', 'Ricventu\\RouteMaze\\Testing\\Controllers\\Test2');
    assertEquals('/', route('test2', absolute: false));
    $this->get(route('test2'))->assertSee('Test2Controller');
});
