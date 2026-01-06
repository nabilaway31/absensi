@extends('layouts.app')

@section('title', 'Tambah Absensi')

@section('content')
<div class="card shadow">
    <div class="card-header" style="background:#1f2a44;color:white">
        <h5>➕ Tambah Absensi</h5>
    </div>

    <div class="card-body">
        <form action="/absensi/simpan" method="POST">
            @csrf

            <div class="mb-3">
                <label>Guru</label>
                <select name="guru_id" class="form-control">
                    @foreach ($guru as $g)
                        <option value="{{ $g->id }}">{{ $g->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option>Hadir</option>
                    <option>Izin</option>
                    <option>Sakit</option>
                    <option>Alfa</option>
                </select>
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="/absensi" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
