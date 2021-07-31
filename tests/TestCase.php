<?php

namespace Tests;

use BadMethodCallException;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    //Todo-splx: change versioning error
//todo: Тестирование контроллеров в Laravel https://code.tutsplus.com/ru/tutorials/testing-laravel-controllers--net-31456
    public function __call($method, $args)
    {
        if (in_array($method, ['get', 'post', 'put', 'patch', 'delete']))
        {
            return $this->call($method, $args[0]);
        }

        throw new BadMethodCallException;
    }
}
