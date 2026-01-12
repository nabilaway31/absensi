<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Absensi;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class GuruDashboardController extends Controller
{
    public function index()
    {
        // Ambil data guru berdasarkan user login
        $guru = Guru::where('user_id', Auth::id())->firstOrFail();

        $hariIni = date('Y-m-d');
        $jamSekarang = Carbon::now()->format('H:i');

        // Absensi hari ini
        $absensiHariIni = Absensi::where('guru_id', $guru->id)
            ->where('tanggal', $hariIni)
            ->first();

        // tampilkan view yang benar (folder guru/dashboard/index.blade.php)
        return view('guru.dashboard', compact(
            'guru',
            'absensiHariIni',
            'hariIni',
            'jamSekarang'
        ));
    }
}
