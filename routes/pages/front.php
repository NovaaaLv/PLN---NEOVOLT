<?php

use App\Http\Controllers\DataPemakaianListrikController;
use App\Http\Controllers\TarifController;
use Illuminate\Support\Facades\Route;

Route::prefix('data-pemakaian-listrik')->as('data-pemakaian-listrik.')->group(function (){
    Route::get('/', [DataPemakaianListrikController::class, 'index'])->name('index');
    Route::get('/{id}/data-pemakaian', [DataPemakaianListrikController::class, 'dataPemakaian'])->name('dataPemakaian');
    Route::get('/{id}/detail', [DataPemakaianListrikController::class, 'detail'])->name('detail');
});
