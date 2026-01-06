<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::all();
        return view('guru.index', compact('guru'));
    }

    public function create()
    {
        return view('guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required'
        ]);

        Guru::create($request->all());

        return redirect('/guru')->with('success', 'Data guru berhasil ditambahkan');
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.edit', compact('guru'));
    }


    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);
        $guru->update($request->all());

        return redirect('/guru')->with('success', 'Data guru berhasil diupdate');
    }

    public function destroy($id)
    {
        Guru::findOrFail($id)->delete();
        return redirect('/guru')->with('success', 'Data guru berhasil dihapus');
    }
}
