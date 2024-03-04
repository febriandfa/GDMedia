<?php

namespace Database\Seeders;

use App\Models\Kelompok;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelompokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            Kelompok::create([
                'name' => 'Kelompok ' . $i,
                'kuota' => 5
            ]);
        }
    }
}
