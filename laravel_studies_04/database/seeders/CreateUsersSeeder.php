<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            CreateUsersSeeder1::class,
            CreateUsersSeeder2::class,
            CreateUsersSeeder3::class
        ]);
    }
}
