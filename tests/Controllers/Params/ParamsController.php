<?php

namespace Ricventu\RouteMaze\Tests\Controllers\Params;

use Illuminate\Http\Request;
use Ricventu\RouteMaze\Methods\Get;

class ParamsController
{
    public function index(string $id, Request $request)
    {
    }

    #[Get]
    public function get(string $id1, int $id2, Request $request)
    {
    }

    #[Get]
    public function getCustomRequest(string $id1, int $id2, CustomRequest $request)
    {
    }
}
