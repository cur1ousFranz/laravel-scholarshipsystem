<?php

namespace Database\Factories;

use App\Models\EducationalAttainment;
use App\Models\Nationality;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Applicant>
 */
class ApplicantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = ['Male', 'Female'];
        $civil_status = ['Single', 'Married', 'Widowed', 'Divorced'];
        $nationality = ['Yes', 'No'];
        $education = ['Yes', 'No'];
        $family_income = [8000, 12000, 16000, 20000, 24000];
        $registered_voter = ['Yes', 'No'];

        return [
            'users_id' => User::factory(),
            'first_name' => $this->faker->name,
            'middle_name' => $this->faker->name,
            'last_name' => $this->faker->name,
            'age' => rand(16, 30),
            'gender' => $gender[rand(0,1)],
            'civil_status' => $civil_status[rand(0,3)],
            'nationality' => $nationality[rand(0,1)],
            'educational_attainment' => $education[rand(0,1)],
            'years_in_city' => rand(1, 5),
            'family_income' => $family_income[rand(0, 4)],
            'registered_voter' => $registered_voter[rand(0, 1)],
            'gwa' => rand(70, 99),
            'created_at' => now(),
        ];
    }
}
