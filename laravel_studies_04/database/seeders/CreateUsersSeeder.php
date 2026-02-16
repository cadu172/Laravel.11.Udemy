<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*DB::table('users')->insert([
            [
                'username' => 'cadu172@gmail.com', //`username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                'password' => bcrypt('teste123'), //`password` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                'active' => true //`password` tinyint(1) NOT NULL DEFAULT '1',
            ]
        ]);*/

        /*$users = [
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

        DB::table('users')->insert($users);*/

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
