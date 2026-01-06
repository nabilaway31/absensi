<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Absensi Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
        }
        .sidebar {
            min-width: 200px;
            max-width: 200px;
            background-color: #343a40;
            color: #fff;
            height: 100vh;
            padding-top: 20px;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
            margin-bottom: 5px;
        }
        .sidebar a:hover {
            background-color: #495057;
            border-radius: 5px;
        }
        .content {
            flex: 1;
            padding: 20px;
        }
        .logout-btn {
            position: absolute;
            bottom: 20px;
            left: 20px;
            width: calc(100% - 40px);
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center">Admin Panel</h4>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="#">Data Guru</a>
        <a href="#">Absensi</a>
        <a href="#">Laporan</a>

        <!-- Logout -->
        <form action="{{ route('logout') }}" method="POST" class="logout-btn">
            @csrf
            <button type="submit" class="btn btn-danger w-100">Logout</button>
        </form>
    </div>

    <!-- Content -->
    <div class="content">
        <h1 class="mb-4">Dashboard Absensi Guru</h1>
        
        <div class="row">
            <div class="col-md-3">
                <div class="card text-bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Guru</h5>
                        <p class="card-text fs-4">{{ $totalGuru }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Hadir</h5>
                        <p class="card-text fs-4">{{ $hadir }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Izin</h5>
                        <p class="card-text fs-4">{{ $izin }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-bg-danger mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Sakit</h5>
                        <p class="card-text fs-4">{{ $sakit }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tambahan konten bisa ditaruh di sini -->
    </div>
</body>
</html>
