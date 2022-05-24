<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Milk>
 */
class MilkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'jumlah' => $this->faker->numberBetween(10, 20),
            'tanggal' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'id_users' => $this->faker->numberBetween(2,6),
            'id_cow' => $this->faker->randomElement(['A2', 'A1', 'Y1', 'A0', 'A9', 'R1', 'L1', 'O1', 'A7', 'K1', 'T1', 'O2', 'W9', 'E2'])
        ];
    }
}
