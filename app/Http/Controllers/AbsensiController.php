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
        return view('absensi.index', compact('absensi'));
    }

    public function create()
    {
        $guru = Guru::all();
        return view('absensi.create', compact('guru'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'guru_id' => 'required',
            'tanggal' => 'required',
            'status' => 'required'
        ]);

        Absensi::create($request->all());

        return redirect('/absensi')->with('success', 'Absensi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $absensi = Absensi::findOrFail($id);
        $guru = Guru::all();
        return view('absensi.edit', compact('absensi', 'guru'));
    }

    public function update(Request $request, $id)
    {
        $absensi = Absensi::findOrFail($id);
        $absensi->update($request->all());

        return redirect('/absensi')->with('success', 'Absensi berhasil diupdate');
    }

    public function destroy($id)
    {
        Absensi::findOrFail($id)->delete();
        return redirect('/absensi')->with('success', 'Absensi berhasil dihapus');
    }
}
