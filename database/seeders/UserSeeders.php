<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Muhammad Rifky Ramadani',
            'email' => 'rifkiramadani724@gmail.com',
            'password' => bcrypt('admin123'),
        ]);
        DB::table('users')->insert([
            'name' => 'Dwi Saputra',
            'email' => 'putro@gmail.com',
            'password' => bcrypt('admin123'),
        ]);
    }
}
