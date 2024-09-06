<?php

namespace Database\Factories;

use App\Models\Tugas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubTugas>
 */
class SubtugasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tugas_id' => function () {
                return Tugas::inRandomOrder()->first();
            },
            'tahap' => $this->faker->numberBetween(0, 4),
            'deskripsi' => $this->faker->paragraph(),
        ];
    }
}
