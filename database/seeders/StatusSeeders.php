<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statuses')->insert([
            'nama' => 'Di Pinjam',
        ]);
        DB::table('statuses')->insert([
            'nama' => 'Di Kembalikan',
        ]);
        DB::table('statuses')->insert([
            'nama' => 'Terlambat Di Kembalikan',
        ]);
    }
}
