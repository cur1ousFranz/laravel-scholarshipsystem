<?php

namespace Database\Factories;

use App\Models\SchoolCourse;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\School>
 */
class SchoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $hei_type = ['Public', 'Private'];
        $school = SchoolCourse::all();
        $index = rand(0, 61);

        return [
            'applicants_id' => '',
            'desired_school' => $school[$index]->school,
            'course_name' => $school[$index]->course,
            'hei_type' => $hei_type[rand(0,1)],
            'school_last_attended' => $this->faker->sentence(),
            'created_at' => now(),
        ];
    }
}
