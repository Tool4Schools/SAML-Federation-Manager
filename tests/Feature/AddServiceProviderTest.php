<?php

namespace Tests\Feature;

use App\Models\Organisation;
use App\Models\ServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddServiceProviderTest extends TestCase
{
    use RefreshDatabase;

    private function validParams($overrides =  [])
    {
        return array_merge([
        ],$overrides);
    }

    /** @test */
    public function user_can_view_service_provider_creation_form()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('serviceprovider/create');

        $response->assertStatus(200);
    }

    /** @test */
    public function guest_cannot_view_service_provider_creation_form()
    {
        $response = $this->get('serviceprovider/create');
        $response->assertStatus(302);
        $response->assertRedirect('/auth/login');
    }

    /** @test */
    public function adding_a_valid_service_provider()
    {
        $this->withoutExceptionHandling();

        $user = Organisation::factory()->createUser();

        $response = $this->actingAs($user)->post('/serviceprovider',[
            'entity_id' => 'https://sso.tools4schools.ie/saml/idp',
            'type' => 'BOTH',
        ]);

        $response->assertStatus(302);

        tap(ServiceProvider::first(), function ($serviceprovider)use ($response){
            $response->assertRedirect("/serviceprovider/".$serviceprovider->id);

            $this->assertEquals('https://sso.tools4schools.ie/saml/idp',$serviceprovider->entity_id);
            $this->assertEquals('BOTH',$serviceprovider->type);
            //$this->assertEquals('https://tools4schools.org',$organisation->url);
        });
    }

}
