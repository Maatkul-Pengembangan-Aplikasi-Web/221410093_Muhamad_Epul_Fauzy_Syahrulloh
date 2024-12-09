<?php

use App\Http\Controllers\Posts\PostsController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('prodi', [PostsController::class,"index"])
        ->name('prodi');
        Route::post('prodi/search', [PostsController::class,"search"])
        ->name('prodi.search');
    Route::post('prodi/store', [PostsController::class,"store"])
    ->name('prodi.store');
    Route::put('prodi/update/{id}', [PostsController::class,"update"])
    ->name('prodi.update');
    Route::delete('prodi/destroy/{id}', [PostsController::class,"destroy"])
    ->name('prodi.destroy');
});