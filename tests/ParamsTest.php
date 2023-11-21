<?php

use Illuminate\Support\Facades\Route;

it('parameters', function () {
    Route::maze(__DIR__.'/../src/Testing/Controllers/Test7', 'Ricventu\\RouteMaze\\Testing\\Controllers\\Test7');
    $this->get(route('test-params', ['id' => 'myId']))->assertSee('TestParamsController@index:myId');
});
