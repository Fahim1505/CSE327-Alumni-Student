<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_redirects_to_jobs(): void
    {
        $response = $this->get('/');

        $response->assertStatus(302);          // Expect redirect
        $response->assertRedirect('/jobs');    // Check it redirects to /jobs
    }
}
