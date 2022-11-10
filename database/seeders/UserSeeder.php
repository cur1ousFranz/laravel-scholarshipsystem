<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Coordinator;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userAdmin = User::create([

            'username' => 'coordinator',
            'password' => bcrypt('password'),
            'role' => 'coordinator'

        ]);

        Coordinator::create([
            'users_id' => $userAdmin->id
        ]);

    }
}
