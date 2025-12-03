<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\JobListing;

class JobListingFactory extends Factory
{
    protected $model = JobListing::class;

    public function definition()
    {
        return [
            'job_title' => $this->faker->jobTitle(),
            'company_name' => $this->faker->company(),
            'job_type' => 'Full-time',
            'description' => $this->faker->paragraph(),
            'dateline' => $this->faker->date('Y-m-d', '+1 year'),
        ];
    }
}
