<?php

namespace App\Http\Controllers;

use App\Models\Tarif;
use Illuminate\Http\Request;

class TarifController extends Controller
{
    public function index(){
        $tarifs = Tarif::all();
        return view('admin.tarif.index',compact('tarifs'));
    }
    public function create(){
        return view('admin.tarif.create');
    }
    public function store(Request $request){
        $request->validate([
            'jenis_plg' => ['required','unique:tarifs,jenis_plg'],
            'biaya_beban' => ['required'],
            'tarif_kwh' => ['required'],
        ]);

        Tarif::create([
            'jenis_plg' => $request->jenis_plg,
            'biaya_beban' => $request->biaya_beban,
            'tarif_kwh' => $request->tarif_kwh,
        ]);

        return back()->with('success','Data Tarif Berhasil Di Tambahkan');
    }
    public function edit($id){
        $tarif = Tarif::findOrFail($id);

        return view('admin.tarif.update',compact('tarif'));
    }
    public function update(Request $request, $id){
        $tarif = Tarif::findOrFail($id);

        $request->validate([
            'jenis_plg' => ['required'],
            'biaya_beban' => ['required'],
            'tarif_kwh' => ['required' ]
        ]);

        $tarif->update([
            'jenis_plg' => $request->jenis_plg,
            'biaya_beban' => $request->biaya_beban,
            'tarif_kwh' => $request->tarif_kwh,
        ]);

        return back()->with('success','Data Berhasil Di Update');
    }
    public function delete($id){
        $tarif = Tarif::findOrFail($id);

        $tarif->delete();

        return back()->with('success','Data tarif Berhasil Dihapus');
    }
}
