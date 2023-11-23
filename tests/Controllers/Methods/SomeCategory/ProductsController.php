<?php

namespace Ricventu\RouteMaze\Tests\Controllers\Methods\SomeCategory;

use Illuminate\Http\Request;
use Ricventu\RouteMaze\Attributes\Delete;
use Ricventu\RouteMaze\Attributes\Get;
use Ricventu\RouteMaze\Attributes\Patch;
use Ricventu\RouteMaze\Attributes\Post;
use Ricventu\RouteMaze\Attributes\Put;

class ProductsController
{
    public function index()
    {
    }

    #[Get]
    public function show($id)
    {
    }

    #[Post]
    public function store(Request $request)
    {
    }

    #[Patch]
    public function update($id, Request $request)
    {
    }

    #[Put]
    public function set($id, Request $request)
    {
    }

    #[Delete]
    public function destroy($id)
    {
    }
}
