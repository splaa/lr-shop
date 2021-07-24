<?php

namespace Tests\Unit\Http;

use Illuminate\Http\JsonResponse;
use PHPUnit\Framework\TestCase;

class JsonResponseTest extends TestCase
{
    //todo: v-10 time: 00:29:00
    public function testInt(): void
    {
        $response = new JsonResponse(12);
        self::assertEquals('12', $response->getContent());
        self::assertEquals('200', $response->getStatusCode());
    }
}
