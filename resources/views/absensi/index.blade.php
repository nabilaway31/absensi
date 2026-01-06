@extends('layouts.app')

@section('title', 'Absensi Guru')

@section('content')
    <div class="w-full">
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <div class="flex items-center justify-between px-4 py-3 bg-gray-800 text-white">
                <div class="flex items-center gap-3">
                    <i class="bi bi-journal-text text-xl"></i>
                    <h5 class="mb-0 text-lg font-semibold">Data Absensi</h5>
                </div>
                <a href="/absensi/tambah"
                    class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm px-3 py-1.5 rounded">
                    <span class="hidden sm:inline">Tambah Absensi</span>
                </a>
            </div>

            <div class="p-4">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">No</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">Nama Guru</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">Tanggal</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">Status</th>
                                <th class="px-4 py-2 text-center text-xs font-medium text-gray-500">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach ($absensi as $no => $a)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-3 text-sm text-gray-700">{{ $no + 1 }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-800">{{ $a->guru->nama }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-600">{{ $a->tanggal }}</td>
                                    <td class="px-4 py-3 text-sm">
                                        <span
                                            class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium {{ $a->status == 'hadir' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                            {{ ucfirst($a->status) }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-center">
                                        <a href="/absensi/edit/{{ $a->id }}" title="Edit"
                                            class="inline-flex items-center justify-center w-8 h-8 bg-yellow-400 hover:bg-yellow-500 text-white rounded-full mr-2">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <button onclick="hapus({{ $a->id }})" title="Hapus"
                                            class="inline-flex items-center justify-center w-8 h-8 bg-red-600 hover:bg-red-700 text-white rounded-full">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function hapus(id) {
            Swal.fire({
                title: 'Yakin?',
                text: 'Data absensi akan dihapus',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/absensi/hapus/' + id;
                }
            });
        }
    </script>
@endsection