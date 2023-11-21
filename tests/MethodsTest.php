<?php

use Illuminate\Support\Facades\Route;

it('methods', function () {
    Route::maze(__DIR__.'/../src/Testing/Controllers/Test3', 'Ricventu\\RouteMaze\\Testing\\Controllers\\Test3');
    $this->get(route('test3'))->assertSee('Test3Controller@index');
    $this->get(route('test3.show'))->assertSee('Test3Controller@getShow');
    $this->post(route('test3.store'))->assertSee('Test3Controller@postStore');
    $this->delete(route('test3.delete'))->assertSee('Test3Controller@deleteDelete');
});
