<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tarif>
 */
class TarifFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'jenis_plg' => $this->faker->word(),
            'biaya_beban' => $this->faker->numberBetween(1000, 5000),
            'tarif_kwh' => $this->faker->numberBetween(6000, 3400),
        ];
    }
}
