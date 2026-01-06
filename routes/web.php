<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Auth;

/* ===== DASHBOARD ===== */
// Arahkan root ke controller supaya variabel dashboard tersedia
Route::get('/', [DashboardController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

/* ===== GURU ===== */
Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
Route::get('/guru/tambah', [GuruController::class, 'create'])->name('guru.create');
Route::post('/guru/simpan', [GuruController::class, 'store'])->name('guru.store');
Route::get('/guru/edit/{id}', [GuruController::class, 'edit'])->name('guru.edit');
Route::post('/guru/update/{id}', [GuruController::class, 'update'])->name('guru.update');
Route::get('/guru/hapus/{id}', [GuruController::class, 'destroy'])->name('guru.destroy');

/* ===== ABSENSI ===== */
Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');
Route::get('/absensi/tambah', [AbsensiController::class, 'create'])->name('absensi.create');
Route::post('/absensi/simpan', [AbsensiController::class, 'store'])->name('absensi.store');
Route::get('/absensi/edit/{id}', [AbsensiController::class, 'edit'])->name('absensi.edit');
Route::post('/absensi/update/{id}', [AbsensiController::class, 'update'])->name('absensi.update');
Route::get('/absensi/hapus/{id}', [AbsensiController::class, 'destroy'])->name('absensi.destroy');

/* ===== LAPORAN ===== */
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
// Optional: cetak PDF atau export Excel
Route::get('/laporan/cetak', [LaporanController::class, 'cetak'])->name('laporan.cetak');

/* ===== AUTH / LOGOUT ===== */
// Logout admin
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

// Jika ingin login (jika belum pake Laravel Breeze / Fortify / Jetstream)
Route::get('/login', function () {
    return view('auth.login'); // buat file resources/views/auth/login.blade.php
})->name('login');
