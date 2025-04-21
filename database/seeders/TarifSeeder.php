<?php

namespace Database\Seeders;

use App\Models\Tarif;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TarifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tarifs = [
            [
                'jenis_plg' => 'R1',
                'biaya_beban' => 30000,
                'tarif_kwh' => 1352,
            ],
            [
                'jenis_plg' => 'B2',
                'biaya_beban' => 50000,
                'tarif_kwh' => 1444,
            ],
            [
                'jenis_plg' => 'I3',
                'biaya_beban' => 100000,
                'tarif_kwh' => 1114,
            ],
            [
                'jenis_plg' => 'P1',
                'biaya_beban' => 25000,
                'tarif_kwh' => 1395,
            ],
            [
                'jenis_plg' => 'S2',
                'biaya_beban' => 15000,
                'tarif_kwh' => 1125,
            ],
        ];

        foreach ($tarifs as $tarif) {
            Tarif::create($tarif);
        }
    }
}
