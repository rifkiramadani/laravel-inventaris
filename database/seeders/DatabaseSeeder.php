<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\StatusSeeders;
use Database\Seeders\KondisiSeeders;
use Database\Seeders\KategoriSeeders;
use Database\Seeders\PeminjamSeeders;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            // KondisiSeeders::class,
            // KategoriSeeders::class,
            // PeminjamSeeders::class,
            StatusSeeders::class,
        ]);
    }
}
