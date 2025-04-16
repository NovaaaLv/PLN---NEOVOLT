<?php

use App\Http\Controllers\TarifController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','role:admin'])->prefix('tarif')->as('tarif.')->group(function (){
    Route::get('/', [TarifController::class, 'index'])->name('index');
    Route::get('/create', [TarifController::class, 'create'])->name('create');
    Route::post('/store', [TarifController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [TarifController::class, 'edit'])->name('edit');
    Route::put('/{id}/update', [TarifController::class, 'update'])->name('update');
    Route::delete('/{id}/delete', [TarifController::class, 'delete'])->name('delete');
});
