<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CreateUsersSeeder3 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [];

        for($i = 0; $i < 10; $i++) {
            $users[] =             [
                'username' => Str::random(10),
                'password' => bcrypt(Str::random(15)),
                'active' => (bool)rand(0,1)
            ];
        }

        DB::table('users')->insert($users);
    }
}
