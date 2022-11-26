<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'applicants_id' => '',
            'contact_number' => $this->faker->numerify,
            'email' => $this->faker->unique()->email(),
            'created_at' => now(),
        ];
    }
}
