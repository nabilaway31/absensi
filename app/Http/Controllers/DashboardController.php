<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Absensi;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahGuru = Guru::count();
        $jumlahAbsensi = Absensi::count();

        // status harus sesuai data di database
        $hadir = Absensi::where('status', 'Hadir')->count();
        $alfa  = Absensi::where('status', 'Alfa')->count();

        return view('dashboard', [
            'jumlahGuru'    => $jumlahGuru,
            'jumlahAbsensi' => $jumlahAbsensi,
            'hadir'         => $hadir,
            'alfa'          => $alfa,
        ]);
    }
}
