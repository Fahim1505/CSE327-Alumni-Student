<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_login_with_valid_credentials()
    {
        // Create dummy user
        $user = User::factory()->create([
            'password' => bcrypt('12345'),
        ]);

        // Attempt login
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => '12345',
        ]);

        $response->assertStatus(302);       // redirected
        $response->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function login_fails_with_wrong_password()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong',
        ]);

        $response->assertSessionHasErrors();
        $this->assertGuest();
    }
}
