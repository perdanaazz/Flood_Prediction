<?php

use App\Http\Controllers\CurahHujanController;
use App\Http\Controllers\DataSungaiController;
use App\Http\Controllers\MappingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    return redirect()->route('map.index');
});

Route::get('/login', function () {
    return view('admin.login');
})->name('test');

Route::resource('data-sungai', DataSungaiController::class);
Route::resource('curah-hujan', CurahHujanController::class);
Route::resource('map', MappingController::class);
Route::get('get-data', [MappingController::class, 'getData'])->name('map-data');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
