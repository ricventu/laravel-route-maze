<?php

namespace Ricventu\RouteMaze\Tests\Controllers\Test7;

use Illuminate\Http\Request;

class TestParamsController
{
    public function index($id, Request $request)
    {
        return class_basename(static::class).'@'.__FUNCTION__.':'.$id;
    }
}
