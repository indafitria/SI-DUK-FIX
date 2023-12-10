<?php include '../sections/header.php';
include '../../config/koneksi.php';

?>
 <?php
//  inisialisasi variabel session 
// $jabatan = $_POST['jabatan'];
    // $_SESSION['jabatan'] = $jabatan;

    // // $id_golongan = $_POST['id_golongan'];
    // $_SESSION['id_golongan'] = $id_golongan;

    // // $tmt_golongan = $_POST['tmt_golongan'];
    // $_SESSION['tmt_golongan'] = $tmt_golongan;

    // // $id_bidang = $_POST['id_bidang'];
    // $_SESSION['id_bidang'] = $id_bidang;

    // // $penempatan = $_POST['penempatan'];
    // $_SESSION['penempatan'] = $penempatan;

    // // $tmt_jabatan = $_POST['tmt_jabatan'];
    // $_SESSION['tmt_jabatan'] = $tmt_jabatan;

    // // $masa_kerja_tahun = $_POST['masa_kerja_tahun'];
    // $_SESSION['masa_kerja_tahun'] = $masa_kerja_tahun;

    // // $masa_kerja_bulan = $_POST['masa_kerja_bulan'];
    // $_SESSION['masa_kerja_bulan'] = $masa_kerja_bulan;

    // $_SESSION['jenis_diklat'] = $_POST['jenis_diklat'];
    // $_SESSION['nama_diklat'] = $_POST['nama_diklat'];
    // $_SESSION['tahun_diklat'] = $_POST['tahun_diklat'];
    // $_SESSION['jmlh_jam'] = $_POST['jmlh_jam'];
 
 
 ?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $_SESSION['nama'] = $nama;
    $nip = $_POST['nip'];
    $_SESSION['nip'] = $nip;
    $tl = $_POST['tempat_lahir'];
    $_SESSION['tempat_lahir'] = $tl;
    $ttl = $_POST['tanggal_lahir'];
    $_SESSION['tanggal_lahir'] = $ttl;
    $usia = $_POST['usia'];
    $_SESSION['usia'] = $usia;
    $jk = $_POST['jenis_kelamin'];
    $_SESSION['jenis_kelamin'] = $jk;
    $agama = $_POST['agama'];
    $_SESSION['agama'] = $agama;
    $alamat = $_POST['alamat'];
    $_SESSION['alamat'] = $alamat;
    $no_hp = $_POST['no_hp'];
    $_SESSION['no_hp'] = $no_hp;
    $email = $_POST['email'];
    $_SESSION['email'] = $email;
    $npwp = $_POST['npwp'];
    $_SESSION['npwp'] = $npwp;
    $status = $_POST['status'];
    $_SESSION['status'] = $status;

};


// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $_SESSION['pendidikan'] = array();

//     $_SESSION['pendidikan']['strata'] = $_POST['strata'];
//     $_SESSION['pendidikan']['jurusan'] = $_POST['jurusan'];
//     $_SESSION['pendidikan']['konsentrasi'] = $_POST['konsentrasi'];
//     $_SESSION['pendidikan']['nama_kampus'] = $_POST['nama_kampus'];
//     $_SESSION['pendidikan']['tahun_lulus'] = $_POST['tahun_lulus'];

// };

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Data</h4>
                </div>
                <div class="card-body">
                    <form class="mb-4 border rounded p-3" action="tambahdata3.php" method="POST">
                        <div class="d-flex flex-column mb-3">
                            <div class="p-2 fw-bold fs-5">Pangkat</div>
                            <div class="p-2 mb-4 border rounded p-3">
                                <div class="row mb-3">
                                    <label for="inputGolongan" class="col-sm-2 col-form-label">Golongan</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" name="id_golongan" aria-label="Default select example" name="id_golongan">
                                            <option diselected>Pilih Golongan</option>
                                            <?php
                                            $result2 = mysqli_query($koneksi, "SELECT * FROM golongan");
                                            while ($data = mysqli_fetch_array($result2)) {
                                                $selected = ($data['nama_golongan'] == $nama_golongan) ? 'selected' : '';
                                            ?>
                                                <option value="<?= $data['id_golongan']; ?>" <?= $selected; ?>><?php echo $data['nama_golongan']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputTmt" class="col-sm-2 col-form-label">TMT</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="inputTmt" name="tmt_golongan">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-column mb-3">
                            <div class="p-2 fw-bold fs-5">Jabatan</div>
                            <div class="p-2 mb-4 border rounded p-3">
                                <div class="row mb-3">
                                    <label for="inputNamajabatan" class="col-sm-2 col-form-label">Nama Jabatan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputNamajabatan" placeholder="Masukkan Nama Jabatan" name="jabatan">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputGolongan" class="col-sm-2 col-form-label">Penempatan</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" name="id_bidang" id="id_bidang" aria-label="Default select example" name="id_bidang">
                                            <option diselected>Pilih Bidang</option>
                                            <?php
                                            $result3 = mysqli_query($koneksi, "SELECT * FROM data_bidang");
                                            while ($data = mysqli_fetch_array($result3)) {
                                            ?>
                                                <option value="<?= $data['id_bidang']; ?>"><?php echo $data['nama_bidang']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- HIDDEN PENEMPATAN -->
                                <input type="hidden" class="form-control" id="inputPenempatan" name="penempatan" />
                                <div class="row mb-3">
                                    <label for="inputTmt" class="col-sm-2 col-form-label">TMT</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="inputTmt" name="tmt_jabatan">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputSKJabatan" class="col-sm-2 col-form-label">Upload SK
                                        Jabatan*</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" id="inputSKJabatan" accept=".pdf" name="sk_jabatan">
                                        <div class="form-text" id="basic-addon4">Jenis file PDF maksimal 15 MB*.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-column mb-3">
                            <div class="p-2 fw-bold fs-5">Masa Kerja</div>
                            <div class="p-2 mb-4 border rounded p-3">
                                <div class="row mb-3">
                                    <label for="inputTahun" class="col-sm-2 col-form-label">Tahun</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="inputTahun" placeholder="Masukkan Tahun" name="masa_kerja_tahun">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputBulan" class="col-sm-2 col-form-label">Bulan</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="inputBulan" placeholder="Masukkan Bulan" name="masa_kerja_bulan">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-column mb-3 ">
                            <div class="p-2 fw-bold fs-5">Diklat Teknis</div>
                            <div class="control-group after-add-more p-2">
                                <table id="diklat1" class="table table-bordered text-center">
                                    <thead>
                                        <!-- <tr><th></th> -->
                                            <th>Nama Diklat</th>
                                            <th>Bulan/Tahun</th>
                                            <th>Jumlah Jam</th>
                                            <th>Upload Sertifikat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <input type="text" style="border: 1px solid #ccc;" name="jenis[]" value="Teknis" />
                                            <td><textarea type="text" name="nama[]" style="border: 1px solid #ccc;"></textarea></td>
                                            <td><input type="text" name="bulan/tahun[]" style="border: 1px solid #ccc;" /></td>
                                            <td><input type="text" name="jam[]" style="border: 1px solid #ccc;" /></td>
                                            <td><input type="file" name="file[]" accept=".pdf" /></td>
                                            <td>
                                                <button class="btn btn-success btn-sm add-more" type="button" onclick="tambahBaris1()">
                                                    <i class="bi bi-plus-lg"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-3">
                            <div class="p-2 fw-bold fs-5">Diklat Jabatan</div>
                            <div class="control-group after-add-more p-2">
                                <table id="diklat2" class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th>Nama Diklat</th>
                                            <th>Bulan/Tahun</th>
                                            <th>Jumlah Jam</th>
                                            <th>Upload Sertifikat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <input type="text" name="jenis[]" value="Jabatan" />
                                            <td><textarea type="text" name="nama[]" style="border: 1px solid #ccc;"></textarea></td>
                                            <td><input type="text" name="bulan/tahun[]" style="border: 1px solid #ccc;" /></td>
                                            <td><input type="text" name="jam[]" style="border: 1px solid #ccc;" /></td>
                                            <td><input type="file" name="file[]" accept=".pdf" /></td>
                                            <td>
                                                <button class="btn btn-success btn-sm add-more" type="button" onclick="tambahBaris2()">
                                                    <i class="bi bi-plus-lg"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- <button class="btn btn-success" type="submit">Submit</button> -->
                            </div>
                        </div>
                    </form>

                    <!-- <div class="d-flex flex-row mb-3">
                        <div class="p-2">
                            <div class="card mb-3">
                                <select class="form-select" id="aksiSelect">
                                    <option selected disabled>Pilih Jenis Diklat</option>
                                    <option value="tampilkanForm">Diklat Jabatan</option>
                                    <option value="tampilkanForm">Diklat Teknis</option>
                                </select>
                            </div>
                        </div>
                        <div class="p-2">
                            <button type="button" class="btn btn-success">+</button>
                        </div>
                    </div> -->

                    <!-- <div class="d-flex flex-column mb-3">
                        <div class="p-2">
                            <form>
                                <div id="formTampil" style="display: none;">
                                    <div class="row mb-3">
                                        <label for="inputNamadiklat" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputNamadiklat" placeholder="Masukkan Nama Diklat">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputBulantahun" class="col-sm-2 col-form-label">Bulan/Tahun</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputBulantahun" placeholder="Masukkan Bulan/Tahun">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputJumlahjam" class="col-sm-2 col-form-label">Jumlah
                                            Jam</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputJumlahjam" placeholder="Masukkan Jumlah Jam">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputSertifdiklat" class="col-sm-2 col-form-label">Upload
                                            Sertifikat
                                            Diklat*</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" id="inputSertifdiklat" accept=".pdf">
                                            <div class="form-text" id="basic-addon4">Jenis file PDF maksimal 15 MB*.
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div> -->


                    <div class="d-flex  justify-content-end">
                        <div class="p-1">
                            <div class="d-md-flex">
                                <a class="btn btn-primary" onclick="window.history.back();" role="button">
                                    &lt; Previous
                                </a>
                            </div>

                        </div>
                        <div class="p-1">
                            <div class="d-md-flex">
                                <a class="btn btn-primary" href="../kepegawaian/tambahdata3.php" role="button">Next ></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<!-- <script>
    // Ambil elemen select
    var aksiSelect = document.getElementById('aksiSelect');
    // Ambil elemen form yang akan ditampilkan
    var formTampil = document.getElementById('formTampil');

    // Tambahkan event listener untuk mendeteksi perubahan pada select
    aksiSelect.addEventListener('change', function() {
        var selectedOption = aksiSelect.value;

        // Periksa apakah opsi "Tampilkan Form" dipilih
        if (selectedOption === 'tampilkanForm') {
            // Tampilkan formulir
            formTampil.style.display = 'block';
        } else {
            // Sembunyikan formulir jika opsi lain dipilih
            formTampil.style.display = 'none';
        }
    });
</script> -->

<script>
    function tambahBaris1() {
        // Mendapatkan referensi ke tabel dengan ID "diklat"
        var table = document.getElementById("diklat1").getElementsByTagName('tbody')[0];

        // Menambahkan baris baru ke dalam tabel
        var row = table.insertRow(table.rows.length);

        // Menambahkan sel-sel ke dalam baris baru
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);



        // Menambahkan elemen input (teks) ke dalam sel-sel pertama, kedua, dan ketiga
        cell1.innerHTML = '<td><textarea type="text" name="nama[]" style="border: 1px solid #ccc;"></textarea></td>';
        cell2.innerHTML = '<td><input type="text" name="bulan/tahun[]" style="border: 1px solid #ccc;"/></td>';
        cell3.innerHTML = '<td><input type="text" name="jam[]" style="border: 1px solid #ccc;"/></td>';

        // Menambahkan elemen input (file) ke dalam sel keempat
        cell4.innerHTML = '<input type="file" name="file[]" accept=".pdf" />';

        // Menambahkan tombol "Remove" ke dalam sel kelima
        cell5.innerHTML = '<button class="btn btn-danger btn-sm remove" type="button" onclick="hapusBaris1(this)"><i class="bi bi-x-lg"></i></button>';
    }

    function tambahBaris2() {
        // Mendapatkan referensi ke tabel dengan ID "diklat"
        var table = document.getElementById("diklat2").getElementsByTagName('tbody')[0];

        // Menambahkan baris baru ke dalam tabel
        var row = table.insertRow(table.rows.length);

        // Menambahkan sel-sel ke dalam baris baru
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);

        // Menambahkan elemen input (teks) ke dalam sel-sel pertama, kedua, dan ketiga
        cell1.innerHTML = '<td><textarea type="text" name="nama[]" style="border: 1px solid #ccc;"></textarea></td>';
        cell2.innerHTML = '<td><input type="text" name="bulan/tahun[]" style="border: 1px solid #ccc;"/></td>';
        cell3.innerHTML = '<td><input type="text" name="jam[]" style="border: 1px solid #ccc;"/></td>';

        // Menambahkan elemen input (file) ke dalam sel keempat
        cell4.innerHTML = '<input type="file" name="file[]" accept=".pdf" />';

        // Menambahkan tombol "Remove" ke dalam sel kelima
        cell5.innerHTML = '<button class="btn btn-danger btn-sm remove" type="button" onclick="hapusBaris2(this)"><i class="bi bi-x-lg"></i></button>';
    }

    function hapusBaris1(button) {
        // Mendapatkan baris yang mengandung tombol "Remove" yang ditekan
        var row = button.parentNode.parentNode;

        // Menghapus baris tersebut dari tabel
        row.parentNode.removeChild(row);
    }

    function hapusBaris2(button) {
        // Mendapatkan baris yang mengandung tombol "Remove" yang ditekan
        var row = button.parentNode.parentNode;

        // Menghapus baris tersebut dari tabel
        row.parentNode.removeChild(row);
    }
</script>

<?php include '../sections/footer.php'; ?>