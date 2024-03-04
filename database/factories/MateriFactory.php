<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Materi>
 */
class MateriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->lastName(),
            'mata_pelajaran' => $this->faker->slug(),
            'deskripsi' => $this->faker->paragraph(),
            'capaian' => $this->faker->paragraph(),
        ];
    }
}
