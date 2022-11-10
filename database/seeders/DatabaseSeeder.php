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
        $this->call(UserSeeder::class);
        $this->call(DynamicAddressSeeder::class);
        $this->call(SchoolCourseSeeder::class);
    }
}
