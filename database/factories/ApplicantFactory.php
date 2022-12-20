<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Facades\DB;
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

        $family_incomes = DB::table('family_incomes')->first();
        $range = json_decode($family_incomes->range, true);
        $family_range = array();
        array_push($family_range, $range['bracket1']);
        array_push($family_range, $range['bracket2']);
        array_push($family_range, $range['bracket3']);
        array_push($family_range, $range['bracket4']);
        array_push($family_range, $range['bracket5']);
        array_push($family_range, $range['bracket6']);
        array_push($family_range, $range['bracket7']);

        $year = array('1997', '1998', '1999', '2000', '2001', '2002', '2003', '2004', '2005');

        return [
            'users_id' => User::factory(),
            'first_name' => $this->faker->name,
            'middle_name' => $this->faker->name,
            'last_name' => $this->faker->name,
            'birth_date' => $year[rand(0, 8)] .'-'. rand(1, 12) . '-' . rand(1, 31),
            'gender' => $gender[rand(0,1)],
            'civil_status' => $civil_status[rand(0,2)],
            'nationality' => 'Yes',
            'educational_attainment' => 'Yes',
            'years_in_city' => rand(1, 3),
            'family_income' => $family_range[rand(0, 6)],
            'registered_voter' => 'Yes',
            'gwa' => rand(75, 99),
            'created_at' => now(),
        ];
    }
}
