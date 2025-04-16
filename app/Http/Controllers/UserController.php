<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.user.index',compact('users'));
    }
    public function create(){
        return view('admin.user.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'role' => ['required'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect(route('user.index'))->with('success','Data Pengguna Berhasil Di Tambahkan');
    }
    public function edit($id){
        $user = User::findOrFail($id);

        return view('admin.user.update',compact('user'));
    }
    public function update(Request $request, $id){
        $user = User::findOrFail($id);

        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'role' => ['required'],
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return back()->with('success','Data Berhasil Pengguna Di Update');
    }
    public function delete($id){
        $user = User::findOrFail($id);

        $user->delete();

        return back()->with('success','Data Pengguna Berhasil Dihapus');
    }
}
