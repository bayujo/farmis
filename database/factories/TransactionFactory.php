<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'jenis' => $this->faker->numberBetween(0, 1),
            'nominal' => $this->faker->numberBetween(10000, 500000),
            'tanggal' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'keterangan' => $this->faker->word()
        ];
    }
}
