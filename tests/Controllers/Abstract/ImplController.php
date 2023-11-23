<?php

namespace Ricventu\RouteMaze\Tests\Controllers\Abstract;

use Ricventu\RouteMaze\Attributes\Get;

class ImplController extends AbstractController
{
    #[Get]
    public function show($id)
    {
    }
}
