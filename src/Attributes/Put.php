<?php

namespace Ricventu\RouteMaze\Attributes;

#[\Attribute] class Put extends Method
{
    public function getMethods(): array|string
    {
        return ['PUT', 'PATCH'];
    }
}