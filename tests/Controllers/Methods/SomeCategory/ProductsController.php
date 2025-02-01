<?php

namespace Ricventu\RouteMaze\Tests\Controllers\Methods\SomeCategory;

use Illuminate\Http\Request;
use Ricventu\RouteMaze\Methods\Delete;
use Ricventu\RouteMaze\Methods\Get;
use Ricventu\RouteMaze\Methods\Patch;
use Ricventu\RouteMaze\Methods\Post;
use Ricventu\RouteMaze\Methods\Put;

class ProductsController
{
    public function index() {}

    #[Get]
    public function show($id) {}

    #[Post]
    public function store(Request $request) {}

    #[Patch]
    public function update($id, Request $request) {}

    #[Put]
    public function set($id, Request $request) {}

    #[Delete]
    public function destroy($id) {}
}
