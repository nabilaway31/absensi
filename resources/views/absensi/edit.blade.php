@extends('layouts.app')

@section('title', 'Edit Absensi')

@section('content')
<div class="card shadow">
    <div class="card-header bg-warning text-dark">
        Edit Absensi Guru
    </div>

    <div class="card-body">
        <form action="/absensi/update/{{ $absensi->id }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Nama Guru</label>
                <select name="guru_id" class="form-select" required>
                    @foreach ($guru as $g)
                        <option value="{{ $g->id }}"
                            {{ $absensi->guru_id == $g->id ? 'selected' : '' }}>
                            {{ $g->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control"
                       value="{{ $absensi->tanggal }}" required>
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-select" required>
                    <option value="Hadir" {{ $absensi->status == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                    <option value="Izin" {{ $absensi->status == 'Izin' ? 'selected' : '' }}>Izin</option>
                    <option value="Sakit" {{ $absensi->status == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                    <option value="Alfa" {{ $absensi->status == 'Alfa' ? 'selected' : '' }}>Alfa</option>
                </select>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="/absensi" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection