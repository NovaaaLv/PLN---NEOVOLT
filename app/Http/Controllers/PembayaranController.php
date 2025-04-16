<?php

namespace App\Http\Controllers;

use App\Models\Pemakaian;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index(){
        $pemakaians = Pemakaian::with(['pelanggan'])->get();
        return view('admin.pembayaran.index',compact('pemakaians'));
    }


    public function view(Request $request,$id){
        $pemakaian = Pemakaian::findOrFail($id);
        return view('admin.pembayaran.view',compact('pemakaian'));
    }

    public function updateStatus($id){
        $pemakaian = Pemakaian::findOrFail($id);

        $pemakaian->update([
            'status' => "lunas"
        ]);

        return redirect(route('pembayaran.index'))->with("success","Pembayaran berhasil");
    }


    public function deleteStatus($id){
        $pemakaian = Pemakaian::findOrFail($id);

        $pemakaian->update([
            'status' => "belum_lunas"
        ]);


        return back()->with('success','Data Pembayaran Berhasil Dibatalkan');
       }
}
