@extends('layouts.app')

@section('title', 'Edit Guru')

@section('content')
<div class="card shadow">
    <div class="card-header" style="background:#1f2a44;color:#f5f5dc">
        ✏️ Edit Data Guru
    </div>

    <div class="card-body">
        <form action="{{ route('guru.update', $guru->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>NIP</label>
                <input type="text" name="nip" value="{{ $guru->nip }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" value="{{ $guru->nama }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control">
                    <option value="Laki-laki" {{ $guru->jenis_kelamin=='Laki-laki'?'selected':'' }}>Laki-laki</option>
                    <option value="Perempuan" {{ $guru->jenis_kelamin=='Perempuan'?'selected':'' }}>Perempuan</option>
                </select>
            </div>

            <button class="btn btn-primary">💾 Simpan</button>
            <a href="/guru" class="btn btn-secondary">⬅️ Kembali</a>
        </form>
    </div>
</div>
@endsection
