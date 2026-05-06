<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// 1. Rute Dashboard Bawaan Breeze (Biasanya untuk User Biasa)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 2. Rute Group untuk Backend Admin (Sesuai Materi)
// Melindungi route dengan middleware autentikasi
Route::middleware(['auth'])->group(function () {
    
    // Mendefinisikan URL endpoint /admin/dashboard
    Route::get('/admin/dashboard', function () {
        // Menampilkan file blade admin/dashboard.blade.php
        return view('admin.dashboard');
    })->name('admin.dashboard');

});

// 3. Rute Management Profile (Bawaan Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';