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

        // Pagination hanya untuk data yang ditampilkan
        $pemakaians = $query->paginate(10);

        // Hitung total lunas & belum lunas dari seluruh data yang sesuai filter (tanpa pagination)
        $baseQuery = Pemakaian::query();

        if ($request->filled('no_kontrol')) {
            $baseQuery->where('no_kontrol', 'like', '%' . $request->no_kontrol . '%');
        }

        if ($request->filled('tahun')) {
            $baseQuery->where('tahun', $request->tahun);
        }

        if ($request->filled('bulan')) {
            $baseQuery->where('bulan', $request->bulan);
        }

        $totalLunas = (clone $baseQuery)->where('status', 'lunas')->count();
        $totalBelumLunas = (clone $baseQuery)->where('status', 'belum_lunas')->count();
        $totalSemua = (clone $baseQuery)->count();

        return view('admin.pembayaran.index', compact('pemakaians', 'totalLunas', 'totalBelumLunas', 'totalSemua'));
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
