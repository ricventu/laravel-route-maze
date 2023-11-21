<?php


use Illuminate\Support\Facades\Route;
use function PHPUnit\Framework\assertEquals;

it('level2', function () {
    Route::maze(__DIR__ . '/../src/Testing/Controllers/Test4', 'Ricventu\\RouteMaze\\Testing\\Controllers\\Test4');
    $this->get(route('test5'))->assertSee('Test5Controller@index');
    $this->get(route('test5.show'))->assertSee('Test5Controller@getShow');
    $this->post(route('test5.store'))->assertSee('Test5Controller@postStore');
    $this->delete(route('test5.delete'))->assertSee('Test5Controller@deleteDelete');
});
