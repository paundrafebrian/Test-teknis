<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
        }

        table {
            font-size: 10px;
            table-layout: fixed;
            width: 100%;
        }

        th,
        td {
            padding: 2px;
            text-align: center;
            vertical-align: middle;
            word-wrap: break-word;
            overflow-wrap: break-word;
        }

        th {
            background-color: #003366;
            color: white;
        }

        .foto {
            width: 50px;
            /* Sesuaikan agar lebih kecil */
            height: 50px;
            object-fit: cover;
        }
    </style>
</head>

<body>

    <div class="container mt-3">
        <h5 class="text-center fw-bold">DAFTAR PEGAWAI</h5>

        <div class="table-responsive">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Tempat Lahir</th>
                        <th>Alamat</th>
                        <th>Tgl Lahir</th>
                        <th>L/P</th>
                        <th>Gol</th>
                        <th>Eselon</th>
                        <th>Jabatan</th>
                        <th>Tempat Tugas</th>
                        <th>Agama</th>
                        <th>Unit Kerja</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pegawais as $pegawai)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{ asset('storage/' . $pegawai->foto) }}" class="foto" alt="Foto"></td>
                        <td>{{ $pegawai->nip }}</td>
                        <td>{{ $pegawai->nama }}</td>
                        <td>{{ $pegawai->tempat_lahir }}</td>
                        <td>{{ $pegawai->alamat }}</td>
                        <td>{{ $pegawai->tanggal_lahir }}</td>
                        <td>{{ $pegawai->jenis_kelamin }}</td>
                        <td>{{ $pegawai->golongan }}</td>
                        <td>{{ $pegawai->eselon }}</td>
                        <td>{{ $pegawai->jabatan }}</td>
                        <td>{{ $pegawai->tempat_tugas }}</td>
                        <td>{{ $pegawai->agama }}</td>
                        <td>{{ $pegawai->unit_kerja }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
