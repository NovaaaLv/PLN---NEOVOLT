<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pemakaian>
 */
class PemakaianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no_kontrol' => \App\Models\Pelanggan::inRandomOrder()->first()->no_kontrol,
            'tahun' => $this->faker->year(),
            'bulan' => $this->faker->numberBetween(1, 12),
            'meter_awal' => $this->faker->numberBetween(100, 500),
            'meter_akhir' => $this->faker->numberBetween(500, 1000),
            'jumlah_pakai' => $this->faker->numberBetween(100, 500),
            'biaya_beban_pemakai' => $this->faker->numberBetween(10000, 50000),
            'tarif_kwh' => $this->faker->numberBetween(1000, 5000),
            'biaya_pemakaian' => $this->faker->numberBetween(5000, 20000),
            'status' => $this->faker->randomElement(['lunas', 'belum_lunas']),
        ];
    }
}
