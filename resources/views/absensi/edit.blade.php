@extends('layouts.app')

@section('title', 'Edit Absensi')

@section('content')
    <div class="w-full">
        <div class="bg-white shadow rounded-lg overflow-hidden border border-gray-200">
            <div class="px-4 py-3 bg-gray-800 text-white flex items-center gap-3">
                <i class="bi bi-journal-check text-lg"></i>
                <h5 class="text-lg font-semibold">Edit Absensi</h5>
            </div>

            <div class="p-6">
                <form action="/absensi/update/{{ $absensi->id }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Guru</label>
                        <select name="guru_id" required
                            class="mt-1 block w-full rounded-md border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @foreach ($guru as $g)
                                <option value="{{ $g->id }}" {{ $absensi->guru_id == $g->id ? 'selected' : '' }}>
                                    {{ $g->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tanggal</label>
                            <input type="date" name="tanggal"
                                class="mt-1 block w-full rounded-md border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                value="{{ old('tanggal', $absensi->tanggal ?? date('Y-m-d')) }}" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status"
                                class="mt-1 block w-full rounded-md border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="Hadir" {{ $absensi->status == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                                <option value="Izin" {{ $absensi->status == 'Izin' ? 'selected' : '' }}>Izin</option>
                                <option value="Sakit" {{ $absensi->status == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                                <option value="Alfa" {{ $absensi->status == 'Alfa' ? 'selected' : '' }}>Alfa</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex items-center gap-2">
                        <button
                            class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">
                            <i class="bi bi-save"></i> Update
                        </button>
                        <a href="/absensi"
                            class="inline-flex items-center gap-2 bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection