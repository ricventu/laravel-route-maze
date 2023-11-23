<?php

namespace Ricventu\RouteMaze\Tests\Controllers\Abstract;

use Ricventu\RouteMaze\Methods\Get;

class ImplController extends AbstractController
{
    #[Get]
    public function show($id)
    {
    }
}
