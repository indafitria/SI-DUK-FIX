<?php include '../sections/header.php';
include '../../config/koneksi.php';
?>


<?php

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));


//jika tidak ada login sebelumnya maka diarahkan ke login.php
if (empty($_SESSION['username']) and empty($_SESSION['pass'])) {
    echo "<script> window.location = 'index.php' </script>";
};
?>



<form class="mb-4 border rounded p-3" action="proses_tambah.php" method="POST" enctype="multipart/form-data">

    <div id="form-1">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tambah Data</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputNama" name="nama" placeholder="Masukkan Nama" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNip" class="col-sm-2 col-form-label">NIP</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="inputNip" name="nip" placeholder="Masukkan NIP" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputTempatLahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputTempatLahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" oninput="hitungUsia()" required="required" placeholder="Masukkan Tanggal Lahir">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="usia" class="col-sm-2 col-form-label">Usia</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="usia" id="input_usia" required="required" readonly>
                                    <span id="hasil_usia"></span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputJenisKelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                    <select class="form-select" aria-label="Default select example" id="inputJenisKelamin" name="jenis_kelamin">
                                        <option selected disabled>Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputAgama" class="col-sm-2 col-form-label">Agama</label>
                                <div class="col-sm-9">
                                    <select class="form-select" aria-label="Default select example" id="inputAgama" name="agama">
                                        <option selected disabled>Pilih Agama</option>
                                        <option value="islam">Islam</option>
                                        <option value="kristen-protestan">Kristen</option>
                                        <option value="kristen-katholik">Katolik</option>
                                        <option value="hindu">Hindu</option>
                                        <option value="buddha">Buddha</option>
                                        <option value="konghucu">Konghucu</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputAlamat" name="alamat" placeholder="Masukkan Alamat">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputNoHP" class="col-sm-2 col-form-label">Nomor HP</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputNoHP" name="no_hp" placeholder="Masukkan Nomor HP">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Masukkan Email">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputNpwp" class="col-sm-2 col-form-label">Nomor NPWP</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputNpwp" name="npwp" placeholder="Masukkan NPWP">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputStatus" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <select class="form-select" aria-label="Default select example" id="inputStatus" name="status">
                                        <option selected disabled>Pilih Status</option>
                                        <option value="Pegawai_Aktif">Pegawai Aktif</option>
                                        <option value="Pensiun">Pensiun</option>
                                    </select>
                                </div>
                            </div>


                            <div class="d-md-flex justify-content-end">
                                <div class="d-md-flex">
                                    <a class="btn btn-primary" onclick="pindahKeForm(2)" role="button">
                                        Next ></a>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- FORM 2 -->
    <div id="form-2" style="display: none;">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tambah Data</h4>
                        </div>
                        <div class="card-body">
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
                                            <input type="text" class="form-control" id="inputTahun" placeholder="Masukkan Tahun" name="masa_kerja_tahun">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputBulan" class="col-sm-2 col-form-label">Bulan</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputBulan" placeholder="Masukkan Bulan" name="masa_kerja_bulan">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-column mb-3 ">
                                <div class="p-2 fw-bold fs-5">Diklat Teknis</div>
                                <div class="control-group1 after-add-more1 p-2">
                                    <table id="diklat1" class="table table-bordered text-center">
                                        <thead>
                                            <tr>
                                                <th style="display: none;">Jenis Diklat</th>
                                                <th>Nama Diklat</th>
                                                <th>Bulan/Tahun</th>
                                                <th>Jumlah Jam</th>
                                                <th>Upload Sertifikat</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="display: none;"><input type="text" style="border: 1px solid #ccc;" name="jenis_diklat[]" value="Teknis" />
                                                <td><textarea type="text" name="nama_diklat[]" style="border: 1px solid #ccc;"></textarea></td>
                                                <td><input type="text" name="tahun_diklat[]" style="border: 1px solid #ccc;" /></td>
                                                <td><input type="text" name="jmlh_jam[]" style="border: 1px solid #ccc;" /></td>
                                                <td><input type="file" name="dokumen_diklat[]" accept=".pdf" /></td>
                                                <td>
                                                    <button class="btn btn-success btn-sm " type="button" onclick="tambahBaris1()">
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
                                <div class="control-group1 after-add-more1 p-2">
                                    <table id="diklat2" class="table table-bordered text-center">
                                        <thead>
                                            <tr>
                                                <th style="display: none;">Jenis Diklat</th>
                                                <th>Nama Diklat</th>
                                                <th>Bulan/Tahun</th>
                                                <th>Jumlah Jam</th>
                                                <th>Upload Sertifikat</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="display: none;"><input type="text" style="border: 1px solid #ccc;" name="jenis_diklat[]" value="Jabatan" />
                                                <td><textarea type="text" name="nama_diklat[]" style="border: 1px solid #ccc;"></textarea></td>
                                                <td><input type="text" name="tahun_diklat[]" style="border: 1px solid #ccc;" /></td>
                                                <td><input type="text" name="jmlh_jam[]" style="border: 1px solid #ccc;" /></td>
                                                <td><input type="file" name="dokumen_diklat[]" accept=".pdf" /></td>
                                                <td>
                                                    <button class="btn btn-success btn-sm" type="button" onclick="tambahBaris2()">
                                                        <i class="bi bi-plus-lg"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- <button class="btn btn-success" type="submit">Submit</button> -->
                                </div>
                            </div>




                            <div class="d-flex  justify-content-end">
                                <div class="p-1">
                                    <div class="d-md-flex">
                                        <a class="btn btn-primary" onclick="kembaliKeForm(1)" role="button">
                                            &lt; Previous
                                        </a>
                                    </div>

                                </div>
                                <div class="p-1">
                                    <div class="d-md-flex">
                                        <a class="btn btn-primary" onclick="pindahKeForm(3)" role="button">Next ></a>


                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="form-3" style="display: none;">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tambah Data</h4>
                        </div>
                        <div class="card-body">

                            <div class="d-flex flex-column mb-3">
                                <div class="p-2 fw-bold fs-5">Pendidikan</div>
                                <div class="p-3">
                                    <div class="d-flex flex-column mb-3">
                                        <div class="p-2 fw-bold fs-6">Pendidikan Menengah</div>
                                        <div class="p-2 mb-4 border rounded p-3">
                                            <div class="row mb-3">
                                                <label for="inputJenisStrata" class="col-sm-2 col-form-label">Satuan Pendidikan</label>
                                                <div class="col-sm-9">
                                                    <select class="form-select" aria-label="Default select example" name="strata[]">
                                                        <option selected disabled>Pilih Satuan Pendidikan</option>
                                                        <option value="SMA">SMA</option>
                                                        <option value="SMK">SMK</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="inputNamasekolah" class="col-sm-2 col-form-label">Nama Sekolah</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="inputNamasekolah" name="nama_kampus[]" placeholder="Masukkan Nama Sekolah">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputJurusan" class="col-sm-2 col-form-label">Jurusan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="inputJurusan" name="jurusan[]" placeholder="Masukkan Jurusan">
                                                    <input type="text" class="form-control" id="inputKonsentrasi" name="konsentrasi[]" value="-" placeholder="Masukkan Konsentrasi">

                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputTahunlulus" class="col-sm-2 col-form-label">Tahun Lulus</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" id="inputTahunlulus" name="tahun_lulus[]" placeholder="Masukkan Tahun Lulus">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputSKJabatan" class="col-sm-2 col-form-label">Upload Ijazah*</label>
                                                <div class="col-sm-9">
                                                    <input type="file" class="form-control" id="inputIjazah" name="ijazah[]" accept=".pdf">
                                                    <div class="form-text" id="basic-addon4">Jenis file PDF maksimal 15 MB*.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-column mb-3">
                                        <div class="p-2 fw-bold fs-6">Pendidikan Tinggi</div>

                                        <div class="control-group2 after-add-more2 mb-4 border rounded p-3">
                                            <div class="p-2">
                                                <div class="row mb-3">
                                                    <label for="inputStrata" class="col-sm-2 col-form-label">Strata</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="strata[]" class="form-control" id="inputStrata" placeholder="Masukkan Strata">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputJurusan" class="col-sm-2 col-form-label">Jurusan</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="jurusan[]" class="form-control" id="inputJurusan" placeholder="Masukkan Jurusan">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputKonsentrasi" class="col-sm-2 col-form-label">Konsentrasi</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="konsentrasi[]" class="form-control" id="inputKonsentrasi" placeholder="Masukkan Konsentrasi">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputAlumni" class="col-sm-2 col-form-label">Alumni</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="nama_kampus[]" class="form-control" id="inputAllumni" placeholder="Masukkan Alumni">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputTahunlulus" class="col-sm-2 col-form-label">Tahun Lulus</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" name="tahun_lulus[]" class="form-control" id="inputTahunlulus" placeholder="Masukkan Tahun Lulus">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputSKJabatan" class="col-sm-2 col-form-label">Upload Ijazah*</label>
                                                    <div class="col-sm-9">
                                                        <input type="file" class="form-control" id="inputIjazah" name="ijazah[]" accept=".pdf">
                                                        <div class="form-text" id="basic-addon4">Jenis file PDF maksimal 15 MB*.
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <button class="btn btn-sm btn-success add-more" type="button">Add</button> -->
                                            </div>
                                        </div>


                                        <div class="copy hide" style="display: none;">
                                            <div class="control-group2 mb-4 border rounded p-3">
                                                <div class="p-2">
                                                    <div class="row mb-3">
                                                        <label for="inputStrata" class="col-sm-2 col-form-label">Strata</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="strata[]" class="form-control" id="inputStrata" placeholder="Masukkan Strata">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="inputJurusan" class="col-sm-2 col-form-label">Jurusan</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="jurusan[]" class="form-control" id="inputJurusan" placeholder="Masukkan Jurusan">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="inputKonsentrasi" class="col-sm-2 col-form-label">Konsentrasi</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="konsentrasi[]" class="form-control" id="inputKonsentrasi" placeholder="Masukkan Konsentrasi">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="inputAlumni" class="col-sm-2 col-form-label">Alumni</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="nama_kampus[]" class="form-control" id="inputAllumni" placeholder="Masukkan Alumni">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="inputTahunlulus" class="col-sm-2 col-form-label">Tahun Lulus</label>
                                                        <div class="col-sm-9">
                                                            <input type="number" name="tahun_lulus[]" class="form-control" id="inputTahunlulus" placeholder="Masukkan Tahun Lulus">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="inputSKJabatan" class="col-sm-2 col-form-label">Upload Ijazah*</label>
                                                        <div class="col-sm-9">
                                                            <input type="file" class="form-control" id="inputIjazah" name="ijazah[]" accept=".pdf">
                                                            <div class="form-text" id="basic-addon4">Jenis file PDF maksimal 15 MB*.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-sm btn-danger remove" type="button">Hapus</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="justify-content-end">
                                            <button class="btn btn-sm btn-success add-more2" type="button">Tambah</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="d-flex justify-content-end">
                                <div class="p-1">
                                    <div class="d-md-flex">
                                        <a class="btn btn-primary" onclick="kembaliKeForm(2)">
                                            &lt; Previous
                                        </a>
                                    </div>
                                </div>
                                <div class="p-1">
                                    <div class="d-md-flex">
                                        <!-- <a class="btn btn-primary" href="../kepegawaian/tambahdata4.php" role="button">Next ></a> -->
                                        <a class="btn btn-primary" onclick="pindahKeForm(4)" role="button">Next > </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="form-4" style="display: none;">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tambah Data</h4>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-column mb-3">
                                <div class="p-2 fw-bold fs-5">Catatan Mutasi Kepegawaian</div>

                                <div class="d-flex flex-column mb-3 ">
                                    <div class="control-group3 after-add-more3 p-2">
                                        <table id="mutasi" class="table table-bordered text-center">
                                            <thead>
                                                <tr>
                                                    <th>Catatan Mutasi Kepegawaian</th>
                                                    <th>Upload SK</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><textarea type="text" name="catatan_mutasi[]" style="width: 550px; border: 1px solid #ccc;"></textarea></td>
                                                    <td><input type="file" name="dokumen_mutasi[]" accept=".pdf" /></td>
                                                    <td>
                                                        <button class="btn btn-success btn-sm add-more3" type="button" onclick="tambahBaris3()">
                                                            <i class="bi bi-plus-lg"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="mt-5 mb-4 border rounded p-3">
                                    <div class="row mb-3">
                                        <label for=" inputSKJabatan" class="col-sm-2 col-form-label">Upload Pas Foto*</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" id="inputIjazah" name="foto" accept=".jpg">
                                            <div class="form-text" id="basic-addon4">Jenis file PDF maksimal 15 MB*.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="p-2 ">
                                <div class="d-flex flex-row mb-3 justify-content-center">
                                    <div class="p-2">
                                        <input class="btn btn-danger d-grid gap-2 col-12 mx-auto" type="reset" value="Reset">
                                    </div>
                                    <div class="p-2">
                                        <input class="btn btn-success d-grid gap-2 col-12 mx-auto" type="submit" value="Tambah" name="tambah_data">
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-start">
                                <div class="p-1">
                                    <div class="d-md-flex">
                                        <a class="btn btn-primary" onclick="kembaliKeForm(3)" role="button">
                                            < Previous</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<?php include '../sections/footer.php'; ?>

<script>
    function hitungUsia() {
        var tanggalLahir = document.getElementById("tanggal_lahir").value;
        var tanggalLahirObj = new Date(tanggalLahir);

        // Check if the input is a valid date
        if (isNaN(tanggalLahirObj.getTime())) {
            document.getElementById("input_usia").value = "";
            return;
        }

        var tanggalSekarang = new Date();
        var selisihUsia = tanggalSekarang - tanggalLahirObj;
        var usiaTahun = Math.floor(selisihUsia / 31536000000); // 1 tahun = 31.536.000.000 milidetik
        var usiaBulan = Math.floor((selisihUsia % 31536000000) / 2628000000); // 1 bulan = 2.628.000.000 milidetik

        // Set the input field value
        document.getElementById("input_usia").value = usiaTahun + " tahun " + usiaBulan + " bulan";
    }

    // Memanggil fungsi hitungUsia saat halaman dimuat untuk mengisi input usia dengan format yang benar
    document.addEventListener('DOMContentLoaded', function() {
        hitungUsia();
    });
</script>


<!-- SCRIPT FORM 2 -->
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
        var cell6 = row.insertCell(5);



        // // Menambahkan elemen input (teks) ke dalam sel-sel pertama, kedua, dan ketiga
        // cell1.innerHTML = '<td style="display: none;"><input type="text" style="border: 1px solid #ccc;" name="jenis_diklat[]" value="Teknis" /></td>' ;
        cell1.style.display = 'none';

        // Menambahkan elemen input (teks) ke dalam sel-sel pertama, kedua, dan ketiga
        cell1.innerHTML = '<input type="text" style="border: 1px solid #ccc;" name="jenis_diklat[]" value="Teknis" />';
        cell2.innerHTML = '<td><textarea type="text" name="nama_diklat[]" style="border: 1px solid #ccc;"></textarea></td>';
        cell3.innerHTML = '<td><input type="text" name="tahun_diklat[]" style="border: 1px solid #ccc;"/></td>';
        cell4.innerHTML = '<td><input type="text" name="jmlh_jam[]" style="border: 1px solid #ccc;"/></td>';

        // Menambahkan elemen input (file) ke dalam sel keempat
        cell5.innerHTML = '<input type="file" name="dokumen_diklat[]" accept=".pdf" />';

        // Menambahkan tombol "Remove" ke dalam sel kelima
        cell6.innerHTML = '<button class="btn btn-danger btn-sm remove" type="button" onclick="hapusBaris1(this)"><i class="bi bi-x-lg"></i></button>';
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
        var cell6 = row.insertCell(5);

        cell1.style.display = 'none';

        // Menambahkan elemen input (teks) ke dalam sel-sel pertama, kedua, dan ketiga
        cell1.innerHTML = '<td><input type="text" style="border: 1px solid #ccc;" name="jenis_diklat[]" value="Jabatan"></td>';
        cell2.innerHTML = '<td><textarea type="text" name="nama_diklat[]" style="border: 1px solid #ccc;"></textarea></td>';
        cell3.innerHTML = '<td><input type="text" name="tahun_diklat[]" style="border: 1px solid #ccc;"/></td>';
        cell4.innerHTML = '<td><input type="text" name="jmlh_jam[]" style="border: 1px solid #ccc;"/></td>';

        // Menambahkan elemen input (file) ke dalam sel keempat
        cell5.innerHTML = '<input type="file" name="dokumen_diklat[]" accept=".pdf" />';

        // Menambahkan tombol "Remove" ke dalam sel kelima
        cell6.innerHTML = '<button class="btn btn-danger btn-sm remove" type="button" onclick="hapusBaris2(this)"><i class="bi bi-x-lg"></i></button>';
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

<!-- SCRIPT FORM 3 -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".add-more2").click(function() {
            var html = $(".copy").html();
            $(".after-add-more2").after(html);
        });

        // saat tombol remove dklik control group akan dihapus 
        $("body").on("click", ".remove", function() {
            $(this).parents(".control-group2").remove();
        });
    });
</script>

<!-- SCRIPT FORM 4 -->
<!-- <script type="text/javascript">
    $(document).ready(function() {
        $(".add-more3").click(function() {
            var html = $(".copy").html();
            $(".after-add-more3").after(html);
        });

        // saat tombol remove dklik control group akan dihapus 
        $("body").on("click", ".remove", function() {
            $(this).parents(".control-group3").remove();
        });
    });
</script> -->


<script>
    function tambahBaris3() {
        // Mendapatkan referensi ke tabel dengan ID "diklat"
        var table = document.getElementById("mutasi").getElementsByTagName('tbody')[0];

        // Menambahkan baris baru ke dalam tabel
        var row = table.insertRow(table.rows.length);

        // Menambahkan sel-sel ke dalam baris baru
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);

        // Menambahkan elemen input (teks) ke dalam sel-sel pertama, kedua, dan ketiga
        cell1.innerHTML = '<textarea type="text" name="catatan_mutasi[]" style="width: 550px; border: 1px solid #ccc;"></textarea>';

        // Menambahkan elemen input (file) ke dalam sel keempat
        cell2.innerHTML = '<input type="file" name="dokumen_mutasi[]" accept=".pdf" />';

        // Menambahkan tombol "Remove" ke dalam sel kelima
        cell3.innerHTML = '<button class="btn btn-danger btn-sm remove" type="button" onclick="hapusBaris1(this)"><i class="bi bi-x-lg"></i></button>';
    }

    function hapusBaris3(button) {
        // Mendapatkan baris yang mengandung tombol "Remove" yang ditekan
        var row = button.parentNode.parentNode;

        // Menghapus baris tersebut dari tabel
        row.parentNode.removeChild(row);
    }
</script>


<script>
    function pindahKeForm(targetForm) {
        for (let i = 1; i <= 4; i++) {
            document.getElementById('form-' + i).style.display = 'none';
        }
        document.getElementById('form-' + targetForm).style.display = 'block';
    }

    function kembaliKeForm(previousForm) {
        for (let i = 1; i <= 4; i++) {
            document.getElementById('form-' + i).style.display = 'none';
        }
        document.getElementById('form-' + previousForm).style.display = 'block';
    }
</script>

<script>
    // Menambahkan event listener untuk merespons perubahan pada dropdown
    document.getElementById('id_bidang').addEventListener('change', function() {
        // Mengambil nilai terpilih dari dropdown
        var selectedOption = this.options[this.selectedIndex];
        var selectedNamaBidang = selectedOption.textContent;

        // Memasukkan nilai nama bidang ke dalam input tersembunyi
        document.getElementById('inputPenempatan').value = selectedNamaBidang;
    });
</script>