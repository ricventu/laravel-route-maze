<?php

namespace Ricventu\RouteMaze\Tests\Controllers\TestParams;

use Illuminate\Http\Request;
use Ricventu\RouteMaze\Attributes\Get;

class ParamsController
{
    public function index(string $id, Request $request)
    {
    }

    #[Get]
    public function get(string $id1, int $id2, Request $request)
    {
    }
}
