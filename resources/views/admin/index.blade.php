@extends('layouts.app')

@section('title', 'Data Admin')

@section('content')
<div class="card shadow">
    <div class="card-header text-white" style="background:#6a11cb">
        <h5 class="mb-0">👤 Data Admin</h5>
    </div>

    <div class="card-body">
        <table class="table table-bordered align-middle">
            <thead class="table-secondary text-center">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($admins as $no => $a)
                <tr>
                    <td class="text-center">{{ $no + 1 }}</td>
                    <td>{{ $a->name }}</td>
                    <td>{{ $a->email }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
