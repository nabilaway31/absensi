@extends('layouts.app')

@section('title', 'Laporan Absensi')

@section('content')
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center"
        style="background:#1f2a44;color:#f6f1e9">
        <h5 class="mb-0">📊 Laporan Absensi Guru</h5>
        <a href="/laporan/pdf" class="btn btn-light btn-sm">
            🖨️ Cetak PDF
        </a>
    </div>

    <div class="card-body">
        <p class="text-muted">
            Tanggal: <b>{{ $tanggal }}</b> |
            Jam: <b>{{ $jam }}</b>
        </p>

        <table class="table table-bordered table-striped">
            <thead style="background:#1f2a44;color:white">
                <tr>
                    <th>No</th>
                    <th>Nama Guru</th>
                    <th>Tanggal</th>
                    <th>Jam Masuk</th>
                    <th>Jam Pulang</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laporan as $no => $l)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $l->guru->nama }}</td>
                    <td>{{ $l->tanggal }}</td>
                    <td>{{ $l->jam_masuk ?? '-' }}</td>
                    <td>{{ $l->jam_pulang ?? '-' }}</td>
                    <td>
                        <span class="badge bg-success">
                            {{ $l->status }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
