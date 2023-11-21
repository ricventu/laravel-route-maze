<?php

namespace Ricventu\RouteMaze\Tests\Controllers\Test1;

class Test1Controller
{
    public function index()
    {
        return class_basename(static::class);
    }
}
