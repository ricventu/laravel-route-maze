<?php

namespace Ricventu\RouteMaze\Testing\Controllers\Test3;

class Test3bController
{
    public function get()
    {
        return class_basename(static::class.'@'.__FUNCTION__);
    }

    public function post()
    {
        return class_basename(static::class.'@'.__FUNCTION__);
    }

    public function delete()
    {
        return class_basename(static::class.'@'.__FUNCTION__);
    }
}
