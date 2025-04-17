<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use App\Models\Pemakaian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PemakaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Ambil seluruh pelanggan
        $pelanggans = Pelanggan::all();

        foreach ($pelanggans as $pelanggan) {
            // Tentukan tahun dan bulan (misalnya untuk tahun 2025 dan bulan Januari sampai Desember)
            for ($tahun = 2025; $tahun <= 2025; $tahun++) {
                for ($bulan = 1; $bulan <= 12; $bulan++) {

                    // Tentukan bulan dan tahun sebelumnya
                    $prevBulan = $bulan - 1;
                    $prevTahun = $tahun;
                    if ($prevBulan < 1) {
                        $prevBulan = 12;
                        $prevTahun -= 1;
                    }

                    // Cari pemakaian bulan sebelumnya berdasarkan no_kontrol
                    $lastPemakaian = Pemakaian::where('no_kontrol', $pelanggan->no_kontrol)
                        ->where('tahun', $prevTahun)
                        ->where('bulan', $prevBulan)
                        ->first();

                    // Tentukan meter_awal, jika tidak ada pemakaian sebelumnya, set ke 0
                    $meter_awal = $lastPemakaian ? $lastPemakaian->meter_akhir : 0;

                    // Data pemakaian baru
                    Pemakaian::create([
                        'no_kontrol' => $pelanggan->no_kontrol,
                        'tahun' => $tahun,
                        'bulan' => $bulan,
                        'meter_awal' => $meter_awal,
                        'meter_akhir' => rand(1000, 5000),
                        'jumlah_pakai' => rand(100, 500),
                        'biaya_beban_pemakai' => rand(50000, 100000),
                        'tarif_kwh' => rand(1500, 2000),
                        'biaya_pemakaian' => rand(10000, 50000),
                        'status' => 'belum_lunas',
                    ]);
                }
            }
        }
    }
}
