<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\TautanSosial;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            AdminSeeder::class,
            GuruSeeder::class,
            InformasiSeeder::class,
            KategoriSeeder::class,
            PlatformSeeder::class,
            ProfileSeeder::class,
            RoleSeeder::class,
            SiswaSeeder::class,
            TautanSosialSeeder::class
        ]);
    }
}
