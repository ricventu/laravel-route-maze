<?php

use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\assertEquals;

it('Test Params In Path', function () {
    Route::maze(__DIR__.'/Controllers/TestParamsInPath', 'Ricventu\\RouteMaze\\Tests\\Controllers\\TestParamsInPath');
    assertEquals('/first/params/second', route('params', ['param1' => 'first', 'param2' => 'second'], false));
    $this->get(route('params', ['param1' => 'first', 'param2' => 'second']))->assertSee('first, second');
});
