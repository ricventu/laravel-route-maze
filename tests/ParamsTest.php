<?php

use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\assertEquals;

it('parameters', function () {
    Route::maze(__DIR__.'/Controllers/Test7', 'Ricventu\\RouteMaze\\Tests\\Controllers\\Test7');
    assertEquals('/test-params/myId', route('test-params', ['id' => 'myId'], false));
    $this->get(route('test-params', ['id' => 'myId']))->assertSee('TestParamsController@index:myId');
});
