<?php

namespace Ricventu\RouteMaze\Tests\Controllers\Test2;

class Test2Controller
{
    public function __invoke()
    {
        return class_basename(static::class);
    }
}
