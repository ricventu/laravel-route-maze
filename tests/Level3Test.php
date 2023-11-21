<?php

use Illuminate\Support\Facades\Route;
use function PHPUnit\Framework\assertEquals;

it('level3', function () {
    Route::maze(__DIR__.'/Controllers/Test6', 'Ricventu\\RouteMaze\\Tests\\Controllers\\Test6');
    assertEquals('/test4/test5', route('test4.test5', absolute: false));
    $this->get(route('test4.test5'))->assertSee('Test5Controller@index');
    assertEquals('/test4/test5/show', route('test4.test5.show', absolute: false));
    $this->get(route('test4.test5.show'))->assertSee('Test5Controller@getShow');
    assertEquals('/test4/test5/store', route('test4.test5.store', absolute: false));
    $this->post(route('test4.test5.store'))->assertSee('Test5Controller@postStore');
    assertEquals('/test4/test5/delete', route('test4.test5.delete', absolute: false));
    $this->delete(route('test4.test5.delete'))->assertSee('Test5Controller@deleteDelete');
});
