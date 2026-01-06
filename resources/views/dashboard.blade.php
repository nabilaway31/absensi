@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h4 class="mb-4">📊 Dashboard Absensi Guru</h4>

<div class="row g-3">
    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h6>Total Guru</h6>
                <h3>12</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h6>Hadir Hari Ini</h6>
                <h3>8</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h6>Izin</h6>
                <h3>2</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h6>Alpha</h6>
                <h3>2</h3>
            </div>
        </div>
    </div>
</div>

<hr class="my-4">

<div class="card shadow-sm border-0">
    <div class="card-body">
        <h6>📌 Informasi</h6>
        <p class="mb-0">Sistem absensi guru berbasis Laravel.</p>
    </div>
</div>
@endsection
