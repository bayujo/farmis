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
            'jenis' => $this->faker->numberBetween(0, 0),
            'nominal' => $this->faker->numberBetween(300000, 350000),
            'tanggal' => $this->faker->dateTimeInInterval('-1 month', '+1 month'),
            'keterangan' => $this->faker->word()
        ];
    }
}
