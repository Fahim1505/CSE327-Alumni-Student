<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\JobListing;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobListingTest extends TestCase
{
    use RefreshDatabase;

    public function test_job_listing_can_be_created()
    {
        $response = $this->post('/jobs', [
            'job_title' => 'Software Engineer',
            'company_name' => 'ABC Corp',
            'job_type' => 'Full-time',
            'description' => 'Job description',
            'dateline' => '2025-12-31',
        ]);

        $response->assertRedirect('/jobs');

        $this->assertDatabaseHas('job_listings', [
            'job_title' => 'Software Engineer',
        ]);
    }

    public function test_job_listing_can_be_updated()
    {
        $job = JobListing::factory()->create();

        $response = $this->put("/jobs/{$job->id}", [
            'job_title' => 'Updated Title',
            'company_name' => $job->company_name,
            'job_type' => $job->job_type,
            'description' => $job->description,
            'dateline' => $job->dateline,
        ]);

        $response->assertRedirect('/jobs');

        $this->assertDatabaseHas('job_listings', [
            'id' => $job->id,
            'job_title' => 'Updated Title',
        ]);
    }

    public function test_job_listing_can_be_deleted()
    {
        $job = JobListing::factory()->create();

        $response = $this->delete("/jobs/{$job->id}");

        $response->assertRedirect('/jobs');

        $this->assertDatabaseMissing('job_listings', [
            'id' => $job->id,
        ]);
    }

    public function test_jobs_index_displays_job_listings()
    {
        $job = JobListing::factory()->create();

        $response = $this->get('/jobs');

        $response->assertStatus(200);
        $response->assertSee($job->job_title);
    }
}
