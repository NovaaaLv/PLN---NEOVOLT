<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Pemakaian;
use Illuminate\Http\Request;

class DataPemakaianListrikController extends Controller
{
    public function index(Request $request){
        $no_kontrol = $request->input('search_no_kontrol');
        $pelanggan = null;

        if($no_kontrol){
            $pelanggan = Pelanggan::where('no_kontrol', $no_kontrol)->first();
        }
        return view('front.index',compact(['pelanggan','no_kontrol']));
    }

    public function dataPemakaian($id){
        $pelanggan = Pelanggan::findOrFail($id);

        $pemakaians = Pemakaian::where('no_kontrol',$pelanggan->id)->get();

        // dd($pelanggan,$pemakaians);


        return view('front.daftar-pemakaian',compact(['pelanggan','pemakaians']));
    }


    public function detail($id){
        $pemakaian = Pemakaian::findOrFail($id);


        return view('front.detail',compact('pemakaian'));
    }
}
