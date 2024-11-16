<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jamaah</title>
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="body">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <h1>Daftar Jamaah</h1>
    <div class="table-responsive table table-bordered">

        <table class="table">
            <thead style="vertical-align:middle">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Provinsi</th>
                    <th>Kab/Kota</th>
                    <th>Kecamatan</th>
                    <th>Kelurahan/Desa</th>
                    <th>Jenis Kelamin</th>
                    <th>No. Paspor</th>
                    <th>Masa Berlaku Paspor</th>
                    <th>No. Visa</th>
                    <th>Masa Berlaku Visa</th>
                    <th>Paket Dipilih</th>
                    <th>Kamar Dipilih</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jamaahs as $jamaah)
                    <tr>
                        <td>{{ $jamaah->id }}</td>
                        <td>{{ $jamaah->nama_lengkap_jamaah }}</td>
                        <td>{{ $jamaah->nik }}</td>
                        <td>{{ $jamaah->tempat_lahir }}</td>
                        <td>{{ $jamaah->tanggal_lahir }}</td>
                        <td>{{ $jamaah->alamat }}</td>
                        <td>{{ $jamaah->provinsi }}</td>
                        <td>{{ $jamaah->kabupaten_kota }}</td>
                        <td>{{ $jamaah->kecamatan }}</td>
                        <td>{{ $jamaah->kelurahan_desa }}</td>
                        <td>{{ $jamaah->jenis_kelamin }}</td>
                        <td>{{ $jamaah->no_paspor }}</td>
                        <td>{{ $jamaah->masa_berlaku_paspor }}</td>
                        <td>{{ $jamaah->no_visa }}</td>
                        <td>{{ $jamaah->masa_berlaku_visa }}</td>
                        <td>{{ $jamaah->paket_dipilih }}</td>
                        <td>{{ $jamaah->kamar_dipilih }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a class="btn btn-primary" href="{{ route('jamaahs.create') }}" role="button">Tambah data Jamaah</a>

</body>

</html>
