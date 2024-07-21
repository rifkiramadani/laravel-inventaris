<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PeminjamSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('peminjams')->insert([
            'nama' => 'Muhammad Rifky Ramadani',
            'email' => 'rifky@gmail.com',
            'alamat' => 'Jalan Suprapto Talang Rimbo Lama Kecamatan Curup Tengah, Kabupaten Rejang Lebong, Provinsi Bengkulu',
            'telepon' => '0899878978087',
        ]);
        
        DB::table('peminjams')->insert([
            'nama' => 'Dwi Saputra',
            'email' => 'putor@gmail.com',
            'alamat' => 'Jalan Pasar Kepahiang Kabupaten Kepahiang',
            'telepon' => '08987998998978',
        ]);

    }
}
