<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Jamaah</title>
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="body">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <h1>Tambah Jamaah</h1>

    <form action="{{ route('jamaahs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-md-8 mb-3">
            <label for="nama_lengkap_jamaah" class="form-label">Nama Lengkap Jamaah</label>
            <input type="text" class="form-control" id="nama_lengkap_jamaah" name="nama_lengkap_jamaah"
                placeholder="Nama Lengkap Jamaah">
        </div>

        <div class="col-md-8 mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK">
        </div>

        <div class="col-md-8 mb-3">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir">
        </div>

        <div class="col-md-8 mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" max="{{ date('Y-m-d') }}" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                placeholder="Tanggal Lahir">
        </div>

        <div class="col-md-8 mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
        </div>
        <br>

        <div class="row g-3">
            <div class="col-md-5">
                <label for="provinsi" class="form-label">Provinsi</label>
                <select id="provinsi" class="form-select" name="provinsi">
                </select>
            </div>
            <br>
            <div class="col-md-5">
                <label for="kabupaten_kota" class="form-label">Kabupaten/Kota</label>
                <select id="kabupaten_kota" class="form-select" name="kabupaten_kota">
                </select>
            </div>
            <br>
        </div>
        <br>
        <div class="row g-3">
            <div class="col-md-5">
                <label for="kecamatan" class="form-label">Kecamatan</label>
                <select id="kecamatan" class="form-select" name="kecamatan">
                </select>
            </div>
            <br>
            <div class="col-md-5">
                <label for="kelurahan_desa" class="form-label">Kelurahan/Desa</label>
                <select id="kelurahan_desa" class="form-select" name="kelurahan_desa">
                </select>
            </div>
            <br>
        </div>

        <script>
            fetch('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json')
                .then(response => response.json())
                .then(provinces => {
                    const provinsiSelect = document.getElementById('provinsi');
                    provinces.forEach(provinsi => {
                        const option = document.createElement('option');
                        option.value = provinsi.name;
                        option.textContent = provinsi.name;
                        option.dataset.id = provinsi.id;
                        provinsiSelect.appendChild(option);
                    });
                });

            document.getElementById('provinsi').addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const provinsiId = selectedOption.dataset.id; 
                const provinsiName = selectedOption.value;

                const kabKotaSelect = document.getElementById('kabupaten_kota');
                kabKotaSelect.innerHTML = '<option selected>Pilih Kabupaten/Kota</option>';

                fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinsiId}.json`)
                    .then(response => response.json())
                    .then(kabupatens => {
                        kabupatens.forEach(kabupaten => {
                            const option = document.createElement('option');
                            option.value = kabupaten.name;
                            option.textContent = kabupaten.name;
                            option.dataset.id = kabupaten.id;
                            kabKotaSelect.appendChild(option);
                        });
                    });
            });

            document.getElementById('kabupaten_kota').addEventListener('change', function() {
                const kabupatenId = this.options[this.selectedIndex].dataset.id;
                const kecamatanSelect = document.getElementById('kecamatan');
                kecamatanSelect.innerHTML = '<option selected>Pilih Kecamatan</option>';

                fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${kabupatenId}.json`)
                    .then(response => response.json())
                    .then(kecamatans => {
                        kecamatans.forEach(kecamatan => {
                            const option = document.createElement('option');
                            option.value = kecamatan.name;
                            option.textContent = kecamatan.name;
                            option.dataset.id = kecamatan.id;
                            kecamatanSelect.appendChild(option);
                        });
                    });
            });

            document.getElementById('kecamatan').addEventListener('change', function() {
                const kecamatanId = this.options[this.selectedIndex].dataset.id;
                const kelurahanSelect = document.getElementById('kelurahan_desa');
                kelurahanSelect.innerHTML = '<option selected>Pilih Kelurahan/Desa</option>';

                fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${kecamatanId}.json`)
                    .then(response => response.json())
                    .then(kelurahans => {
                        kelurahans.forEach(kelurahan => {
                            const option = document.createElement('option');
                            option.value = kelurahan.name;
                            option.textContent = kelurahan.name;
                            kelurahanSelect.appendChild(option);
                        });
                    });
            });
        </script>



        <br>

        <div>
            Jenis Kelamin
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="lakilaki" value="Laki-laki">
                <label class="form-check-label" for="lakilaki">
                    Laki-laki
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan">
                <label class="form-check-label" for="perempuan">
                    Perempuan
                </label>
            </div>
        </div>
        <br>

        <div class="row g-6 mb-3">
            <div class="col-md-5">
                <label for="no_paspor" class="form-label">No. Paspor</label>
                <input type="text" class="form-control" id="no_paspor" name="no_paspor"
                    placeholder="No. Paspor">
            </div>

            <div class="col-md-5">
                <label for="masa_berlaku_paspor" class="form-label">Masa Berlaku Paspor</label>
                <input type="date" min="{{ date('Y-m-d') }}" class="form-control" id="masa_berlaku_paspor"
                    name="masa_berlaku_paspor" placeholder="Masa Berlaku Paspor">
            </div>
        </div>

        <div class="row g-6 mb-3">
            <div class="col-md-5">
                <label for="no_visa" class="form-label">No. Visa</label>
                <input type="text" class="form-control" id="no_visa" name="no_visa" placeholder="No. Visa">
            </div>

            <div class="col-md-5">
                <label for="masa_berlaku_visa" class="form-label">Masa Berlaku Visa</label>
                <input type="date" min="{{ date('Y-m-d') }}" class="form-control" id="masa_berlaku_visa"
                    name="masa_berlaku_visa" placeholder="Masa Berlaku Visa">
            </div>
        </div>

        <div class="col-md-8 mb-3">
            <label for="lampiran_ktp" class="form-label">Lampiran KTP</label>
            <input class="form-control" type="file" id="lampiran_ktp" name="lampiran_ktp">
            <div class="form-text fst-italic">Tipe file harus berupa jpeg, png, jpg, atau pdf</div>
        </div>

        <div class="col-md-8 mb-3">
            <label for="lampiran_kk" class="form-label">Lampiran KK</label>
            <input class="form-control" type="file" id="lampiran_kk" name="lampiran_kk">
            <div class="form-text fst-italic">Tipe file harus berupa jpeg, png, jpg, atau pdf</div>
        </div>

        <div class="col-md-8 mb-3">
            <label for="lampiran_foto_diri" class="form-label">Lampiran Foto Diri</label>
            <input class="form-control" type="file" id="lampiran_foto_diri" name="lampiran_foto_diri">
            <div class="form-text fst-italic">Tipe file harus berupa jpeg, png, atau jpg</div>
        </div>

        <div class="col-md-8 mb-3">
            <label for="lampiran_paspor" class="form-label">Lampiran Paspor</label>
            <input class="form-control" type="file" id="lampiran_paspor" name="lampiran_paspor">
            <div class="form-text fst-italic">Tipe file harus berupa jpeg, png, jpg, atau pdf</div>
        </div>

        <div class="col-md-8">
            <label for="paket_dipilih" class="form-label">Paket Dipilih</label>
            <select class="form-select" aria-label="Default select example" name="paket_dipilih" id="paket_dipilih">
                <option value="" disabled selected>Choose...</option>
                <option value="Paket Itikaf">Paket Itikaf</option>
                <option value="Paket Reguler">Paket Reguler</option>
                <option value="Paket VIP">Paket VIP</option>
            </select>
        </div>

        <br>

        <div class="col-md-8">
            <label for="kamar_dipilih" class="form-label">Kamar Dipilih</label>
            <select class="form-select" aria-label="Default select example" name="kamar_dipilih" id="kamar_dipilih">
                <option value="" disabled selected>Choose...</option>
                <option value="Single">Single</option>
                <option value="Double">Double</option>
                <option value="Triple">Triple</option>
                <option value="Quad">Quad</option>
                <option value="Quint">Quint</option>
            </select>
        </div>

        <br>

        <div class="col-12">
            <button class="btn btn-primary" type="submit">Tambah Data</button>
        </div>
    </form>

</body>

</html>
