<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Guru;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuruAbsensiController extends Controller
{
    /**
     * =========================
     * ABSEN MASUK
     * Jam masuk otomatis
     * Telat jika > 07:00
     * =========================
     */
    public function absenMasuk(Request $request)
    {
        $guru = Guru::where('user_id', Auth::id())->firstOrFail();

        $tanggal = Carbon::today()->format('Y-m-d');
        $jamSekarang = Carbon::now()->format('H:i');

        // Cek sudah absen atau belum
        $cek = Absensi::where('guru_id', $guru->id)
            ->where('tanggal', $tanggal)
            ->first();

        if ($cek) {
            return back()->with('error', 'Anda sudah absen hari ini');
        }

        // Status otomatis
        $status = ($jamSekarang > '07:00') ? 'Alfa' : 'Hadir';

        Absensi::create([
            'guru_id' => $guru->id,
            'tanggal' => $tanggal,
            'jam_masuk' => $jamSekarang,
            'status' => $status,
        ]);

        return back()->with('success', 'Absen masuk berhasil');
    }

    /**
     * =========================
     * ABSEN PULANG
     * Minimal jam 15:00
     * =========================
     */
    public function absenPulang()
    {
        $guru = Guru::where('user_id', Auth::id())->firstOrFail();

        $tanggal = Carbon::today()->format('Y-m-d');
        $jamSekarang = Carbon::now()->format('H:i');

        $absensi = Absensi::where('guru_id', $guru->id)
            ->where('tanggal', $tanggal)
            ->first();

        if (! $absensi) {
            return back()->with('error', 'Anda belum absen masuk');
        }

        if ($absensi->jam_pulang) {
            return back()->with('error', 'Anda sudah absen pulang');
        }

        if ($jamSekarang < '15:00') {
            return back()->with('error', 'Belum waktunya pulang');
        }

        $absensi->update([
            'jam_pulang' => $jamSekarang,
        ]);

        return back()->with('success', 'Absen pulang berhasil');
    }

    /**
     * =========================
     * REKAP ABSENSI INDIVIDU
     * =========================
     */
    public function rekap()
    {
        $guru = Guru::where('user_id', Auth::id())->firstOrFail();

        $absensi = Absensi::where('guru_id', $guru->id)
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('guru.absensi.rekap', compact('guru', 'absensi'));
    }
}
