@extends('layouts.app')

@section('title', 'Rekap Absensi')

@section('content')
<div class="space-y-6">

    {{-- HEADER --}}
    <div class="bg-white p-5 rounded-lg shadow border">
        <h2 class="text-xl font-semibold text-gray-800">
            📋 Rekap Absensi Pribadi
        </h2>
        <p class="text-sm text-gray-500">
            Nama: <b>{{ $guru->nama }}</b>
        </p>
    </div>

    {{-- FILTER --}}
    <div class="bg-white p-4 rounded-lg shadow border">
        <form method="GET" class="row g-3 align-items-end">

            <div class="col-md-3">
                <label class="form-label">Bulan</label>
                <select name="bulan" class="form-select">
                    <option value="">Semua Bulan</option>
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}"
                            {{ request('bulan') == $i ? 'selected' : '' }}>
                            {{ Carbon\Carbon::create()->month($i)->translatedFormat('F') }}
                        </option>
                    @endfor
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label">Tahun</label>
                <select name="tahun" class="form-select">
                    <option value="">Semua Tahun</option>
                    @for ($y = now()->year; $y >= now()->year - 5; $y--)
                        <option value="{{ $y }}"
                            {{ request('tahun') == $y ? 'selected' : '' }}>
                            {{ $y }}
                        </option>
                    @endfor
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="">Semua Status</option>
                    <option value="Hadir" {{ request('status') == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                    <option value="Telat" {{ request('status') == 'Telat' ? 'selected' : '' }}>Telat</option>
                    <option value="Alfa" {{ request('status') == 'Alfa' ? 'selected' : '' }}>Alfa</option>
                </select>
            </div>

            <div class="col-md-3 d-flex gap-2">
                <button class="btn btn-primary w-100">
                    🔍 Filter
                </button>
                <a href="{{ route('guru_user.rekap') }}"
                   class="btn btn-secondary w-100">
                    🔄 Reset
                </a>
            </div>

        </form>
    </div>

    {{-- TABEL --}}
    <div class="bg-white rounded-lg shadow border overflow-x-auto">
        <table class="table table-bordered table-striped mb-0">
            <thead class="table-dark text-center">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Jam Masuk</th>
                    <th>Jam Pulang</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($absensi as $no => $a)
                @php
                    $telat = $a->jam_masuk && $a->jam_masuk > '07:00';
                @endphp
                <tr class="{{ $telat ? 'table-danger' : '' }}">
                    <td class="text-center">{{ $no + 1 }}</td>
                    <td class="text-center">{{ \Carbon\Carbon::parse($a->tanggal)->format('d-m-Y') }}</td>
                    <td class="text-center">
                        {{ $a->jam_masuk ?? '-' }}
                    </td>
                    <td class="text-center">
                        {{ $a->jam_pulang ?? '-' }}
                    </td>
                    <td class="text-center">
                        <span class="badge
                            @if($a->status == 'Hadir') bg-success
                            @elseif($a->status == 'Telat') bg-warning
                            @elseif($a->status == 'Alfa') bg-danger
                            @else bg-secondary
                            @endif">
                            {{ $a->status }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted py-4">
                        Belum ada data absensi
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
