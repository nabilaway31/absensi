@extends('layouts.app')

@section('title', 'Edit Guru')

@section('content')
<div class="card shadow">
    <div class="card-header" style="background:#1f2a44;color:white">
        <h5>✏️ Edit Guru</h5>
    </div>

    <div class="card-body">
        <form action="/guru/update/{{ $guru->id }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>NIP</label>
                <input type="text" name="nip" value="{{ $guru->nip }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" value="{{ $guru->nama }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control">
                    <option {{ $guru->jenis_kelamin=='Laki-laki'?'selected':'' }}>Laki-laki</option>
                    <option {{ $guru->jenis_kelamin=='Perempuan'?'selected':'' }}>Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label>No HP</label>
                <input type="text" name="no_hp" value="{{ $guru->no_hp }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control">{{ $guru->alamat }}</textarea>
            </div>

            <button class="btn btn-warning">Update</button>
            <a href="/guru" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
