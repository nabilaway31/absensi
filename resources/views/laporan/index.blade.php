@extends('layouts.app')

@section('title', 'Laporan Absensi')

@section('content')
    <div class="w-full">
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <div class="px-4 py-3 bg-gray-800 text-white">
                <h5 class="text-lg font-semibold"><i class="bi bi-bar-chart-line"></i> Laporan Rekap Absensi</h5>
            </div>

            <div class="p-4">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">Tanggal</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">Status</th>
                                <th class="px-4 py-2 text-right text-xs font-medium text-gray-500">Total</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach ($laporan as $row)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-3 text-sm text-gray-800">{{ $row->tanggal }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-700">{{ ucfirst($row->status) }}</td>
                                    <td class="px-4 py-3 text-sm text-right text-gray-600">{{ $row->total }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection