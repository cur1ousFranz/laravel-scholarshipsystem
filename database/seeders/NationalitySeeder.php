<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NationalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nationalities')->insert([
            'name' => 'Afghan'
        ]);

        DB::table('nationalities')->insert([
            'name' => 'American'
        ]);

        DB::table('nationalities')->insert([
            'name' => 'Australian'
        ]);
        DB::table('nationalities')->insert([
            'name' => 'Bahamian'
        ]);

        DB::table('nationalities')->insert([
            'name' => 'Bahraini'
        ]);

        DB::table('nationalities')->insert([
            'name' => 'Bangladeshi'
        ]);

        DB::table('nationalities')->insert([
            'name' => 'Cambodian'
        ]);

        DB::table('nationalities')->insert([
            'name' => 'Chinese'
        ]);

        DB::table('nationalities')->insert([
            'name' => 'Canadian'
        ]);

        DB::table('nationalities')->insert([
            'name' => 'Dominican'
        ]);

        DB::table('nationalities')->insert([
            'name' => 'Egyptian'
        ]);

        DB::table('nationalities')->insert([
            'name' => 'Ethiopian'
        ]);

        DB::table('nationalities')->insert([
            'name' => 'Filipino'
        ]);

        DB::table('nationalities')->insert([
            'name' => 'French'
        ]);

        DB::table('nationalities')->insert([
            'name' => 'German'
        ]);

        DB::table('nationalities')->insert([
            'name' => 'Hungarian'
        ]);

        DB::table('nationalities')->insert([
            'name' => 'Indonesian'
        ]);

        DB::table('nationalities')->insert([
            'name' => 'Italian'
        ]);

        DB::table('nationalities')->insert([
            'name' => 'Jamaican'
        ]);

        DB::table('nationalities')->insert([
            'name' => 'Japanese'
        ]);

        DB::table('nationalities')->insert([
            'name' => 'Mexican'
        ]);

        DB::table('nationalities')->insert([
            'name' => 'Malaysian'
        ]);

        DB::table('nationalities')->insert([
            'name' => 'Pakistani'
        ]);

        DB::table('nationalities')->insert([
            'name' => 'Portuguese'
        ]);

        DB::table('nationalities')->insert([
            'name' => 'Romanian'
        ]);

        DB::table('nationalities')->insert([
            'name' => 'Russian'
        ]);

        DB::table('nationalities')->insert([
            'name' => 'South Korean'
        ]);

        DB::table('nationalities')->insert([
            'name' => 'Singaporean'
        ]);

        DB::table('nationalities')->insert([
            'name' => 'Taiwanese'
        ]);

        DB::table('nationalities')->insert([
            'name' => 'Zambian'
        ]);

    }
}
