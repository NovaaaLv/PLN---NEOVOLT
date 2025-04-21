<?php

use App\Http\Controllers\ReportController;
use App\Http\Controllers\TarifController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin'])->prefix('report')->as('report.')->group(function () {
    Route::get('/all', [ReportController::class, 'all'])->name('all');
    Route::get('/{id}', [ReportController::class, 'index'])->name('index');
});
  