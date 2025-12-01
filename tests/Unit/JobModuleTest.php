<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Job;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobModuleTest extends TestCase
{
    use RefreshDatabase; // Resets DB for each test

    public function test_job_can_be_created()
    {
        $response = $this->post('/jobs', [
            'job_title' => 'Software Engineer',
            'company_name' => 'ABC Corp',
            'job_type' => 'Full-time',
            'description' => 'Job description',
            'dateline' => '2025-12-31',
        ]);

        $response->assertRedirect('/jobs');
        $this->assertDatabaseHas('jobs', [
            'job_title' => 'Software Engineer',
        ]);
    }

    public function test_job_can_be_updated()
    {
        $job = Job::factory()->create();

        $response = $this->put("/jobs/{$job->id}", [
            'job_title' => 'Updated Title',
            'company_name' => $job->company_name,
            'job_type' => $job->job_type,
            'description' => $job->description,
            'dateline' => $job->dateline,
        ]);

        $response->assertRedirect('/jobs');
        $this->assertDatabaseHas('jobs', [
            'id' => $job->id,
            'job_title' => 'Updated Title',
        ]);
    }

    public function test_job_can_be_deleted()
    {
        $job = Job::factory()->create();

        $response = $this->delete("/jobs/{$job->id}");
        $response->assertRedirect('/jobs');
        $this->assertDatabaseMissing('jobs', [
            'id' => $job->id,
        ]);
    }

    public function test_jobs_index_displays_jobs()
    {
        $job = Job::factory()->create();

        $response = $this->get('/jobs');
        $response->assertStatus(200);
        $response->assertSee($job->job_title);
    }
}
