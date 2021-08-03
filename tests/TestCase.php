<?php

namespace Tests;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Notification;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp();
        Notification::fake();
    }

    //Todo-splx: change versioning error
//todo: Тестирование контроллеров в Laravel https://code.tutsplus.com/ru/tutorials/testing-laravel-controllers--net-31456
//    public function __call($method, $args)
//    {
//        if (in_array($method, ['get', 'post', 'put', 'patch', 'delete']))
//        {
//            return $this->call($method, $args[0]);
//        }
//
//        throw new BadMethodCallException;
//    }
}
