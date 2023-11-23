<?php

namespace Ricventu\RouteMaze\Methods;

#[\Attribute] class Get extends Method
{
    public function getMethods(): array|string
    {
        return ['GET', 'HEAD'];
    }
}
