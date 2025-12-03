<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Announcement;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AnnouncementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function announcement_can_be_created()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/announcements', [
            'subject' => 'Holiday Notice',
            'date' => '2025-12-10',
            'description' => 'Campus will remain closed.'
        ]);

        $response->assertRedirect('/announcements');
        $this->assertDatabaseHas('announcements', [
            'subject' => 'Holiday Notice'
        ]);
    }

    /** @test */
    public function announcement_can_be_updated()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $announcement = Announcement::factory()->create();

        $response = $this->put("/announcements/{$announcement->id}", [
            'subject' => 'Updated Subject',
            'date' => $announcement->date,
            'description' => $announcement->description
        ]);

        $response->assertRedirect('/announcements');
        $this->assertDatabaseHas('announcements', [
            'subject' => 'Updated Subject'
        ]);
    }

    /** @test */
    public function announcement_can_be_deleted()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $announcement = Announcement::factory()->create();

        $response = $this->delete("/announcements/{$announcement->id}");

        $response->assertRedirect('/announcements');
        $this->assertDatabaseMissing('announcements', [
            'id' => $announcement->id
        ]);
    }
}
