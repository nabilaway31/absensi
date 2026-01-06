<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Absensi Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Dashboard Absensi Guru</h1>
    
    <div class="row">
        <div class="col-md-3">
            <div class="card text-bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Guru</h5>
                    <p class="card-text">{{ $totalGuru }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Hadir</h5>
                    <p class="card-text">{{ $hadir }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Izin</h5>
                    <p class="card-text">{{ $izin }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">Sakit</h5>
                    <p class="card-text">{{ $sakit }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
