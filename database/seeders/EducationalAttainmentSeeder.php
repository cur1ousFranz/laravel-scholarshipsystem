<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EducationalAttainmentSeeder extends Seeder
{

    public function run()
    {
        DB::table('educational_attainments')->insert([
            'name' => 'Primary'
        ]);

        DB::table('educational_attainments')->insert([
            'name' => 'Junior Highschool'
        ]);

        DB::table('educational_attainments')->insert([
            'name' => 'Senior Highschool'
        ]);

        DB::table('educational_attainments')->insert([
            'name' => 'Senior Highschool Graduating'
        ]);

        DB::table('educational_attainments')->insert([
            'name' => 'ALS Graduate'
        ]);

        DB::table('educational_attainments')->insert([
            'name' => 'College Level'
        ]);

        DB::table('educational_attainments')->insert([
            'name' => 'Associate Degree'
        ]);

        DB::table('educational_attainments')->insert([
            'name' => 'College Graduate'
        ]);

        DB::table('educational_attainments')->insert([
            'name' => 'Post Graduate'
        ]);

        DB::table('educational_attainments')->insert([
            'name' => 'Doctoral'
        ]);
    }
}
