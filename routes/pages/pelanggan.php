<?php

use App\Http\Controllers\PelangganController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','role:petugas_loket'])->prefix('pelanggan')->as('pelanggan.')->group(function (){
    Route::get('/', [PelangganController::class, 'index'])->name('index');
    Route::get('/create', [PelangganController::class, 'create'])->name('create');
    Route::post('/store', [PelangganController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [PelangganController::class, 'edit'])->name('edit');
    Route::put('/{id}/update', [PelangganController::class, 'update'])->name('update');
    Route::delete('/{id}/delete', [PelangganController::class, 'delete'])->name('delete');
});
