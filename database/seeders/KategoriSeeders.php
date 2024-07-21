<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategoris')->insert([
            'nama' => 'Elektronik'
        ]);
        DB::table('kategoris')->insert([
            'nama' => 'Furnitur'
        ]);
        DB::table('kategoris')->insert([
            'nama' => 'Peralatan Kantor'
        ]);
        DB::table('kategoris')->insert([
            'nama' => 'Peralatan Mekanik'
        ]);
        DB::table('kategoris')->insert([
            'nama' => 'Peralatan IT'
        ]);
        DB::table('kategoris')->insert([
            'nama' => 'Peralatan Kebersihan'
        ]);
        DB::table('kategoris')->insert([
            'nama' => 'Peralatan Keamanan'
        ]);
        DB::table('kategoris')->insert([
            'nama' => 'Peralatan Medis'
        ]);
        DB::table('kategoris')->insert([
            'nama' => 'Peralatan Audio/Visual'
        ]);
    }
}
