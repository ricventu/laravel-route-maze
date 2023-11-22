<?php

namespace Ricventu\RouteMaze\Tests\Controllers\TestParams;


use Illuminate\Http\Request;

class ParamsController
{
    public function index(string $id, Request $request)
    {
    }

    public function get(string $id1, int $id2, Request $request)
    {
    }
}