<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Absensi;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'jumlahGuru'    => Guru::count(),
            'jumlahAbsensi' => Absensi::count(),
            'hadir'         => Absensi::where('status', 'Hadir')->count(),
            'alfa'          => Absensi::where('status', 'Alfa')->count(),
        ]);
    }
}
