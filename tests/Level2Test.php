<?php

use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\assertEquals;

it('level2', function () {
    Route::maze(__DIR__.'/Controllers/Test4', 'Ricventu\\RouteMaze\\Tests\\Controllers\\Test4');
    assertEquals('/test4b/test4', route('test4b.test4', absolute: false));
    $this->get(route('test4b.test4'))->assertSee('Test4Controller@index');
    assertEquals('/test4b/test4/show', route('test4b.test4.show.get', absolute: false));
    $this->get(route('test4b.test4.show.get'))->assertSee('Test4Controller@getShow');
    assertEquals('/test4b/test4/store', route('test4b.test4.store.post', absolute: false));
    $this->post(route('test4b.test4.store.post'))->assertSee('Test4Controller@postStore');
    assertEquals('/test4b/test4/delete', route('test4b.test4.delete.delete', absolute: false));
    $this->delete(route('test4b.test4.delete.delete'))->assertSee('Test4Controller@deleteDelete');
});
