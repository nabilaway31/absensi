@extends('layouts.app')

@section('title', 'Tambah Absensi')

@section('content')
<div class="card shadow">
    <div class="card-header text-white" style="background:#1f2a44">
        📝 Tambah Absensi Guru
    </div>

    <div class="card-body">
        <form action="/absensi/simpan" method="POST">
            @csrf

            <div class="mb-3">
                <label>Guru</label>
                <select name="guru_id" class="form-control" required>
                    @foreach($guru as $g)
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
                <select name="status" class="form-control" required>
                    <option>Hadir</option>
                    <option>Izin</option>
                    <option>Sakit</option>
                    <option>Alfa</option>
                </select>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Jam Datang</label>
                    <input type="time" name="jam_datang" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Jam Pulang</label>
                    <input type="time" name="jam_pulang" class="form-control">
                </div>
            </div>

            <button class="btn btn-success">Simpan</button>
            <a href="/absensi" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
