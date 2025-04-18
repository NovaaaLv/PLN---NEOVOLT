<?php

use App\Http\Controllers\PembayaranController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','role:petugas_loket'])->prefix('pembayaran')->as('pembayaran.')->group(function (){
    Route::get('/', [PembayaranController::class, 'index'])->name('index');
    Route::get('/{id}/view', [PembayaranController::class, 'view'])->name('view');
    Route::put('/{id}/update/status', [PembayaranController::class, 'updateStatus'])->name('updateStatus');
    Route::put('/{id}/delete/status',[PembayaranController::class, 'deleteStatus'])->name('deleteStatus');
});
