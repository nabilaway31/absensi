@extends('layouts.app')

@section('title', 'Data Guru')

@section('content') 

<div class="w-full">

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white border border-gray-200 rounded-lg shadow p-5 flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-indigo-700 text-white flex items-center justify-center">
                <i class="bi bi-people-fill text-lg"></i>
            </div>
            <div>
                <div class="text-sm font-medium text-gray-500">Total Guru</div>
                <div class="mt-1 text-2xl font-bold text-gray-900">{{ $totalGuru }}</div>
                <div class="text-xs text-gray-400 mt-1">Keseluruhan data guru</div>
            </div>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg shadow p-5 flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-emerald-600 text-white flex items-center justify-center">
                <i class="bi bi-check-circle-fill text-lg"></i>
            </div>
            <div>
                <div class="text-sm font-medium text-gray-500">Hadir</div>
                <div class="mt-1 text-2xl font-bold text-gray-900">{{ $hadir }}</div>
                <div class="text-xs text-gray-400 mt-1">Jumlah hadir hari ini</div>
            </div>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg shadow p-5 flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-yellow-600 text-white flex items-center justify-center">
                <i class="bi bi-exclamation-circle-fill text-lg"></i>
            </div>
            <div>
                <div class="text-sm font-medium text-gray-500">Izin</div>
                <div class="mt-1 text-2xl font-bold text-gray-900">{{ $izin }}</div>
                <div class="text-xs text-gray-400 mt-1">Jumlah izin hari ini</div>
            </div>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg shadow p-5 flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-red-600 text-white flex items-center justify-center">
                <i class="bi bi-activity text-lg"></i>
            </div>
            <div>
                <div class="text-sm font-medium text-gray-500">Sakit</div>
                <div class="mt-1 text-2xl font-bold text-gray-900">{{ $sakit }}</div>
                <div class="text-xs text-gray-400 mt-1">Jumlah sakit hari ini</div>
            </div>
        </div>
    </div>
</div>

@endsection