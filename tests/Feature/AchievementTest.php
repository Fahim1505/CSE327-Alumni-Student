<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Achievement;

class AchievementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_achievement_can_be_created()
    {
        $data = [
            'title' => 'Dean’s Merit Award',
            'category' => 'Academic Excellence',
            'description' => 'Outstanding performance in Software Engineering.',
            'date_achieved' => '2024-12-10',
        ];

        $response = $this->post('/achievements', $data);

        $response->assertRedirect('/achievements');
        $this->assertDatabaseHas('achievements', ['title' => 'Dean’s Merit Award']);
    }

    /** @test */
    public function achievements_can_be_listed()
    {
        Achievement::factory()->create(['title' => 'Test Achievement']);

        $response = $this->get('/achievements');

        $response->assertSee('Test Achievement');
    }

    /** @test */
    public function an_achievement_can_be_updated()
    {
        $achievement = Achievement::factory()->create();

        $response = $this->put("/achievements/{$achievement->id}", [
            'title' => 'Updated Title',
            'category' => $achievement->category,
            'description' => $achievement->description,
            'date_achieved' => $achievement->date_achieved,
        ]);

        $response->assertRedirect('/achievements');
        $this->assertDatabaseHas('achievements', ['title' => 'Updated Title']);
    }

    /** @test */
    public function an_achievement_can_be_deleted()
    {
        $achievement = Achievement::factory()->create();

        $response = $this->delete("/achievements/{$achievement->id}");

        $response->assertRedirect('/achievements');
        $this->assertDatabaseMissing('achievements', ['id' => $achievement->id]);
    }
}
