<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Absensi;
use PDF;

class LaporanController extends Controller
{
    public function index()
    {
        $laporan = Guru::withCount([
            'absensis as hadir' => fn($q) => $q->where('status', 'Hadir'),
            'absensis as izin'  => fn($q) => $q->where('status', 'Izin'),
            'absensis as sakit' => fn($q) => $q->where('status', 'Sakit'),
            'absensis as alfa'  => fn($q) => $q->where('status', 'Alfa'),
        ])->get();

        return view('laporan.index', compact('laporan'));
    }

    public function pdf()
    {
        $laporan = Guru::withCount([
            'absensis as hadir' => fn($q) => $q->where('status', 'Hadir'),
            'absensis as izin'  => fn($q) => $q->where('status', 'Izin'),
            'absensis as sakit' => fn($q) => $q->where('status', 'Sakit'),
            'absensis as alfa'  => fn($q) => $q->where('status', 'Alfa'),
        ])->get();

        $pdf = PDF::loadView('laporan.pdf', compact('laporan'));
        return $pdf->download('laporan-absensi-guru.pdf');
    }
}
