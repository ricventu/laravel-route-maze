<?php

namespace Ricventu\RouteMaze\Tests\Controllers\Test6\Test6a\Test6b;

class Test6Controller
{
    public function index()
    {
        return class_basename(static::class.'@'.__FUNCTION__);
    }

    public function getShow()
    {
        return class_basename(static::class.'@'.__FUNCTION__);
    }

    public function postStore()
    {
        return class_basename(static::class.'@'.__FUNCTION__);
    }

    public function deleteDelete()
    {
        return class_basename(static::class.'@'.__FUNCTION__);
    }
}
