@extends('layouts.app')

@section('title', 'Laporan Absensi')

@section('content')
<div class="card shadow">
    <div class="card-header" style="background:#1f2a44;color:#f5f5dc">
        <h5>📊 Laporan Rekap Absensi</h5>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laporan as $row)
                <tr>
                    <td>{{ $row->tanggal }}</td>
                    <td>{{ ucfirst($row->status) }}</td>
                    <td>{{ $row->total }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
