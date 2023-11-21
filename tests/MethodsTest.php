<?php

use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\assertEquals;

it('named methods', function () {
    Route::maze(__DIR__.'/../src/Testing/Controllers/Test3', 'Ricventu\\RouteMaze\\Testing\\Controllers\\Test3');
    assertEquals('/test3', route('test3', absolute: false));
    $this->get(route('test3'))->assertSee('Test3Controller@index');
    assertEquals('/test3/show', route('test3.show', absolute: false));
    $this->get(route('test3.show'))->assertSee('Test3Controller@getShow');
    assertEquals('/test3/store', route('test3.store', absolute: false));
    $this->post(route('test3.store'))->assertSee('Test3Controller@postStore');
    assertEquals('/test3/delete', route('test3.delete', absolute: false));
    $this->delete(route('test3.delete'))->assertSee('Test3Controller@deleteDelete');
});

it('action based methods', function () {
    Route::maze(__DIR__.'/../src/Testing/Controllers/Test3', 'Ricventu\\RouteMaze\\Testing\\Controllers\\Test3');
    assertEquals('/test3b', route('test3b.get', absolute: false));
    $this->get(route('test3b.get'))->assertSee('Test3bController@get');
    assertEquals('/test3b', route('test3b.post', absolute: false));
    $this->post(route('test3b.post'))->assertSee('Test3bController@post');
    assertEquals('/test3b', route('test3b.delete', absolute: false));
    $this->delete(route('test3b.delete'))->assertSee('Test3bController@delete');
});
