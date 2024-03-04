<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guru = User::create([
            'name' => 'Guru GDMedia',
            'email' => 'guru@gdmedia.com',
            'password' => bcrypt('guru123'),
            'role' => 'guru'
        ]);
        $guru->assignRole('guru');

        $murid = User::create([
            'name' => 'Murid GDMedia',
            'email' => 'murid@gdmedia.com',
            'kelas' => 'XII-IPA',
            'absen' => '212',
            'password' => bcrypt('murid123'),
            'role' => 'murid'
        ]);
        $murid->assignRole('murid');
    }
}
