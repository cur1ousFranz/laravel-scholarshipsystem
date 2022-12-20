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
        $school = SchoolCourse::all();
        $index = rand(0, 183);

        return [
            'applicants_id' => '',
            'desired_school' => $school[$index]->school,
            'course_name' => $school[$index]->course,
            'created_at' => now(),
        ];
    }
}
