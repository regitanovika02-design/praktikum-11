<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

// ==========================================
// RUTE UMUM (Bisa Diakses Siapa Saja)
// ==========================================
Route::get('/', function () {
    return view('welcome');
});

Route::get('/beranda', function () {
    return view('user.beranda');
});

Route::get('/tentang', function () {
    return view('user.tentang');
});


// ==========================================
// RUTE DASHBOARD BAWAAN BREEZE
// ==========================================
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// ==========================================
// RUTE GROUP BACKEND ADMIN (Perintah Dosen + Breeze)
// ==========================================
Route::middleware(['auth'])->group(function () {
    
    // Halaman Utama Dashboard Admin
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // CRUD Pengguna, Kategori & Berita (Tambahan dari Dosen)
    Route::resource('/admin/users', UserController::class);
    Route::resource('/admin/categories', CategoryController::class);
    Route::resource('/admin/articles', ArticleController::class);

});


// ==========================================
// RUTE MANAGEMENT PROFILE (Bawaan Breeze)
// ==========================================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Sistem Autentikasi bawaan Breeze (WAJIB ADA)
require __DIR__.'/auth.php';