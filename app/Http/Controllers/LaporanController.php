<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    /**
     * =========================
     * TAMPILAN LAPORAN (WEB)
     * =========================
     */
    public function index()
    {
        $laporan = Absensi::with('guru')
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('laporan.index', compact('laporan'));
    }

    /**
     * =========================
     * CETAK LAPORAN PDF
     * =========================
     */
    public function cetak()
    {
        $laporan = Absensi::with('guru')
            ->orderBy('tanggal', 'desc')
            ->get();

        // Tanggal & jam cetak
        $tanggal = Carbon::now()->translatedFormat('d F Y');
        $jam     = Carbon::now()->format('H:i');

        $pdf = Pdf::loadView('laporan.pdf', [
            'laporan' => $laporan,
            'tanggal' => $tanggal,
            'jam'     => $jam,
        ])->setPaper('A4', 'landscape');

        return $pdf->download('laporan-absensi-guru.pdf');
    }
}
