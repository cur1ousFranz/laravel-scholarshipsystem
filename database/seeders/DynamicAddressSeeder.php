<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DynamicAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /** GENERAL SANTOS CITY */

        DB::table('barangays')->insert([
            'barangay' => 'Apopong',
        ]);

        DB::table('barangays')->insert([
            'barangay' => 'Baluan',

        ]);

        DB::table('barangays')->insert([
            'barangay' => 'Batomelong',

        ]);

        DB::table('barangays')->insert([
            'barangay' => 'Buayan',

        ]);

        DB::table('barangays')->insert([
            'barangay' => 'Bula',

        ]);

        DB::table('barangays')->insert([
            'barangay' => 'Calumpang',

        ]);

        DB::table('barangays')->insert([
            'barangay' => 'City Heights',

        ]);

        DB::table('barangays')->insert([
            'barangay' => 'Conel',

        ]);

        DB::table('barangays')->insert([
            'barangay' => 'Dadiangas East',

        ]);

        DB::table('barangays')->insert([
            'barangay' => 'Dadiangas North',

        ]);

        DB::table('barangays')->insert([
            'barangay' => 'Dadiangas South',

        ]);

        DB::table('barangays')->insert([
            'barangay' => 'Dadiangas West',

        ]);

        DB::table('barangays')->insert([
            'barangay' => 'Fatima',

        ]);

        DB::table('barangays')->insert([
            'barangay' => 'Katangawan',

        ]);

        DB::table('barangays')->insert([
            'barangay' => 'Labangal',

        ]);

        DB::table('barangays')->insert([
            'barangay' => 'Lagao (1st & 3rd)',

        ]);

        DB::table('barangays')->insert([
            'barangay' => 'Ligaya',

        ]);

        DB::table('barangays')->insert([
            'barangay' => 'Mabuhay',

        ]);

        DB::table('barangays')->insert([
            'barangay' => 'Olympog',

        ]);

        DB::table('barangays')->insert([
            'barangay' => 'San Isidro (Lagao 2nd)',

        ]);

        DB::table('barangays')->insert([
            'barangay' => 'San Jose',

        ]);

        DB::table('barangays')->insert([
            'barangay' => 'Siguel',

        ]);

        DB::table('barangays')->insert([
            'barangay' => 'Sinawal',

        ]);

        DB::table('barangays')->insert([
            'barangay' => 'Tambler',

        ]);

        DB::table('barangays')->insert([
            'barangay' => 'Tinagacan',

        ]);

        DB::table('barangays')->insert([
            'barangay' => 'Upper Labay',

        ]);

    }
}
