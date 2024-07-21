<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KondisiSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kondisis')->insert([
            'nama' => 'Baik'
        ]);
        DB::table('kondisis')->insert([
            'nama' => 'Rusak'
        ]);
    }
}
