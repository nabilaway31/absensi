<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

/* ===== DASHBOARD ===== */
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /* ===== GURU ===== */
    Route::prefix('guru')->name('guru.')->group(function () {
        Route::get('/', [GuruController::class, 'index'])->name('index');
        Route::get('/tambah', [GuruController::class, 'create'])->name('create');
        Route::post('/simpan', [GuruController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [GuruController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [GuruController::class, 'update'])->name('update');
        Route::get('/hapus/{id}', [GuruController::class, 'destroy'])->name('destroy');
    });

    /* ===== ABSENSI ===== */
    Route::prefix('absensi')->name('absensi.')->group(function () {
        Route::get('/', [AbsensiController::class, 'index'])->name('index');
        Route::get('/tambah', [AbsensiController::class, 'create'])->name('create');
        Route::post('/simpan', [AbsensiController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AbsensiController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [AbsensiController::class, 'update'])->name('update');
        Route::get('/hapus/{id}', [AbsensiController::class, 'destroy'])->name('destroy');
    });

    // EDIT & UPDATE ABSENSI
    Route::get('/absensi/edit/{id}', [AbsensiController::class, 'edit']);
    Route::post('/absensi/update/{id}', [AbsensiController::class, 'update']);

    /* ===== LAPORAN ===== */
    Route::prefix('laporan')->group(function () {
        Route::get('/', [LaporanController::class, 'index'])->name('laporan.index');
        Route::get('/cetak', [LaporanController::class, 'cetak'])->name('laporan.cetak');
    });

    /* ===== USER / PENGGUNA ===== */
    Route::get('/user/absensi', [AbsensiController::class, 'userIndex']);

    /* ===== LOGOUT ===== */
    Route::post('/logout', function () {
        Auth::logout();

        return redirect('/login');
    })->name('logout');
});
