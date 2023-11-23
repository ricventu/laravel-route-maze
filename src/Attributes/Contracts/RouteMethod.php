<?php

namespace Ricventu\RouteMaze\Attributes\Contracts;

interface RouteMethod
{
    public function getMethods(): string|array;
}