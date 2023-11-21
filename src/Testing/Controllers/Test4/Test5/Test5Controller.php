<?php

namespace Ricventu\RouteMaze\Testing\Controllers\Test4\Test5;

class Test5Controller
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
