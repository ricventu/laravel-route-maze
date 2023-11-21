<?php

namespace Ricventu\RouteMaze\Testing\Level1;

class InvokeController
{
    public function __invoke()
    {
        return 'InvokeController';
    }
}