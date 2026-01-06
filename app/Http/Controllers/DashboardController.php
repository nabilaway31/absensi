<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Absensi;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total guru
        $totalGuru = Guru::count();

        // Hitung guru hadir
        $hadir = Absensi::where('status', 'hadir')->count();

        // Hitung guru izin
        $izin = Absensi::where('status', 'izin')->count();

        // Hitung guru sakit
        $sakit = Absensi::where('status', 'sakit')->count();

        // Kirim semua variabel ke view
        return view('dashboard', compact('totalGuru', 'hadir', 'izin', 'sakit'));
    }
}
