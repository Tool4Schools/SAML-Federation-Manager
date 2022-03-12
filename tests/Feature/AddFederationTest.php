<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddFederationTest extends TestCase
{
    use RefreshDatabase;

    private function validParams($overrides =  [])
    {
        return array_merge([
        ],$overrides);
    }

    /** @test */
    public function user_can_view_federation_creation_form()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('federation/create');

        $response->assertStatus(200);
    }

    /** @test */
    public function guest_cannot_view_federation_creation_form()
    {
        $response = $this->get('federation/create');
        $response->assertStatus(302);
        $response->assertRedirect('/auth/login');
    }
}
