@extends('layouts.app')

@section('title', 'Profil Guru')

@section('content')
<div class="max-w-3xl mx-auto">

    <div class="bg-white shadow rounded-lg">
        <div class="px-5 py-3 bg-indigo-700 text-white rounded-t-lg">
            <h5 class="text-lg font-semibold">
                👤 Profil Guru
            </h5>
        </div>

        <div class="p-6">
            <form action="{{ route('guru_user.profil.update') }}" method="POST">
                @csrf

                {{-- NAMA --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">
                        Nama Lengkap
                    </label>
                    <input type="text" name="nama"
                        value="{{ old('nama', $guru->nama) }}"
                        class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        required>
                </div>

                {{-- ALAMAT --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">
                        Alamat
                    </label>
                    <textarea name="alamat" rows="3"
                        class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('alamat', $guru->alamat) }}</textarea>
                </div>

                {{-- NO HP --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">
                        No. HP
                    </label>
                    <input type="text" name="no_hp"
                        value="{{ old('no_hp', $guru->no_hp) }}"
                        class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                {{-- BUTTON --}}
                <div class="flex gap-2">
                    <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">
                        💾 Simpan
                    </button>

                    <a href="{{ route('guru_user.dashboard') }}"
                        class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded">
                        ⬅ Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
