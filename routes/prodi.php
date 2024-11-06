<?php

use App\Http\Controllers\Posts\PostsController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('prodi', [PostsController::class,"index"])
        ->name('prodi');
});
