@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h4 class="mb-4">👋 Selamat Datang di Sistem Absensi Guru</h4>

<div class="row g-4">

    <div class="col-md-3">
        <div class="card shadow border-0" style="background:#1f2a44;color:#f5f0e6">
            <div class="card-body text-center">
                <h1>👩‍🏫</h1>
                <h5>Total Guru</h5>
                <h3>{{ $jumlahGuru }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow border-0" style="background:#2c3e5c;color:#f5f0e6">
            <div class="card-body text-center">
                <h1>📝</h1>
                <h5>Total Absensi</h5>
                <h3>{{ $jumlahAbsensi }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow border-0" style="background:#3b82f6;color:white">
            <div class="card-body text-center">
                <h1>✅</h1>
                <h5>Hadir</h5>
                <h3>{{ $hadir }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow border-0" style="background:#ef4444;color:white">
            <div class="card-body text-center">
                <h1>❌</h1>
                <h5>Alfa</h5>
                <h3>{{ $alfa }}</h3>
            </div>
        </div>
    </div>

</div>
@endsection
