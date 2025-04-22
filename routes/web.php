<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',function(){
    return redirect(route('data-pemakaian-listrik.index'));
})->name('home');

Route::get('/dashboard', function () {
    return redirect(route('user.index'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/pages/pelanggan.php';
require __DIR__.'/pages/pemakaian.php';
require __DIR__.'/pages/tarif.php';
require __DIR__.'/pages/user.php';
require __DIR__.'/pages/pembayaran.php';
require __DIR__.'/pages/front.php';
require __DIR__.'/pages/report.php';
