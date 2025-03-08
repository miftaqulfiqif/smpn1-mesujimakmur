<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 10 auto;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            border: solid 1px #ccc;
            width: 100%;
            font-size: 12px;
        }

        th,
        td {
            border: solid 1px #ccc;
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>

<body>
    <h1>Daftar Siswa Diterima</h1>
    <h2>{{ $periodeName }}</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>NISN</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Jalur</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($data as $siswa)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $siswa['user']['name'] }}</td>
                    <td>{{ $siswa['nik'] }}</td>
                    <td>{{ $siswa['user']['nisn'] }}</td>
                    <td>{{ $siswa['tempat_lahir'] }}</td>
                    <td>{{ $siswa['tgl_lahir'] }}</td>
                    <td>{{ $siswa['user']['jalur'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
