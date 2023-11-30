<?php

namespace Ricventu\RouteMaze\Tests\Controllers\Invoke;

use Ricventu\RouteMaze\Methods\Post;

class InvokePostController
{
    #[Post]
    public function __invoke()
    {
    }
}
