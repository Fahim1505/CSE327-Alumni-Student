<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Alumni;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_register_successfully()
    {
        $response = $this->post('/register/store', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'reg_no' => 'CSE-123',
            'department' => 'CSE',
            'graduation_year' => '2020',
        ]);

        $response->assertStatus(302);                  // redirected
        $response->assertSessionHas('success');         // session message
        $this->assertDatabaseHas('alumnis', [           // check DB
            'email' => 'john@example.com',
        ]);
    }
}
