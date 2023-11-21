<?php

namespace Ricventu\RouteMaze\Tests\Controllers\Test3;

class Test3Controller
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
