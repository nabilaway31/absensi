<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Absensi;

class DashboardController extends Controller
{
    public function index()
    {
        // Total semua guru
        $totalGuru = Guru::count();

        // Total guru hadir hari ini
        $hadir = Absensi::where('status', 'hadir')->count();

        // Total guru izin hari ini
        $izin = Absensi::where('status', 'izin')->count();

        // Total guru sakit hari ini
        $sakit = Absensi::where('status', 'sakit')->count();

        // Kirim semua data ke view
        return view('dashboard', compact('totalGuru', 'hadir', 'izin', 'sakit'));
    }
}
