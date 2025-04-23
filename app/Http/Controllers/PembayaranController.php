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
            $query->whereHas('pelanggan', function ($q) use ($request) {
                $q->where('no_kontrol', 'like', '%' . $request->no_kontrol . '%');
            });
        }

        if ($request->filled('tahun')) {
            $query->where('tahun', $request->tahun);
        }

        if ($request->filled('bulan')) {
            $query->where('bulan', $request->bulan);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $pemakaians = $query->paginate(10);

        $totalSemua = Pemakaian::count();
        $totalLunas = Pemakaian::where('status', 'lunas')->count();
        $totalBelumLunas = Pemakaian::where('status', 'belum_lunas')->count();

        return view('admin.pembayaran.index', compact('pemakaians', 'totalSemua', 'totalLunas', 'totalBelumLunas'));
    }


    public function view(Request $request, $id)
    {
        $pemakaian = Pemakaian::findOrFail($id);

        // Hitung total tunggakan
        $tunggakan = Pemakaian::where('no_kontrol', $pemakaian->no_kontrol)
            ->where('status', 'belum_lunas')
            ->where('id', '!=', $pemakaian->id)
            ->sum('total_bayar');

        // Ambil daftar bulan & tahun yang belum lunas
        $belumLunas = Pemakaian::where('no_kontrol', $pemakaian->no_kontrol)
            ->where('status', 'belum_lunas')
            ->where('id', '!=', $pemakaian->id)
            ->get(['bulan', 'tahun', 'total_bayar']);


        return view('admin.pembayaran.view', compact('pemakaian', 'tunggakan', 'belumLunas'));
    }

    public function lunasiSemuaTunggakan(Request $request, $no_kontrol)
    {
        // Update semua yang belum lunas jadi lunas
        Pemakaian::where('no_kontrol', $no_kontrol)
            ->where('status', 'belum_lunas')
            ->update(['status' => 'lunas']);

        return redirect()->back()->with('success', 'Semua tunggakan berhasil dilunasi.');
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
