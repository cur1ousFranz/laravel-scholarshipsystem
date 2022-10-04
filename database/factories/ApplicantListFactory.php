<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ApplicantList>
 */
class ApplicantListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'applications_id' => 1, // change id for existing application
            'applicants_id' => '',
            'document' => '',
            'review' => null,
            'created_at' => '',
        ];
    }
}
