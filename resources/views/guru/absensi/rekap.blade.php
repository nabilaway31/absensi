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
                    <td class="text-center">{{ $a->tanggal }}</td>
                    <td class="text-center">
                        {{ $a->jam_masuk ?? '-' }}
                    </td>
                    <td class="text-center">
                        {{ $a->jam_pulang ?? '-' }}
                    </td>
                    <td class="text-center">
                        <span class="badge
                            @if($a->status == 'Hadir') bg-success
                            @elseif($a->status == 'Alfa') bg-danger
                            @else bg-secondary
                            @endif">
                            {{ $a->status }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        Belum ada data absensi
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
