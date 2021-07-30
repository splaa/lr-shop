<?php

namespace Tests\Http\Controllers;

use App\Http\Controllers\HomeController;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
use WithFaker;

    public function testIndex(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('home'));

        $response->assertStatus(200);
    }

    public function testNotAsignUser()
    {
        $user = User::make([
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => Hash::make('password')
         ]);

        $response = $this->actingAs($user)->get(route('home'));

        $response->assertStatus(200);
    }
}
