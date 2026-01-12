<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Guru;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensi = Absensi::with('guru')->latest()->get();

        return view('admin.absensi.index', compact('absensi'));
    }

    public function userIndex()
    {
        $absensi = Absensi::with('guru')->latest()->get();
        return view('user.absensi', compact('absensi'));
    }

    public function create()
    {
        $guru = Guru::all();
        return view('admin.absensi.create', compact('guru'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'guru_id' => 'required|exists:gurus,id',
            'tanggal' => 'required|date',
            'status' => 'required|in:Hadir,Izin,Sakit,Alfa',
            'jam_datang' => 'nullable',
            'jam_pulang' => 'nullable',
        ]);

        Absensi::create([
            'guru_id' => $request->guru_id,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'jam_datang' => $request->jam_datang,
            'jam_pulang' => $request->jam_pulang,
        ]);

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $absensi = Absensi::findOrFail($id);
        $guru = Guru::all();

        return view('absensi.edit', compact('absensi', 'guru'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'guru_id' => 'required|exists:gurus,id',
            'tanggal' => 'required|date',
            'status' => 'required|in:Hadir,Izin,Sakit,Alfa',
            'jam_datang' => 'nullable',
            'jam_pulang' => 'nullable',
        ]);

        $absensi = Absensi::findOrFail($id);

        $absensi->update([
            'guru_id' => $request->guru_id,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'jam_datang' => $request->jam_datang,
            'jam_pulang' => $request->jam_pulang,
        ]);

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil diupdate');
    }

    public function destroy($id)
    {
        Absensi::findOrFail($id)->delete();

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil dihapus');
    }
}
