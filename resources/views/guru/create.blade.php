@extends('layouts.app')

@section('title', 'Tambah Guru')

@section('content')
<div class="card shadow">
    <div class="card-header" style="background:#1f2a44;color:white">
        <h5>➕ Tambah Guru</h5>
    </div>

    <div class="card-body">
        <form action="/guru/simpan" method="POST">
            @csrf

            <div class="mb-3">
                <label>NIP</label>
                <input type="text" name="nip" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control">
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label>No HP</label>
                <input type="text" name="no_hp" class="form-control">
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control"></textarea>
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="/guru" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
