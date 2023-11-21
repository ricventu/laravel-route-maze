<?php

use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\assertEquals;

it('level2', function () {
    Route::maze(__DIR__.'/../src/Testing/Controllers/Test4', 'Ricventu\\RouteMaze\\Testing\\Controllers\\Test4');
    assertEquals('/test5', route('test5', absolute: false));
    $this->get(route('test5'))->assertSee('Test5Controller@index');
    assertEquals('/test5/show', route('test5.show', absolute: false));
    $this->get(route('test5.show'))->assertSee('Test5Controller@getShow');
    assertEquals('/test5/store', route('test5.store', absolute: false));
    $this->post(route('test5.store'))->assertSee('Test5Controller@postStore');
    assertEquals('/test5/delete', route('test5.delete', absolute: false));
    $this->delete(route('test5.delete'))->assertSee('Test5Controller@deleteDelete');
});
