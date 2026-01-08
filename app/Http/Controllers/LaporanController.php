<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function index()
    {
        $laporan = Absensi::with('guru')->orderBy('tanggal', 'desc')->get();

        return view('laporan.index', [
            'laporan' => $laporan,
            'tanggal' => Carbon::now()->format('d-m-Y'),
            'jam' => Carbon::now()->format('H:i:s'),
        ]);
    }

    public function cetakPdf()
    {
        $laporan = Absensi::with('guru')->orderBy('tanggal', 'desc')->get();

        $pdf = Pdf::loadView('laporan.pdf', [
            'laporan' => $laporan,
            'tanggal' => Carbon::now()->format('d-m-Y'),
            'jam' => Carbon::now()->format('H:i:s'),
        ])->setPaper('A4', 'portrait');

        return $pdf->download('laporan-absensi-guru.pdf');
    }
}
