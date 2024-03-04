<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelompok;
use App\Models\Materi;
use App\Models\Referensi;
use App\Models\Submateri;
use App\Models\Subtugas;
use App\Models\Tugas;
use App\Models\Tutorial;

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


        Tutorial::factory(5)->create();
        Referensi::factory(5)->create();
        Materi::factory(5)->create();
        Submateri::factory(20)->create();
        Tugas::factory(5)->create();
        Subtugas::factory(20)->create();
    }
}
