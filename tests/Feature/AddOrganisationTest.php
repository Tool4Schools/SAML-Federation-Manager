<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Testing\File;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\Models\Organisation;

class AddOrganisationTest extends TestCase
{
    use RefreshDatabase;

    private function validParams($overrides =  [])
    {
        return array_merge([
            'name' => 'Tools4Schools',
            'description' => 'Tools4Schools is an organisation providing all the ICT tools needed to operate an educational institution',
            'url' => 'https://tools4schools.org',
        ],$overrides);
    }

    /** @test */
    public function guest_can_view_the_organisation_registration_form()
    {
        $response = $this->get('/organisation/registration');

        $response->assertStatus(200);
    }

    /** @test */
    public function adding_a_valid_organisation()
    {
        $response = $this->post('/organisation/registration',[
            'name' => 'Tools4Schools',
            'description' => 'Tools4Schools provides all ICT needs for schools',
            'url' => 'https://tools4schools.org',
        ]);

        tap(Organisation::first(), function ($organisation)use ($response){
            $response->assertRedirect("/auth/login");

            $this->assertEquals('Tools4Schools',$organisation->name);
            $this->assertEquals('Tools4Schools provides all ICT needs for schools',$organisation->description);
            $this->assertEquals('https://tools4schools.org',$organisation->url);
        });
    }

    /** @test */
    public function name_is_required()
    {
        $response = $this->from(url('/organisation/registration'))->post('/organisation/registration',$this->validParams([
            'name' => '',
        ]));
        $response->assertStatus(302);
        $response->assertRedirect('/organisation/registration');
        $response->assertSessionHasErrors('name');
        $this->assertEquals(0, Organisation::count());
    }

    /** @test */
    public function description_is_required()
    {
        $response = $this->from(url('/organisation/registration'))->post('/organisation/registration',$this->validParams([
            'description' => '',
        ]));
        $response->assertStatus(302);
        $response->assertRedirect('/organisation/registration');
        $response->assertSessionHasErrors('description');
        $this->assertEquals(0, Organisation::count());
    }

    /** @test */
    public function url_is_required()
    {
        $response = $this->from(url('/organisation/registration'))->post('/organisation/registration',$this->validParams([
            'url' => '',
        ]));
        $response->assertStatus(302);
        $response->assertRedirect('/organisation/registration');
        $response->assertSessionHasErrors('url');
        $this->assertEquals(0, Organisation::count());
    }

    /**   */
    /*public function logo_is_uploaded_if_included()
    {
        $this->withoutExceptionHandling();
        Storage::fake('public');
        $file = File::image('logo.png',400,400);

        $response = $this->from(url('/organisation/registration'))->post('/organisation/registration',$this->validParams([
            'logo' => $file,
        ]));

        tap(Organisation::first(), function ($organisation) use ($file){
            $this->assertNotNull($organisation->logo_url);

            Storage::disk('public')->assertExists($organisation->logo_url);
            $this->assertFileEquals(
                $file->getPathname(),
                Storage::disk('public')->path($organisation->logo_url)
            );
        });
    }*/

}
