<?php

namespace Ricventu\RouteMaze\Tests\Controllers\Readme\SomeCategory;

use Illuminate\Http\Request;
use Ricventu\RouteMaze\Attributes\Delete;
use Ricventu\RouteMaze\Attributes\Get;
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

    #[Put]
    public function update($id, Request $request)
    {
    }

    #[Delete]
    public function destroy($id)
    {
    }
}
