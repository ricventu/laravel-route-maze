<?php


use Illuminate\Support\Facades\Route;
use function PHPUnit\Framework\assertEquals;

it('level3', function () {
    Route::maze(__DIR__ . '/../src/Testing/Controllers/Test6', 'Ricventu\\RouteMaze\\Testing\\Controllers\\Test6');
    $this->get(route('test4.test5'))->assertSee('Test5Controller@index');
    $this->get(route('test4.test5.show'))->assertSee('Test5Controller@getShow');
    $this->post(route('test4.test5.store'))->assertSee('Test5Controller@postStore');
    $this->delete(route('test4.test5.delete'))->assertSee('Test5Controller@deleteDelete');
});
