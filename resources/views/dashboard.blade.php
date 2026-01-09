@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')

<div class="w-full space-y-6">

    {{-- CARD STATISTIK --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        {{-- TOTAL GURU --}}
        <div class="bg-white border border-gray-200 rounded-lg shadow p-5 flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-indigo-700 text-white flex items-center justify-center">
                <i class="bi bi-people-fill text-lg"></i>
            </div>
            <div>
                <div class="text-sm font-medium text-gray-500">Total Guru</div>
                <div class="mt-1 text-2xl font-bold text-gray-900">
                    {{ $totalGuru }}
                </div>
                <div class="text-xs text-gray-400 mt-1">Keseluruhan data guru</div>
            </div>
        </div>

        {{-- HADIR --}}
        <div class="bg-white border border-gray-200 rounded-lg shadow p-5 flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-emerald-600 text-white flex items-center justify-center">
                <i class="bi bi-check-circle-fill text-lg"></i>
            </div>
            <div>
                <div class="text-sm font-medium text-gray-500">Hadir</div>
                <div class="mt-1 text-2xl font-bold text-gray-900">
                    {{ $hadir }}
                </div>
                <div class="text-xs text-gray-400 mt-1">Jumlah hadir hari ini</div>
            </div>
        </div>

        {{-- IZIN --}}
        <div class="bg-white border border-gray-200 rounded-lg shadow p-5 flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-yellow-500 text-white flex items-center justify-center">
                <i class="bi bi-exclamation-circle-fill text-lg"></i>
            </div>
            <div>
                <div class="text-sm font-medium text-gray-500">Izin</div>
                <div class="mt-1 text-2xl font-bold text-gray-900">
                    {{ $izin }}
                </div>
                <div class="text-xs text-gray-400 mt-1">Jumlah izin hari ini</div>
            </div>
        </div>

        {{-- SAKIT --}}
        <div class="bg-white border border-gray-200 rounded-lg shadow p-5 flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-red-600 text-white flex items-center justify-center">
                <i class="bi bi-activity text-lg"></i>
            </div>
            <div>
                <div class="text-sm font-medium text-gray-500">Sakit</div>
                <div class="mt-1 text-2xl font-bold text-gray-900">
                    {{ $sakit }}
                </div>
                <div class="text-xs text-gray-400 mt-1">Jumlah sakit hari ini</div>
            </div>
        </div>
    </div>

    {{-- TABEL ABSENSI HARI INI --}}
    <div class="bg-white border border-gray-200 rounded-lg shadow">
        <div class="px-5 py-4 border-b flex items-center justify-between"
             style="background:#1f2a44;color:#f6f1e9">
            <h5 class="mb-0 font-semibold">
                📋 Absensi Guru Hari Ini
            </h5>
            <span class="text-sm">
                {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
            </span>
        </div>

        <div class="p-4 overflow-x-auto">
            <table class="min-w-full table table-bordered table-striped align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Guru</th>
                        <th>Status</th>
                        <th>Jam Datang</th>
                        <th>Jam Pulang</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($absensiHariIni as $no => $a)
                        <tr>
                            <td class="text-center">{{ $no + 1 }}</td>
                            <td>{{ $a->guru->nama }}</td>
                            <td class="text-center">
                                <span class="badge
                                    @if($a->status == 'Hadir') bg-success
                                    @elseif($a->status == 'Izin') bg-warning
                                    @elseif($a->status == 'Sakit') bg-danger
                                    @else bg-secondary
                                    @endif">
                                    {{ $a->status }}
                                </span>
                            </td>
                            <td class="text-center">
                                {{ $a->jam_datang ?? '-' }}
                            </td>
                            <td class="text-center">
                                {{ $a->jam_pulang ?? '-' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                Belum ada absensi hari ini
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection
