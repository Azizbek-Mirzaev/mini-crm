<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LeadTest extends TestCase
{
public function test_user_cannot_open чужой_лид()
{
    $users = User::factory(2)->create();
    $lead = Lead::factory()->create(['assigned_to' => $users[0]->id]);

    $this->actingAs($users[1])
        ->get(route('leads.show', $lead))
        ->assertForbidden();
}
}
