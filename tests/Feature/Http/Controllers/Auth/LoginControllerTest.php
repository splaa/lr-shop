<?php

namespace Tests\Feature\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

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
    /** @test */
    public function login_authenticates_and_redirects_user()
    {
        $user = User::factory()->create();

        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $response->assertRedirect(route('home'));
        $this->assertAuthenticatedAs($user);
    }

}
