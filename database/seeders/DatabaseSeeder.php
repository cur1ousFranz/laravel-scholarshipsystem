<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\NationalitySeeder;
use Database\Seeders\SchoolCourseSeeder;
use Database\Seeders\DynamicAddressSeeder;
use Database\Seeders\EducationalAttainmentSeeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(DynamicAddressSeeder::class);
        $this->call(SchoolCourseSeeder::class);
        $this->call(NationalitySeeder::class);
        $this->call(EducationalAttainmentSeeder::class);
    }
}
