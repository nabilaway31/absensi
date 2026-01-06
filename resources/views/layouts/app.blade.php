<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Absensi Guru')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            background-color: #f8f9fa;
        }

        .sidebar {
            width: 240px;
            min-height: 100vh;
            background-color: #1f2a44;
        }

        .sidebar a {
            color: #eaeaea;
            text-decoration: none;
        }

        .sidebar a.active,
        .sidebar a:hover {
            background-color: #2e3c63;
            color: #fff;
        }
    </style>
</head>
<body>

<div class="d-flex">
    {{-- SIDEBAR --}}
    @include('partials.sidebar')

    {{-- CONTENT --}}
    <div class="flex-fill p-4">
        @yield('content')
    </div>
</div>

{{-- SWEETALERT --}}
@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil',
    text: '{{ session('success') }}',
    timer: 2000,
    showConfirmButton: false
});
</script>
@endif

@if(session('error'))
<script>
Swal.fire({
    icon: 'error',
    title: 'Gagal',
    text: '{{ session('error') }}'
});
</script>
@endif

</body>
</html>
