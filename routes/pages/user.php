<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','role:admin'])->prefix('user')->as('user.')->group(function (){
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
    Route::put('/{id}/update', [UserController::class, 'update'])->name('update');
    Route::delete('/{id}/delete', [UserController::class, 'delete'])->name('delete');
});
