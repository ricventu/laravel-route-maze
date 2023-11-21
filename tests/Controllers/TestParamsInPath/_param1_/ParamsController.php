<?php

namespace Ricventu\RouteMaze\Tests\Controllers\TestParamsInPath\_param1_;

class ParamsController
{
    public function __invoke($param1, $param2)
    {
        return "$param1, $param2";
    }
}