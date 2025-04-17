<?php

namespace App\Http\Controllers;

use App\Models\Pemakaian;
use Illuminate\Http\Request;

class PembayaranController extends Controller
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

        $totalLunas = $pemakaians->where('status', 'lunas')->count();
        $totalBelumLunas = $pemakaians->where('status', 'belum_lunas')->count();
        return view('admin.pembayaran.index', compact('pemakaians', 'totalLunas', 'totalBelumLunas'));
    }


    public function view(Request $request, $id)
    {
        $pemakaian = Pemakaian::findOrFail($id);
        return view('admin.pembayaran.view', compact('pemakaian'));
    }

    public function updateStatus($id)
    {
        $pemakaian = Pemakaian::findOrFail($id);

        $pemakaian->update([
            'status' => "lunas"
        ]);

        return redirect(route('pembayaran.index'))->with("success", "Pembayaran berhasil");
    }


    public function deleteStatus($id)
    {
        $pemakaian = Pemakaian::findOrFail($id);

        $pemakaian->update([
            'status' => "belum_lunas"
        ]);


        return back()->with('success', 'Data Pembayaran Berhasil Dibatalkan');
    }
}
