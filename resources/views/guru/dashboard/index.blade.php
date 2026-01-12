@extends('layouts.app')

@section('title', 'Dashboard Guru')

@section('content')
<div class="max-w-5xl mx-auto space-y-6">

    {{-- DATA GURU --}}
    <div class="bg-white shadow rounded-lg p-6">
        <h5 class="text-lg font-semibold mb-2">👤 Data Guru</h5>
        <p><b>Nama :</b> {{ $guru->nama }}</p>
        <p><b>No HP :</b> {{ $guru->no_hp ?? '-' }}</p>
        <p><b>Alamat :</b> {{ $guru->alamat ?? '-' }}</p>
    </div>

    {{-- STATUS ABSENSI --}}
    <div class="bg-white shadow rounded-lg p-6">
        <h5 class="text-lg font-semibold mb-4">🕘 Absensi Hari Ini</h5>

        <p class="mb-3">
            <b>Tanggal :</b> {{ date('d M Y') }} <br>
            <b>Jam Sekarang :</b> {{ $jamSekarang }}
        </p>

        @if ($absensiHariIni)
            <div class="mb-4">
                <span class="px-3 py-1 rounded text-white
                    {{ $absensiHariIni->status == 'Hadir' ? 'bg-green-600' : 'bg-red-600' }}">
                    {{ $absensiHariIni->status }}
                </span>
            </div>
        @else
            <div class="mb-4">
                <span class="px-3 py-1 rounded bg-gray-400 text-white">
                    Belum Absen
                </span>
            </div>
        @endif

        {{-- TOMBOL ABSEN --}}
        <div class="flex gap-3">
            {{-- ABSEN MASUK --}}
            <form action="{{ route('guru_user.absen.masuk') }}" method="POST">
                @csrf
                <button
                    class="px-4 py-2 rounded text-white
                    {{ $absensiHariIni ? 'bg-gray-400 cursor-not-allowed' : 'bg-indigo-600 hover:bg-indigo-700' }}"
                    {{ $absensiHariIni ? 'disabled' : '' }}>
                    ⏰ Absen Masuk
                </button>
            </form>

            {{-- ABSEN PULANG --}}
            <form action="{{ route('guru_user.absen.pulang') }}" method="POST">
                @csrf
                <button
                    class="px-4 py-2 rounded text-white
                    {{ !$absensiHariIni ? 'bg-gray-400 cursor-not-allowed' : 'bg-emerald-600 hover:bg-emerald-700' }}"
                    {{ !$absensiHariIni ? 'disabled' : '' }}>
                    🏁 Absen Pulang
                </button>
            </form>
        </div>
    </div>

</div>
@endsection
