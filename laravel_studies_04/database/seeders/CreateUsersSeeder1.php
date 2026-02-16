<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateUsersSeeder1 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'cadu172@gmail.com', //`username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                'password' => bcrypt('teste123'), //`password` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                'active' => true //`password` tinyint(1) NOT NULL DEFAULT '1',
            ]
        ]);
    }
}
