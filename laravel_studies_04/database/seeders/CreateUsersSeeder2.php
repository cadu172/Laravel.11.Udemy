<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateUsersSeeder2 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username' => 'usuario1',
                'password' => bcrypt('teste123'),
                'active' => true
            ],
            [
                'username' => 'usuario2',
                'password' => bcrypt('teste123'),
                'active' => true
            ],
            [
                'username' => 'usuario3',
                'password' => bcrypt('teste123'),
                'active' => true
            ],
        ];

        DB::table('users')->insert($users);
    }
}
