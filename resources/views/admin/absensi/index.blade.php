@extends('admin.layouts.app')

@section('title', 'Absensi Guru')

@section('content')
<div class="card shadow border-0">
    <div class="card-header d-flex justify-content-between align-items-center text-white"
        style="background:#1f2a44">
        <h5 class="mb-0">📝 Data Absensi Guru</h5>
        <a href="/absensi/tambah" class="btn btn-light btn-sm">
            + Tambah Absensi
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Guru</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Jam Datang</th>
                        <th>Jam Pulang</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($absensi as $no => $a)
                        <tr>
                            <td class="text-center">{{ $no + 1 }}</td>
                            <td>{{ $a->guru->nama }}</td>
                            <td class="text-center">{{ $a->tanggal }}</td>
                            <td class="text-center">
                                <span class="badge 
                                    @if($a->status == 'Hadir') bg-success
                                    @elseif($a->status == 'Izin') bg-warning
                                    @elseif($a->status == 'Sakit') bg-info
                                    @else bg-danger
                                    @endif">
                                    {{ $a->status }}
                                </span>
                            </td>
                            <td class="text-center">
                                {{ $a->jam_datang ?? '-' }}
                            </td>
                            <td class="text-center">
                                {{ $a->jam_pulang ?? '-' }}
                            </td>
                            <td class="text-center">
                                <a href="/absensi/edit/{{ $a->id }}" class="btn btn-warning btn-sm">
                                    Edit
                                </a>
                                <button class="btn btn-danger btn-sm" onclick="hapus({{ $a->id }})">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">
                                Belum ada data absensi
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- SWEETALERT --}}
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
