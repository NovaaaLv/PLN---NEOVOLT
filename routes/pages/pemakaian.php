<?php

use App\Http\Controllers\PemakaianController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','role:admin'])->prefix('pemakaian')->as('pemakaian.')->group(function (){
    Route::get('/', [PemakaianController::class, 'index'])->name('index');
    Route::get('/create', [PemakaianController::class, 'create'])->name('create');
    Route::post('/store', [PemakaianController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [PemakaianController::class, 'edit'])->name('edit');
    Route::put('/{id}/update', [PemakaianController::class, 'update'])->name('update');
    Route::delete('/{id}/delete', [PemakaianController::class, 'delete'])->name('delete');
});
