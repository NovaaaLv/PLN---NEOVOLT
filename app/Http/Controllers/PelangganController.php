<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Tarif;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $totalPelanggan = Pelanggan::count();
        $pelanggans = Pelanggan::with('jenis')->paginate(15);

        return view('admin.pelanggan.index', compact('pelanggans', 'totalPelanggan'));
    }


    public function create()
    {
        $jenis_pelanggans = Tarif::all();
        $pelangganCout = Pelanggan::count();
        return view('admin.pelanggan.create', compact('jenis_pelanggans'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required'],
            'alamat' => ['required'],
            'telepon' => ['required'],
            'jenis_plg' => ['required'],
        ]);

        $pelangganCount = Pelanggan::count();
        $no_kontrol = 'PLNVOLTNE' . sprintf('%03d', $pelangganCount);

        Pelanggan::create([
            'no_kontrol' => $no_kontrol,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'jenis_plg' => $request->jenis_plg,
        ]);
        return redirect(route('pelanggan.index'))->with('success', 'Berhasil MenambahKan Data Pelanggan');
    }
    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $jenis_pelanggans = Tarif::all();
        return view('admin.pelanggan.update', compact(['pelanggan', 'jenis_pelanggans']));
    }
    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $request->validate([
            'nama' => ['required'],
            'alamat' => ['required'],
            'telepon' => ['required'],
            'jenis_plg' => ['required'],
        ]);

        $pelanggan->update([
            'no_kontrol' => $pelanggan->no_kontrol,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'jenis_plg' => $request->jenis_plg,
        ]);

        return back()->with('success', 'Data Pelanggan Berhasil Diubah');
    }
    public function delete($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $pelanggan->delete();
        return back()->with('success', 'Data Pelaggan Berhasil Dihapus');
    }
}
