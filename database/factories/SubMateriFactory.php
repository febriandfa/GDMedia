<?php

namespace Database\Factories;

use App\Models\Materi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubMateri>
 */
class SubMateriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'materi_id' => function () {
                return Materi::inRandomOrder()->first();
            },
            'nama' => $this->faker->lastName(),
            'deskripsi' => $this->faker->paragraph(),
            'file' => $this->faker->imageUrl(),
        ];
    }
}
