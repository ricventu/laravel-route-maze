<?php

namespace Ricventu\RouteMaze\Attributes;

use Illuminate\Support\Str;
use Ricventu\RouteMaze\Attributes\Contracts\RouteMethod;

abstract class Method implements RouteMethod
{
    public function getMethods(): array|string
    {
        return Str::upper(class_basename(static::class));
    }
}
