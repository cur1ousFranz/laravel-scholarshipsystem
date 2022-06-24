<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //php artisan db:seed --class=CourseSeeder
        DB::table('courses')->insert([
            'course_name' => 'Bachelor of Science in Information Technology'
        ]);

        DB::table('courses')->insert([
            'course_name' => 'Bachelor of Science in Computer Science'
        ]);

        DB::table('courses')->insert([
            'course_name' => 'Bachelor of Science in Computer Engineering'
        ]);

        DB::table('courses')->insert([
            'course_name' => 'Bachelor of Science in Information Systems'
        ]);

        DB::table('courses')->insert([
            'course_name' => 'Bachelor of Science in Information Science'
        ]);

        DB::table('courses')->insert([
            'course_name' => 'Bachelor of Science in Data Science'
        ]);

    }
}
