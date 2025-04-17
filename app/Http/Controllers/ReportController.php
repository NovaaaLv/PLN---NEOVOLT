<?php

namespace App\Http\Controllers;

use App\Models\Pemakaian;
use PDF;

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
            ->setPaper([0, 0, 350, 380], 'portrait');

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
}
