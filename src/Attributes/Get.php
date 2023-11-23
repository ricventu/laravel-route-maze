<?php

namespace Ricventu\RouteMaze\Attributes;


#[\Attribute] class Get extends Method
{
    public function getMethods(): array|string
    {
        return ['GET', 'HEAD'];
    }
}