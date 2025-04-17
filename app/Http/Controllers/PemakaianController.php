<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Pemakaian;
use Illuminate\Http\Request;

class PemakaianController extends Controller
{
    public function index(Request $request)
    {
        $query = Pemakaian::with(['pelanggan']);

        if ($request->filled('no_kontrol')) {
            $query->where('no_kontrol', 'like', '%' . $request->no_kontrol . '%');
        }

        if ($request->filled('tahun')) {
            $query->where('tahun', $request->tahun);
        }

        if ($request->filled('bulan')) {
            $query->where('bulan', $request->bulan);
        }

        $pemakaians = $query->get();

        return view('admin.pemakaian.index', compact('pemakaians'));
    }

    public function create(Request $request)
    {
        $no_kontrol = $request->get('no_kontrol');
        $tahun      = $request->get('tahun');
        $bulan      = $request->get('bulan');
        $meter_awal = 0;
        $pelanggan  = null;

        if ($no_kontrol) {
            $pelanggan = Pelanggan::where('no_kontrol', $no_kontrol)->first();
        }

        if ($pelanggan && $tahun && $bulan) {
            $prevBulan = $bulan - 1;
            $prevTahun = $tahun;
            if ($prevBulan < 1) {
                $prevBulan = 12;
                $prevTahun -= 1;
            }

            // Cari pemakaian bulan sebelumnya berdasarkan no_kontrol
            $lastPemakaian = Pemakaian::where('no_kontrol', $no_kontrol)
                ->where('tahun', $prevTahun)
                ->where('bulan', $prevBulan)
                ->first();

            if ($lastPemakaian) {
                $meter_awal = $lastPemakaian->meter_akhir;
            }
        }

        return view('admin.pemakaian.create', compact('pelanggan', 'no_kontrol', 'tahun', 'bulan', 'meter_awal'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_kontrol' => ['required'],
            'tahun' => ['required', 'numeric'],
            'bulan' => ['required', 'numeric'],
            'meter_awal' => ['required', 'numeric'],
            'meter_akhir' => ['required', 'numeric'],
            'biaya_beban_pemakai' => ['required', 'numeric'],
            'tarif_kwh' => ['required', 'numeric'],
        ]);

        // Validasi custom: meter_akhir tidak boleh lebih kecil dari meter_awal
        if ($request->meter_akhir < $request->meter_awal) {
            return redirect()->back()->withInput()->withErrors([
                'meter_akhir' => 'Meter akhir tidak boleh lebih kecil dari meter awal.'
            ]);
        }

        $jumlah_pakai = $request->meter_akhir - $request->meter_awal;
        $biaya_pemakaian = $jumlah_pakai * $request->tarif_kwh;

        Pemakaian::create([
            'no_kontrol'            => $request->no_kontrol,
            'tahun'                 => $request->tahun,
            'bulan'                 => $request->bulan,
            'meter_awal'            => $request->meter_awal,
            'meter_akhir'           => $request->meter_akhir,
            'jumlah_pakai'          => $jumlah_pakai,
            'biaya_beban_pemakai'   => $request->biaya_beban_pemakai,
            'tarif_kwh'             => $request->tarif_kwh,
            'biaya_pemakaian'       => $biaya_pemakaian,
        ]);

        return redirect()->route('pemakaian.index')->with('success', 'Data Pemakaian berhasil ditambahkan');
    }


    public function edit($id)
    {
        $pemakaian = Pemakaian::findOrFail($id);
        return view('admin.pemakaian.update', compact('pemakaian'));
    }
    public function update(Request $request, $id)
    {
        $pemakaian = Pemakaian::findOrFail($id);
        $request->validate([
            'no_kontrol' => ['required'],
            'tahun' => ['required', 'numeric'],
            'bulan' => ['required', 'numeric'],
            'meter_awal' => ['required', 'numeric'],
            'meter_akhir' => ['required', 'numeric'],
            'jumlah_pakai' => ['required'],
            'biaya_beban_pemakai' => ['required', 'numeric'],
            'tarif_kwh' => ['required', 'numeric'],
            'biaya_pemakaian' => ['required'],
        ]);

        $jumlah_pakai = $request->meter_akhir - $request->meter_awal;

        $biaya_pemakaian = $jumlah_pakai * $request->tarif_kwh;

        $pemakaian->update([
            'no_kontrol' => $request->no_kontrol,
            'tahun' => $request->tahun,
            'bulan' => $request->bulan,
            'meter_awal' => $request->meter_awal,
            'meter_akhir' => $request->meter_akhir,
            'jumlah_pakai' => $jumlah_pakai,
            'biaya_beban_pemakai' => $request->biaya_beban_pemakai,
            'tarif_kwh' => $request->tarif_kwh,
            'biaya_pemakaian' => $biaya_pemakaian,
        ]);

        return back()->with('success', 'Berhasil Mengupdate Pemakaian');
    }
    public function delete($id)
    {
        $pemakaian = Pemakaian::findOrFail($id);

        $pemakaian->delete();
        return back()->with('success', 'Data Pemakaian Berhasil Dihapus');
    }
}
