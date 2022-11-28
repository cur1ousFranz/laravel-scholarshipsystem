<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FamilyIncomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $income = array();
        $income['bracket1'] = '10957';
        $income['bracket2'] = '10957-21194';
        $income['bracket3'] = '21194-43828';
        $income['bracket4'] = '43828-76669';
        $income['bracket5'] = '76669-131484';
        $income['bracket6'] = '131484-219140';
        $income['bracket7'] = '219140';

        DB::table('family_incomes')->insert([
            'range' => json_encode($income)
        ]);
    }
}
