<?php

use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JenisKeuanganController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\LaporanPengaduanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use App\Models\JenisKeuangan;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::redirect('/', '/dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', fn() => Inertia::render('Dashboard'))->name('dashboard');
    
    Route::resource('jadwal', JadwalController::class);
    Route::resource('jeniskeuangan', JenisKeuanganController::class);
    Route::resource('keuangan', KeuanganController::class);
    Route::resource('laporanpengaduan', LaporanPengaduanController::class);
    Route::resource('roles', RolesController::class);
    Route::resource('user', UserController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
