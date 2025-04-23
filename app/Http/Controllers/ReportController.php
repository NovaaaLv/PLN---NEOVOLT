<?php

namespace App\Http\Controllers;

use App\Models\Pemakaian;
use PDF;
use Illuminate\Http\Request;


class ReportController extends Controller
{
    public function index($id)
    {
        $pemakaian = Pemakaian::findOrFail($id);
        $data = [
            'title' => 'Laporan Pembayaran',
            'date' => date('m/d/Y'),
            'pemakaian' => $pemakaian,
        ];

        $fileName = 'PLNEOVLT - ' . $pemakaian->pelanggan->nama . '.pdf';

        // Pengaturan ukuran halaman untuk struk
        $pdf = PDF::loadView('admin.report.view', $data)
            ->setPaper([0, 0, 526.77, 525.19], 'portrait');

        return $pdf->download($fileName);
    }
    public function all()
    {
        // Mengambil semua data pemakaian bersama relasi pelanggan
        $pemakaian = Pemakaian::with('pelanggan')->get();

        $data = [
            'title' => 'Laporan Pembayaran',
            'date' => date('m/d/Y'),
            'pemakaian' => $pemakaian,
        ];

        // Menentukan nama file
        $fileName = 'PLNEOVLT - All Data - ' . date('Y-m-d') . '.pdf';

        // Mengatur ukuran halaman untuk struk
        $pdf = PDF::loadView('admin.report.all', $data)
            ->setPaper([0, 0, 1400, 700], 'potrait');

        return $pdf->download($fileName);
    }


    public function filtered(Request $request)
    {
        $no_kontrol = $request->no_kontrol;
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $status = $request->status;

        $pemakaianQuery = Pemakaian::query();

        if ($no_kontrol) {
            $pemakaianQuery->where('no_kontrol', $no_kontrol);
        }

        if ($bulan) {
            $pemakaianQuery->where('bulan', $bulan);
        }

        if ($tahun) {
            $pemakaianQuery->where('tahun', $tahun);
        }

        if ($status) {
            $pemakaianQuery->where('status', $status);
        }

        $pemakaian = $pemakaianQuery->with('pelanggan')->get();

        if ($pemakaian->isEmpty()) {
            abort(404, 'No data found for the given filters.');
        }

        // Filter status lunas dan belum lunas
        $lunas = $pemakaian->where('status', 'lunas');
        $belumLunas = $pemakaian->where('status', '!=', 'lunas');

        $data = [
            'title'       => 'Laporan Pembayaran',
            'date'        => date('d/m/Y'),
            'pemakaian'   => $pemakaian,
            'lunas'       => $lunas,
            'belumLunas'  => $belumLunas,
        ];

        $fileName = 'PLNEOVLT - ' . $pemakaian->first()->pelanggan->nama . ' - ' . $tahun . '-' . $bulan . '.pdf';

        $pdf = PDF::loadView('admin.report.filtered', $data)
            ->setPaper([0, 0, 1400, 700], 'portrait');

        return $pdf->download($fileName);
    }
}
