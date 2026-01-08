<!DOCTYPE html>
<html>
<head>
    <title>Laporan Absensi Guru</title>
    <style>
        body {
            font-family: DejaVu Sans;
            font-size: 12px;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
        }
        th {
            background: #1f2a44;
            color: white;
        }
    </style>
</head>
<body>

<h2>LAPORAN ABSENSI GURU</h2>

<p>
    Tanggal Cetak: <b>{{ $tanggal }}</b><br>
    Jam Cetak: <b>{{ $jam }}</b>
</p>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Guru</th>
            <th>Tanggal</th>
            <th>Jam Masuk</th>
            <th>Jam Pulang</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($laporan as $no => $l)
        <tr>
            <td>{{ $no + 1 }}</td>
            <td>{{ $l->guru->nama }}</td>
            <td>{{ $l->tanggal }}</td>
            <td>{{ $l->jam_masuk ?? '-' }}</td>
            <td>{{ $l->jam_pulang ?? '-' }}</td>
            <td>{{ $l->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
