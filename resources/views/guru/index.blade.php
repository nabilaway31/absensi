@extends('layouts.app')

@section('title', 'Data Guru')

@section('content')
<div class="card shadow">
    <div class="card-header d-flex justify-content-between" style="background:#1f2a44;color:white">
        <h5 class="mb-0">👩‍🏫 Data Guru</h5>
        <a href="/guru/tambah" class="btn btn-light btn-sm">+ Tambah</a>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>JK</th>
                    <th>HP</th>
                    <th width="160">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guru as $no => $g)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $g->nip }}</td>
                    <td>{{ $g->nama }}</td>
                    <td>{{ $g->jenis_kelamin }}</td>
                    <td>{{ $g->no_hp }}</td>
                    <td>
                        <a href="/guru/edit/{{ $g->id }}" class="btn btn-warning btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm" onclick="hapus({{ $g->id }})">
                            Hapus
                        </button>
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
        text: 'Data guru akan dihapus!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '/guru/hapus/' + id;
        }
    });
}
</script>
@endsection
