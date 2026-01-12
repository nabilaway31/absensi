@extends('admin.layouts.app')

@section('title', 'Laporan Absensi')

@section('content')
<div class="card shadow shadow-4">
    <div class="card-header d-flex justify-content-between align-items-center"
        style="background:#1f2a44;color:#f6f1e9">
        <h5 class="mb-0">📊 Laporan Absensi Guru</h5>
        <a href="/laporan/cetak" class="btn btn-light btn-sm">
            🖨️ Cetak PDF
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead style="background:#1f2a44;color:white" class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Guru</th>
                        <th>Tanggal</th>
                        <th>Jam Datang</th>
                        <th>Jam Pulang</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($laporan as $no => $l)
                        <tr>
                            <td class="text-center">{{ $no + 1 }}</td>
                            <td>{{ $l->guru->nama }}</td>
                            <td class="text-center">{{ $l->tanggal }}</td>
                            <td class="text-center">{{ $l->jam_datang ?? '-' }}</td>
                            <td class="text-center">{{ $l->jam_pulang ?? '-' }}</td>
                            <td class="text-center">
                                <span class="badge 
                                    @if($l->status == 'Hadir') bg-success
                                    @elseif($l->status == 'Izin') bg-warning
                                    @elseif($l->status == 'Sakit') bg-info
                                    @else bg-danger
                                    @endif">
                                    {{ $l->status }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                Belum ada data laporan absensi
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
