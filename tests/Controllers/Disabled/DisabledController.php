<?php

namespace Ricventu\RouteMaze\Tests\Controllers\Disabled;

class DisabledController
{
    public function __invoke() {}

    public static function mazeDisabled(): bool
    {
        return true;
    }
}
