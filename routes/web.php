<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DashboardController;
/* ================= CONTROLLER ADMIN ================= */
use App\Http\Controllers\GuruAbsensiController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\GuruDashboardController;
use App\Http\Controllers\GuruProfilController;
/* ================= CONTROLLER GURU / USER ================= */
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| ROUTE SETELAH LOGIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD ADMIN
    |--------------------------------------------------------------------------
    */
    Route::get('/', [DashboardController::class, 'index'])
        ->name('home');

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | MASTER DATA GURU (ADMIN)
    |--------------------------------------------------------------------------
    */
    Route::prefix('guru')->name('guru.')->group(function () {
        Route::get('/', [GuruController::class, 'index'])->name('index');
        Route::get('/tambah', [GuruController::class, 'create'])->name('create');
        Route::post('/simpan', [GuruController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [GuruController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [GuruController::class, 'update'])->name('update');
        Route::get('/hapus/{id}', [GuruController::class, 'destroy'])->name('destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | ABSENSI (ADMIN)
    |--------------------------------------------------------------------------
    */
    Route::prefix('absensi')->name('absensi.')->group(function () {
        Route::get('/', [AbsensiController::class, 'index'])->name('index');
        Route::get('/tambah', [AbsensiController::class, 'create'])->name('create');
        Route::post('/simpan', [AbsensiController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AbsensiController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [AbsensiController::class, 'update'])->name('update');
        Route::get('/hapus/{id}', [AbsensiController::class, 'destroy'])->name('destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | LAPORAN ABSENSI (ADMIN)
    |--------------------------------------------------------------------------
    */
    Route::prefix('laporan')->name('laporan.')->group(function () {
        Route::get('/', [LaporanController::class, 'index'])->name('index');
        Route::get('/cetak', [LaporanController::class, 'cetak'])->name('cetak');
    });

    /*
    |--------------------------------------------------------------------------
    | ================== GURU / USER ==================
    |--------------------------------------------------------------------------
    */
    Route::prefix('guru-user')->name('guru_user.')->group(function () {

        // Dashboard Guru
        Route::get('/dashboard', [GuruDashboardController::class, 'index'])
            ->name('dashboard');

        // Absensi Guru
        Route::post('/absen-masuk', [GuruAbsensiController::class, 'absenMasuk'])
            ->name('absen.masuk');

        Route::post('/absen-pulang', [GuruAbsensiController::class, 'absenPulang'])
            ->name('absen.pulang');

        // Rekap Absensi Individu
        Route::get('/rekap', [GuruAbsensiController::class, 'rekap'])
            ->name('rekap');

        // Profil Guru
        Route::get('/profil', [GuruProfilController::class, 'index'])
            ->name('profil');

        Route::post('/profil/update', [GuruProfilController::class, 'update'])
            ->name('profil.update');
    });

    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */
    Route::post('/logout', function () {
        Auth::logout();

        return redirect('/login');
    })->name('logout');
});
