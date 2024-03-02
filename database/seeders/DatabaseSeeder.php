<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelompok;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(KelompokSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);

        // Kelompok::factory(5)->create();
    }
}
