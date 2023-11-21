<?php

use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\assertEquals;

it('level2', function () {
    Route::maze(__DIR__.'/Controllers/Test4', 'Ricventu\\RouteMaze\\Tests\\Controllers\\Test4');
    assertEquals('/test4b/test4', route('test4b.test4', absolute: false));
    $this->get(route('test4b.test4'))->assertSee('Test4Controller@index');
    assertEquals('/test4b/test4/show', route('test4b.test4.show', absolute: false));
    $this->get(route('test4b.test4.show'))->assertSee('Test4Controller@getShow');
    assertEquals('/test4b/test4/store', route('test4b.test4.store', absolute: false));
    $this->post(route('test4b.test4.store'))->assertSee('Test4Controller@postStore');
    assertEquals('/test4b/test4/delete', route('test4b.test4.delete', absolute: false));
    $this->delete(route('test4b.test4.delete'))->assertSee('Test4Controller@deleteDelete');
});
