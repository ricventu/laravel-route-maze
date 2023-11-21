<?php

namespace Ricventu\RouteMaze\Tests\Controllers\TestMiddlewares;

class MiddlewareController
{
    public function index()
    {
        return class_basename(static::class.'@'.__FUNCTION__);
    }
}
