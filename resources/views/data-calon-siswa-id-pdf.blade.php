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

        .header {
            text-align: center;
            border: 1px solid black;
        }

        .body {
            border: 1px solid black;
            margin-top: 20px
        }

        .body>div:first-child {
            border: 1px solid black;
            font-weight: bold;
        }

        .body>div:nth-child(2) {
            border: 1px solid black;
            margin-top: 20px;
            text-align: left;
            padding: 0 20px;
        }

        .text-bold {
            font-weight: bold;
        }

        table {
            border-collapse: collapse;
            border: solid 1px black;
            width: 100%;
            font-size: 14px;
        }

        .align-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="header">
        <h4>BUKTI PENERIMAAN</h4>
        <h4>{{ $dataCalonSiswa->periode->name }}</h4>
    </div>
    <div class="body">
        <div class="">DATA DIRI SISWA</div>
        <div class="">
            <table style="width:100%">
                <tr>
                    <th>Nama Siswa</th>
                    <td>{{ $dataCalonSiswa->user->name }}</td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>{{ $dataCalonSiswa->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <th>NIK</th>
                    <td>{{ $dataCalonSiswa->nik }}</td>
                </tr>
                <tr>
                    <th>Tempat, Tanggal Lahir</th>
                    <td>{{ $dataCalonSiswa->tempat_lahir }}, {{ $dataCalonSiswa->tgl_lahir }}
                    </td>
                </tr>
                <tr>
                    <th>No KIP</th>
                    <td>{{ $dataCalonSiswa->no_kip ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $dataCalonSiswa->alamat }}</td>
                </tr>
                <tr>
                    <th>Asal Sekolah</th>
                    <td>{{ $dataCalonSiswa->asal_sekolah }}</td>
                </tr>
                <tr>
                    <th>Jalur</th>
                    <td>{{ $dataCalonSiswa->user->jalur }}</td>
                </tr>
            </table>
        </div>
        <div class="">
            <p class="text-bold">NILAI SISWA</p>
            <table style="width:100%" border="1">
                <tr>
                    <th rowspan="2">Kelas</th>
                    <th colspan="2">Kelas 4</th>
                    <th colspan="2">Kelas 5</th>
                    <th>Kelas 6</th>
                </tr>
                <tr>
                    <th>Ganjil</th>
                    <th>Genap</th>
                    <th>Ganjil</th>
                    <th>Genap</th>
                    <th>Ganjil</th>
                </tr>
                <tr>
                    <td>Nilai</td>
                    <td class="align-center">{{ $dataCalonSiswa->nilaiRapot->semester_ganjil_kelas_4 }}</td>
                    <td class="align-center">{{ $dataCalonSiswa->nilaiRapot->semester_genap_kelas_4 }}</td>
                    <td class="align-center">{{ $dataCalonSiswa->nilaiRapot->semester_ganjil_kelas_5 }}</td>
                    <td class="align-center">{{ $dataCalonSiswa->nilaiRapot->semester_genap_kelas_5 }}</td>
                    <td class="align-center">{{ $dataCalonSiswa->nilaiRapot->semester_ganjil_kelas_6 }}</td>
                </tr>
                <tr>
                    <td>Rata - rata</td>
                    <td colspan="5" class="align-center">{{ $dataCalonSiswa->nilaiRapot->average }}</td>
                </tr>
            </table>
        </div>
        <div class="">
            <p>Diterima pada periode {{ $dataCalonSiswa->periode->name }}</p>
        </div>
    </div>
</body>

</html>
