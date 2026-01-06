@extends('layouts.app')

@section('title', 'Absensi Guru')

@section('content')
<div class="card shadow">
    <div class="card-header d-flex justify-content-between" style="background:#1f2a44;color:white">
        <h5 class="mb-0">📝 Data Absensi</h5>
        <a href="/absensi/tambah" class="btn btn-light btn-sm">+ Tambah</a>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Guru</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th width="160">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($absensi as $no => $a)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $a->guru->nama }}</td>
                    <td>{{ $a->tanggal }}</td>
                    <td>{{ $a->status }}</td>
                    <td>
                        <a href="/absensi/edit/{{ $a->id }}" class="btn btn-warning btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm" onclick="hapus({{ $a->id }})">Hapus</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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
