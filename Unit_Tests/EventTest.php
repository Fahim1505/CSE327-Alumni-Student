<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function event_can_be_created()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/events', [
            'title' => 'Freshers Meetup',
            'date' => '2025-12-10',
            'venue' => 'NSU Plaza'
        ]);

        $response->assertRedirect('/events');
        $this->assertDatabaseHas('events', [
            'title' => 'Freshers Meetup'
        ]);
    }

    /** @test */
    public function event_can_be_updated()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $event = Event::factory()->create();

        $response = $this->put("/events/{$event->id}", [
            'title' => 'Updated Event',
            'date' => $event->date,
            'venue' => $event->venue
        ]);

        $response->assertRedirect('/events');
        $this->assertDatabaseHas('events', ['title' => 'Updated Event']);
    }

    /** @test */
    public function event_can_be_deleted()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $event = Event::factory()->create();

        $response = $this->delete("/events/{$event->id}");

        $response->assertRedirect('/events');
        $this->assertDatabaseMissing('events', ['id' => $event->id]);
    }
}
