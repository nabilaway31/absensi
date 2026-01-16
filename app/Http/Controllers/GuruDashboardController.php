<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Guru;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class GuruDashboardController extends Controller
{
    public function index()
    {
        // Ambil guru dari user login
        $guru = Guru::where('user_id', Auth::id())->firstOrFail();

        // Tanggal & jam sekarang
        $hariIni = Carbon::now()->toDateString();
        $jamSekarang = Carbon::now()->format('H:i:s');

        // Absensi hari ini
        $absensiHariIni = Absensi::where('guru_id', $guru->id)
            ->where('tanggal', $hariIni)
            ->first();

<<<<<<< HEAD
        // KIRIM SEMUA KE VIEW
=======
        // Waktu server sekarang untuk inisialisasi tampilan
        $jamSekarang = Carbon::now()->format('H:i:s');

>>>>>>> bdd3300716baf51c08f4567ac1e83e08743c750d
        return view('guru.dashboard', compact(
            'guru',
            'absensiHariIni',
            'hariIni',
            'jamSekarang'
        ));
    }
}
