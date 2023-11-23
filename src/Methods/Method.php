<?php

namespace Ricventu\RouteMaze\Methods;

use Illuminate\Support\Str;
use Ricventu\RouteMaze\Methods\Contracts\RouteMethod;

abstract class Method implements RouteMethod
{
    public function getMethods(): array|string
    {
        return Str::upper(class_basename(static::class));
    }
}
