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
        $civil_status = ['Single', 'Married', 'Widowed'];
        $nationality = ['Yes', 'No'];
        $education = ['Yes', 'No'];
        $family_income = [
            'Less than ₱10,957',
            '₱10,957 to ₱21,194',
            '₱21,194 to ₱43,828',
            '₱43,828 to ₱76,669',
            '₱76,669 to ₱131,484',
            '₱131,484 to ₱219,140',
            '₱219,140 and above'
        ];
        $registered_voter = ['Yes', 'No'];

        return [
            'users_id' => User::factory(),
            'first_name' => $this->faker->name,
            'middle_name' => $this->faker->name,
            'last_name' => $this->faker->name,
            'age' => rand(16, 30),
            'gender' => $gender[rand(0,1)],
            'civil_status' => $civil_status[rand(0,2)],
            // 'nationality' => $nationality[rand(0,1)],
            'nationality' => $nationality[0],
            // 'educational_attainment' => $education[rand(0,1)],
            'educational_attainment' => $education[0],
            'years_in_city' => rand(1, 3),
            'family_income' => $family_income[rand(0, 6)],
            // 'registered_voter' => $registered_voter[rand(0, 1)],
            'registered_voter' => $registered_voter[0],
            'gwa' => rand(70, 99),
            'created_at' => now(),
        ];
    }
}
