<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Organisation>
 */
class OrganisationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'Sample Organisation',
            'description' => 'Description about this great organisation',
            'url' => 'https://somwhere.onthenet.tld',
        ];
    }

    public function createUser($overrides = [])
    {
        $organisation = $this->create($overrides);

        return $organisation->users()->save(User::factory()->create());
    }
}
