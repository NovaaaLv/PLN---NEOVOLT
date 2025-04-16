<?php

namespace App\Http\Controllers;

use App\Models\Pemakaian;
use PDF;

class ReportController extends Controller
{
    public function index($id){
        $pemakaian = Pemakaian::findOrFail($id);
        $data = [
            'title' => 'Laporan Pembayaran',
            'date' => date('m/d/Y'),
            'pemakaian' => $pemakaian,
        ];

        // Bukan Error Hanya dari Extensionnya saja

        $pdf = PDF::loadView('admin.report.view', $data);

        return $pdf->download('document.pdf');
    }
}
