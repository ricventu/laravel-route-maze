<?php

namespace Ricventu\RouteMaze\Attributes;

use Illuminate\Support\Str;
use Ricventu\RouteMaze\Attributes\Contracts\RouteMethod;

#[\Attribute] abstract class Method implements RouteMethod
{
    public function getMethods(): array|string
    {
        return Str::upper(class_basename(static::class));
    }
}
