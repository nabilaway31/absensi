<!DOCTYPE html>
<html>
<head>
    <title>Laporan Absensi Guru</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        table, th, td { border: 1px solid #000; }
        th { background: #f2f2f2; text-align: center; }
        td { padding: 5px; text-align: center; }
        .left { text-align: left; }
    </style>
</head>
<body>

<h2>LAPORAN ABSENSI GURU</h2>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Guru</th>
            <th>Hadir</th>
            <th>Izin</th>
            <th>Sakit</th>
            <th>Alfa</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($laporan as $no => $l)
        <tr>
            <td>{{ $no + 1 }}</td>
            <td class="left">{{ $l->nama }}</td>
            <td>{{ $l->hadir }}</td>
            <td>{{ $l->izin }}</td>
            <td>{{ $l->sakit }}</td>
            <td>{{ $l->alfa }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<p>Dicetak pada: {{ date('d-m-Y') }}</p>

</body>
</html>
