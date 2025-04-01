<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserTableSeeder
 *
 * @package Database\Seeders
 */
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'carlos@gmail.com',
            'password' => bcrypt('ABC123456'),
            'created_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'carlos@hotmail.com',
            'password' => bcrypt('ABC123456'),
            'created_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'carlos@uol.com.br',
            'password' => bcrypt('ABC123456'),
            'created_at' => now(),
        ]);


    }
}
