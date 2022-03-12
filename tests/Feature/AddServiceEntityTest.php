<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddServiceEntityTest extends TestCase
{
    use RefreshDatabase;

    private function validParams($overrides =  [])
    {
        return array_merge([
        ],$overrides);
    }

    /** @test */
    public function user_can_view_service_entity_creation_form()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('entity/create');

        $response->assertStatus(200);
    }

    /** @test */
    public function guest_cannot_view_service_entity_creation_form()
    {
        $response = $this->get('entity/create');
        $response->assertStatus(302);
        $response->assertRedirect('/auth/login');
    }
}
