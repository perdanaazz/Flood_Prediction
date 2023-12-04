<?php

use App\Http\Controllers\CurahHujanController;
use App\Http\Controllers\DataSungaiController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    return view('index');
});

Route::get('/login', function () {
    return view('admin.login');
});

Route::resource('data-sungai', DataSungaiController::class);
Route::resource('curah-hujan', CurahHujanController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
