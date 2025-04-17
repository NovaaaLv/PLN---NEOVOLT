<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use App\Models\Pemakaian;
use Illuminate\Database\Seeder;

class PemakaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Ambil seluruh pelanggan
        $pelanggans = Pelanggan::with('jenis')->get(); // eager load relasi jenis (Tarif)

        foreach ($pelanggans as $pelanggan) {
            // Pastikan pelanggan punya tarif terkait
            if (!$pelanggan->jenis) {
                continue; // skip kalau gak ada tarif
            }

            // Simpan tarif untuk pelanggan ini
            $biaya_beban = $pelanggan->jenis->biaya_beban;
            $tarif_kwh   = $pelanggan->jenis->tarif_kwh;

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

                    // Tentukan meter akhir
                    $meter_akhir = $meter_awal + rand(100, 500);

                    // Hitung jumlah pakai
                    $jumlah_pakai = $meter_akhir - $meter_awal;

                    // Hitung biaya pemakaian
                    $biaya_pemakaian = $jumlah_pakai * $tarif_kwh;

                    // Hitung total bayar
                    $total_bayar = $biaya_pemakaian + $biaya_beban;

                    // Simpan data pemakaian baru
                    Pemakaian::create([
                        'no_kontrol'            => $pelanggan->no_kontrol,
                        'tahun'                 => $tahun,
                        'bulan'                 => $bulan,
                        'meter_awal'            => $meter_awal,
                        'meter_akhir'           => $meter_akhir,
                        'jumlah_pakai'          => $jumlah_pakai,
                        'biaya_beban_pemakai'   => $biaya_beban,
                        'tarif_kwh'             => $tarif_kwh,
                        'biaya_pemakaian'       => $biaya_pemakaian,
                        'total_bayar'           => $total_bayar,
                        'status'                => 'belum_lunas',
                    ]);
                }
            }
        }
    }
}
