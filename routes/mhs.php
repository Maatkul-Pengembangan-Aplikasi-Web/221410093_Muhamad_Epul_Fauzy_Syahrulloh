<?php


use App\Http\Controllers\Mhs\MhsController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('mahasiswa', [MhsController::class,"index"])
        ->name('mahasiswa');
    Route::get('mahasiswa/prodi', [MhsController::class,"getProdi"])
        ->name('mahasiswa.prodi');
        Route::post('mahasiswa/search', [MhsController::class,"search"])
        ->name('mahasiswa.search');
    Route::post('mahasiswa/store', [MhsController::class,"store"])
    ->name('mahasiswa.store');
    Route::put('mahasiswa/update/{id}', [MhsController::class,"update"])
    ->name('mahasiswa.update');
    Route::delete('mahasiswa/destroy/{id}', [MhsController::class,"destroy"])
    ->name('mahasiswa.destroy');
});
