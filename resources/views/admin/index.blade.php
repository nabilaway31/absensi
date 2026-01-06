@extends('layouts.app')

@section('title', 'Data Admin')

@section('content')
    <div class="w-full">
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <div class="flex items-center justify-between px-4 py-3 bg-indigo-700 text-white">
                <div class="flex items-center gap-3">
                    <i class="bi bi-person-fill text-2xl"></i>
                    <h5 class="mb-0 text-lg font-semibold">Data Admin</h5>
                </div>
            </div>

            <div class="p-4">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">No</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">Nama</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">Email</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach ($admins as $no => $a)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-3 text-sm text-gray-700">{{ $no + 1 }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-800">{{ $a->name }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-600">{{ $a->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection