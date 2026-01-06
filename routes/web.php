<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\LaporanController;

Route::get('/', function () {
    return view('dashboard');
});


/* ===== GURU ===== */
Route::get('/guru', [GuruController::class, 'index']);
Route::get('/guru/tambah', [GuruController::class, 'create']);
Route::post('/guru/simpan', [GuruController::class, 'store']);
Route::get('/guru/edit/{id}', [GuruController::class, 'edit']);
Route::post('/guru/update/{id}', [GuruController::class, 'update']);
Route::get('/guru/hapus/{id}', [GuruController::class, 'destroy']);


/* ===== ABSENSI ===== */
Route::get('/absensi', [AbsensiController::class, 'index']);
Route::get('/absensi/tambah', [AbsensiController::class, 'create']);
Route::post('/absensi/simpan', [AbsensiController::class, 'store']);
Route::get('/absensi/edit/{id}', [AbsensiController::class, 'edit']);
Route::post('/absensi/update/{id}', [AbsensiController::class, 'update']);
Route::get('/absensi/hapus/{id}', [AbsensiController::class, 'destroy']);


/* ===== LAPORAN ===== */
Route::get('/laporan', [LaporanController::class, 'index']);
