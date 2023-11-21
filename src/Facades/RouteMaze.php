<?php

namespace Ricventu\RouteMaze\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Ricventu\RouteMaze\RouteMaze
 */
class RouteMaze extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Ricventu\RouteMaze\RouteMaze::class;
    }
}
