<?php

namespace Tests\Feature\Http\Controllers\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    public function testShowLoginFor(): void
    {
        $response = $this->get(route('login'));

        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewIs('auth.login');
    }

    public function testLoginDisplayValidationErrors(): void
    {
        $response = $this->post(route('login', []));
        $response->assertStatus(Response::HTTP_FOUND);

        $response->assertSessionHasErrors('email');
    }
}
