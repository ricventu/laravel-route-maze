<?php


use Illuminate\Support\Facades\Route;
use function PHPUnit\Framework\assertEquals;

it('level 1 __invoke', function () {

    Route::maze(__DIR__.'/../src/Testing/Level1', 'Ricventu\\RouteMaze\\Testing\\Level1');
    assertEquals(route('invoke', absolute: false), '/invoke');
    $this->get('/invoke')->assertSee('InvokeController');
});
