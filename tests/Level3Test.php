<?php

use Illuminate\Support\Facades\Route;
use function PHPUnit\Framework\assertEquals;

it('level3', function () {
    Route::maze(__DIR__.'/Controllers/Test6', 'Ricventu\\RouteMaze\\Tests\\Controllers\\Test6');
    assertEquals('/test6a/test6b/test6', route('test6a.test6b.test6', absolute: false));
    $this->get(route('test6a.test6b.test6'))->assertSee('Test6Controller@index');
    assertEquals('/test6a/test6b/test6/show', route('test6a.test6b.test6.show', absolute: false));
    $this->get(route('test6a.test6b.test6.show'))->assertSee('Test6Controller@getShow');
    assertEquals('/test6a/test6b/test6/store', route('test6a.test6b.test6.store', absolute: false));
    $this->post(route('test6a.test6b.test6.store'))->assertSee('Test6Controller@postStore');
    assertEquals('/test6a/test6b/test6/delete', route('test6a.test6b.test6.delete', absolute: false));
    $this->delete(route('test6a.test6b.test6.delete'))->assertSee('Test6Controller@deleteDelete');
});
