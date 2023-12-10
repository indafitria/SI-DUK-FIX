<?php include '../sections/header.php';
include '../../config/koneksi.php';
include '../../function/fungsi.php';


if (empty($_SESSION['username']) and empty($_SESSION['pass'])) {
    echo "<script> window.location = '../../index.php' </script>";
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
                                    <input type="text" autocomplete="off" class="form-control" id="inputNama" name="nama" placeholder="Masukkan Nama" required pattern="[A-Za-z., ]{1,50}" title="Harus Berupa Huruf Minimal Sebanyak 1 Karakter dan Maksimal 50 Karakter" oninput="this.reportValidity()">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNip" class="col-sm-2 col-form-label">NIP</label>
                                <div class="col-sm-9">
                                    <input type="text" autocomplete="off" class="form-control" id="inputNip" name="nip" placeholder="Masukkan NIP" required required pattern="[0-9]{18}" title="Harus Berupa Angka Sebanyak 18 Karakter" oninput="this.reportValidity()">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputTempatLahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-9">
                                    <input type="text" autocomplete="off" class="form-control" id="inputTempatLahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" required pattern="[A-Za-z ]{1,50}" title="Harus Berupa Huruf Minimal Sebanyak 1 Karakter dan Maksimal 50 Karakter" oninput="this.reportValidity()">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-9">
                                    <input type="date" autocomplete="off" class="form-control" name="tanggal_lahir" id="tanggal_lahir" oninput="hitungUsia()" required placeholder="Masukkan Tanggal Lahir" oninput="this.reportValidity()">
                                </div>
                            </div>

                            <div class=" row mb-3">
                                <label for="usia" class="col-sm-2 col-form-label">Usia</label>
                                <div class="col-sm-9">
                                    <input type="text" autocomplete="off" class="form-control" name="usia" id="input_usia" required="required" readonly>
                                    <span id="hasil_usia"></span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputJenisKelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                    <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                                        <option selected disabled>Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputAgama" class="col-sm-2 col-form-label">Agama</label>
                                <div class="col-sm-9">
                                    <select class="form-select" aria-label="Default select example" name="agama">
                                        <option selected disabled>Pilih Agama</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen-Protestan">Kristen</option>
                                        <option value="Kristen-Katholik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Buddha">Buddha</option>
                                        <option value="Khonghucu">Konghucu</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <input type="text" autocomplete="off" class="form-control" id="inputAlamat" name="alamat" placeholder="Masukkan Alamat" required pattern="[A-Za-z.0-9 ]{1,50}" title="Dapat Berupa Huruf dan Angka Minimal Sebanyak 1 Karakter dan Maksimal 50 Karakter" oninput="this.reportValidity()">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputNoHP" class="col-sm-2 col-form-label">Nomor HP</label>
                                <div class="col-sm-9">
                                    <input type="text" autocomplete="off" class="form-control" id="inputNoHP" name="no_hp" placeholder="Masukkan Nomor HP" required pattern="[0-9+]{10,14}" title="Harus Berupa Angka Minimal Sebanyak 10 Karakter dan Maksimal 14 Karakter" oninput="this.reportValidity()">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" autocomplete="off" class="form-control" id="inputEmail" name="email" placeholder="Masukkan Email" required pattern="[A-Za-z0-9.@ ]{5,50}" title=" Harus Berupa Huruf dan Angka, dan Karakter '@'. Minimal Sebanyak 5 Karakter dan Maksimal 50 Karakter" oninput="this.reportValidity()">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputNpwp" class="col-sm-2 col-form-label">Nomor NPWP</label>
                                <div class="col-sm-9">
                                    <input type="text" autocomplete="off" class="form-control" id="inputNpwp" name="npwp" placeholder="Masukkan NPWP" required pattern="[0-9]{15,16}" title=" Harus Berupa Angka Minimal Sebanyak 15 Karakter dan Maksimal 1 Karakter" oninput="this.reportValidity()">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputStatus" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <select class="form-select" aria-label="Default select example" name="status">
                                        <option selected disabled>Pilih Status</option>
                                        <option value="Pegawai_Aktif">Pegawai Aktif</option>
                                        <option value="Mutasi">Mutasi</option>
                                        <option value="Pensiun">Pensiun</option>
                                    </select>
                                </div>
                            </div>


                            <div class="d-md-flex justify-content-end">
                                <div class="d-md-flex">
                                    <a class="btn btn-primary" onclick="pindahKeForm(2); topFunction()" role="button">
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
                                <div class="p-2 fw-bold fs-5">SK CPNS</div>
                                <div class="p-2 mb-4 border rounded p-3">
                                    <div class="row mb-3">
                                        <div class="row mb-3" style="display: none;">
                                            <label for="inputnomorSk" class="col-sm-2 col-form-label">Jenis SK</label>
                                            <div class="col-sm-9">
                                                <input type="text" autocomplete="off" class="form-control" id="inputJenisSkCPNS" value="cpns" name="jenis[]">
                                            </div>
                                        </div>

                                        <div class="row mb-3" style="display: none;">
                                            <label for="inputnomorSk" class="col-sm-2 col-form-label">Keterangan</label>
                                            <div class="col-sm-9">
                                                <input type="text" autocomplete="off" class="form-control" id="inputKetSkCPNS" value="SK CPNS" name="keterangan[]">
                                            </div>
                                        </div>
                                        <label for="inputTmt" class="col-sm-2 col-form-label">TMT</label>
                                        <div class="col-sm-9">
                                            <input type="date" autocomplete="off" class="form-control" id="inputTmtSK" name="tmt_sk[]" required oninput="this.reportValidity()">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputnomorSk" class="col-sm-2 col-form-label">Nomor SK</label>
                                        <div class="col-sm-9">
                                            <input type="text" autocomplete="off" class="form-control" id="inputnomorSk" placeholder="Masukan Nomor SK CPNS" name="nomor_sk[]" pattern="[A-Za-z.0-9]{6-50}" title="Silahkan Masukan Nomor SK " oninput="this.reportValidity()">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputSKJabatan" class="col-sm-2 col-form-label">Upload SK
                                            CPNS*</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" id="inputSKJabatan" accept=".pdf" name="dokumen_sk[]" required>
                                            <div class="form-text" id="basic-addon4">Jenis file PDF maksimal 15 MB*.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-2 fw-bold fs-5">SK PNS</div>
                                <div class="p-2 mb-4 border rounded p-3">
                                    <div class="row mb-3">
                                        <div class="row mb-3" style="display: none;">
                                            <label for="inputnomorSk" class="col-sm-2 col-form-label">Jenis SK</label>
                                            <div class="col-sm-9">
                                                <input type="text" autocomplete="off" class="form-control" id="inputJenisSkPNS" value="pns" name="jenis[]">
                                            </div>
                                        </div>

                                        <div class="row mb-3" style="display: none;">
                                            <label for="inputnomorSk" class="col-sm-2 col-form-label">Keterangan</label>
                                            <div class="col-sm-9">
                                                <input type="text" autocomplete="off" class="form-control" id="inputKetSkCPNS" value="SK PNS" name="keterangan[]">
                                            </div>
                                        </div>
                                        <label for="inputTmt" class="col-sm-2 col-form-label">TMT</label>
                                        <div class="col-sm-9">
                                            <input type="date" autocomplete="off" class="form-control" id="inputTmtGol" name="tmt_sk[]" required oninput="this.reportValidity()">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputnomorSk" class="col-sm-2 col-form-label">Nomor SK</label>
                                        <div class="col-sm-9">
                                            <input type="text" autocomplete="off" class="form-control" id="inputnomorSk" placeholder="Masukan Nomor SK PNS" name="nomor_sk[]" pattern="[A-Za-z.0-9]{6-50}" title="Silahkan Masukan Nomor SK PNS " oninput="this.reportValidity()">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputSKJabatan" class="col-sm-2 col-form-label">Upload SK
                                            CPNS*</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" id="inputSKJabatan" accept=".pdf" name="dokumen_sk[]" required>
                                            <div class="form-text" id="basic-addon4">Jenis file PDF maksimal 15 MB*.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Bagian HTML + PHP sebelumnya -->
                                <div class="d-flex flex-column mb-3">
                                    <div class="d-flex flex-column mb-3">
                                        <div class="p-2 fw-bold fs-5">Pangkat Terakhir</div>
                                        <div class="p-2 mb-4 border rounded p-3">
                                            <div class="row mb-3">
                                                <label for="#" class="col-sm-2 col-form-label">Pangkat/Golongan</label>
                                                <div class="col-sm-9">
                                                    <select class="form-select" name="id_golongan" id="id_golongan" aria-label="Default select example">
                                                        <option value="" selected disabled>Pilih Pangkat/Golongan</option>
                                                        <?php
                                                        $result3 = mysqli_query($koneksi, "SELECT * FROM golongan");
                                                        while ($data1 = mysqli_fetch_array($result3)) {
                                                            $selected = ($data1['id_golongan'] == $id_golongan) ? 'selected' : '';
                                                        ?>
                                                            <option value="<?= $data1['id_golongan']; ?>" <?= $selected; ?>><?php echo $data1['nama_golongan']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>

                                                    <!-- Input text to display the selected 'nama_golongan' -->
                                                    <input type="text" hidden autocomplete="off" name="nama_golongan" id="nama_golongan_text" value="<?php echo isset($nama_golongan) ? $nama_golongan : ''; ?>" readonly>
                                                </div>
                                            </div>



                                            <div class="row mb-3">

                                                <input type="hidden" autocomplete="off" id="inputJenisSK" name="jenis_sk_pangkat" value="pangkat">
                                                <label for="inputTmt" class="col-sm-2 col-form-label">TMT</label>
                                                <div class="col-sm-9">
                                                    <input type="date" autocomplete="off" class="form-control" id="inputTmtGol" name="tmt_golongan" required oninput="this.reportValidity()">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="inputnomorSk" class="col-sm-2 col-form-label">Nomor SK</label>
                                                <div class="col-sm-9">
                                                    <input type="text" autocomplete="off" class="form-control" id="inputnomorSk" placeholder="Masukan Nomor SK Pangkat Terakhir" name="nomor_sk_pangkat" pattern="[A-Za-z.0-9.,:;()'/\]{6-50}" title="Silahkan Masukan Nomor SK " oninput="this.reportValidity()">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputSKJabatan" class="col-sm-2 col-form-label">Upload SK
                                                    Pangkat*</label>
                                                <div class="col-sm-9">
                                                    <input type="file" class="form-control" id="inputSKJabatan" accept=".pdf" name="sk_pangkat" required>
                                                    <div class="form-text" id="basic-addon4">Jenis file PDF maksimal 15 MB*.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-column mb-3">
                                        <div class="p-2 fw-bold fs-5">Jabatan</div>
                                        <div class="p-2 mb-4 border rounded p-3">
                                            <div class="row mb-3">
                                                <label for="inputNamajabatan" class="col-sm-2 col-form-label">Nama
                                                    Jabatan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" autocomplete="off" class="form-control" id="inputNamajabatan" placeholder="Masukkan Nama Jabatan" name="jabatan" required pattern="[A-Za-z.,:;()<>'']{1,50}" title="Harus Berupa Huruf Minimal Sebanyak 1 Karakter dan Maksimal 50 Karakter" oninput="this.reportValidity()">
                                                </div>
                                            </div>


                                            <div class="row mb-3">
                                                <label for="#" class="col-sm-2 col-form-label">Penempatan</label>
                                                <div class="col-sm-9">
                                                    <select class="form-select" name="id_bidang" id="id_bidang" aria-label="Default select example">
                                                        <option value="" selected disabled> Pilih Penempatan </option>
                                                        <?php
                                                        $result3 = mysqli_query($koneksi, "SELECT * FROM data_bidang");
                                                        while ($data = mysqli_fetch_array($result3)) {
                                                            $selected = ($data['id_bidang'] == $id_bidang) ? 'selected' : '';
                                                        ?>
                                                            <option value="<?= $data['id_bidang']; ?>" <?= $selected; ?>><?php echo $data['nama_bidang']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>

                                                    <!-- Input text to display the selected 'nama_bidang' -->
                                                    <input type="text" hidden autocomplete="off" name="penempatan" id="nama_bidang_text" value="<?php echo isset($nama_bidang) ? $nama_bidang : ''; ?>" readonly>
                                                </div>
                                            </div>



                                            <input type="hidden" class="form-control" id="inputJenisSK" value="jabatan" name="jenis_sk" />
                                            <div class="row mb-3">
                                                <label for="inputTmt" class="col-sm-2 col-form-label">TMT</label>
                                                <div class="col-sm-9">
                                                    <input type="date" autocomplete="off" class="form-control" id="inputTmtJabatan" name="tmt_jabatan" required oninput="this.reportValidity()">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputnomorSk" class="col-sm-2 col-form-label">Nomor SK</label>
                                                <div class="col-sm-9">
                                                    <input type="text" autocomplete="off" class="form-control" id="inputnomorSk" placeholder="Masukan Nomor SK Jabatan" name="nomor_sk_jabatan" pattern="[A-Za-z.0-9]{6-50}" title="Silahkan Masukan Nomor SK Jabatan" oninput="this.reportValidity()">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputSKJabatan" class="col-sm-2 col-form-label">Upload SK
                                                    Jabatan*</label>
                                                <div class="col-sm-9">
                                                    <input type="file" class="form-control" id="inputSKJabatan" accept=".pdf" name="sk_jabatan" required>
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
                                                    <input type="text" autocomplete="off" class="form-control" id="inputTahun" placeholder="Masukkan Tahun" name="masa_kerja_tahun" required pattern="[0-9]{2}" title="Harus Berupa Angka Sebanyak Maksimal 2 Karakter" oninput="this.reportValidity()">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputBulan" class="col-sm-2 col-form-label">Bulan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" autocomplete="off" class="form-control" id="inputBulan" placeholder="Masukkan Bulan" name="masa_kerja_bulan" required pattern="[0-9]{2}" title="Harus Berupa Angka Sebanyak Maksimal 2 Karakter" oninput="this.reportValidity()">
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
                                                        <td style="display: none;"><input type="text" autocomplete="off" style="border: 1px solid #ccc;" name="jenis_diklat[]" value="Teknis" />
                                                        <td><input type="text" autocomplete="off" id="nama_diklat1" name="nama_diklat[]" pattern="[A-Za-z ]{1,50}" title="Harus Berupa Huruf Minimal Sebanyak 1 Karakter dan Maksimal 50 Karakter" oninput="this.reportValidity()"></input></td>
                                                        <td><input type="text" autocomplete="off" id="tahun_diklat1" name="tahun_diklat[]" pattern="[0-9]{4}" title="Harus Berupa Angka Sebanyak Maksimal 4 Karakter" oninput="this.reportValidity()" /></td>
                                                        <td><input type="text" autocomplete="off" id="jmlh_Jam1" name="jmlh_jam[]" required pattern="[0-9]{1,6}" title="Harus Berupa Angka Sebanyak Maksimal 6 Karakter" oninput="this.reportValidity()" /></td>
                                                        <td><input type="file" id="dokumen_diklat1" name="dokumen_diklat[]" id="dokumen_diklat" accept=".pdf" required /></td>
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
                                                        <td style="display: none;"><input type="text" autocomplete="off" style="border: 1px solid #ccc;" name="jenis_diklat[]" value="Jabatan" />
                                                        <td><input type="text" autocomplete="off" id="nama_diklat2" name="nama_diklat[]" pattern="[A-Za-z ]{1,50}" title="Harus Berupa Huruf Minimal Sebanyak 1 Karakter dan Maksimal 50 Karakter" oninput="this.reportValidity()"></td>
                                                        <td><input type="text" autocomplete="off" id="tahun_diklat2" name="tahun_diklat[]" pattern="[0-9]{4}" title="Harus Berupa Angka Sebanyak Maksimal 4 Karakter" oninput="this.reportValidity()" /></td>
                                                        <td><input type="text" autocomplete="off" id="jmlh_jam2" name="jmlh_jam[]" pattern="[0-9]{1,6}" title="Harus Berupa Angka Sebanyak Maksimal 6 Karakter" oninput="this.reportValidity()" /></td>
                                                        <td><input type="file" id="dokumen_diklat2" name="dokumen_diklat[]" accept=".pdf" /></td>
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
                                                <a class="btn btn-primary" onclick="kembaliKeForm(1); topFunction()" role="button">
                                                    &lt; Previous
                                                </a>
                                            </div>

                                        </div>
                                        <div class="p-1">
                                            <div class="d-md-flex">
                                                <a class="btn btn-primary" onclick="pindahKeForm(3); topFunction()" role="button">Next ></a>


                                            </div>
                                        </div>
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
                                                <label for="inputJenisStrata" class="col-sm-2 col-form-label">Satuan
                                                    Pendidikan</label>
                                                <div class="col-sm-9">
                                                    <select class="form-select" aria-label="Default select example" name="strata[]" id="strata1">
                                                        <option selected disabled>Pilih Satuan Pendidikan</option>
                                                        <option value="SMA">SMA</option>
                                                        <option value="SMK">SMK</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="inputNamasekolah" class="col-sm-2 col-form-label">Nama
                                                    Sekolah</label>
                                                <div class="col-sm-9">
                                                    <input type="text" autocomplete="off" class="form-control" id="inputNamasekolah" name="nama_kampus[]" placeholder="Masukkan Nama Sekolah" required pattern="[A-Za-z0-9 ]{1,50}" title="Dapat Berupa Huruf dan Angka Minimal Sebanyak 1 Karakter dan Maksimal 50 Karakter" oninput="this.reportValidity()">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputJurusan" class="col-sm-2 col-form-label">Jurusan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" autocomplete="off" class="form-control" id="inputJurusan" name="jurusan[]" placeholder="Masukkan Jurusan" required pattern="[A-Za-z ]{1,50}" title="Harus Berupa Huruf Minimal Sebanyak 1 Karakter dan Maksimal 50 Karakter" oninput="this.reportValidity()">
                                                    <input type="hidden" class="form-control" name="konsentrasi[]" value="-" placeholder="Masukkan Konsentrasi">

                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputTahunlulus" class="col-sm-2 col-form-label">Tahun
                                                    Lulus</label>
                                                <div class="col-sm-9">
                                                    <input type="text" autocomplete="off" class="form-control" id="inputTahunlulus" name="tahun_lulus[]" placeholder="Masukkan Tahun Lulus" required pattern="[0-9]{4}" title="Harus Berupa Angka Sebanyak Maksimal 4 Karakter" oninput="this.reportValidity()">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputSKJabatan" class="col-sm-2 col-form-label">Upload
                                                    Ijazah*</label>
                                                <div class="col-sm-9">
                                                    <input type="file" class="form-control" id="inputIjazah" name="ijazah[]" accept=".pdf" required>
                                                    <div class="form-text" id="basic-addon4">Jenis file PDF maksimal 15
                                                        MB*.
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
                                                        <!-- <input type="text" autocomplete="off" name="strata[]" class="form-control" id="inputStrata2" placeholder="Masukkan Strata"> -->
                                                        <select class="form-select" aria-label="Default select example" name="strata[]" id="strata1">
                                                            <option selected disabled>Pilih Satuan Pendidikan</option>
                                                            <option value="S1">S1</option>
                                                            <option value="S2">S2</option>
                                                            <option value="S3">S3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputJurusan" class="col-sm-2 col-form-label">Jurusan</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" autocomplete="off" name="jurusan[]" class="form-control" id="inputJurusan2" placeholder="Masukkan Jurusan">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputKonsentrasi" class="col-sm-2 col-form-label">Konsentrasi</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" autocomplete="off" name="konsentrasi[]" class="form-control" id="inputKonsentrasi2" placeholder="Masukkan Konsentrasi">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputAlumni" class="col-sm-2 col-form-label">Alumni</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" autocomplete="off" name="nama_kampus[]" class="form-control" id="inputSekolah2" placeholder="Masukkan Alumni">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputTahunlulus" class="col-sm-2 col-form-label">Tahun
                                                        Lulus</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" autocomplete="off" name="tahun_lulus[]" class="form-control" id="inputTahunlulus2" placeholder="Masukkan Tahun Lulus">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputSKJabatan" class="col-sm-2 col-form-label">Upload
                                                        Ijazah*</label>
                                                    <div class="col-sm-9">
                                                        <input type="file" class="form-control" id="inputIjazah2" name="ijazah[]" accept=".pdf">
                                                        <div class="form-text" id="basic-addon4">Jenis file PDF maksimal
                                                            15 MB*.
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
                                                            <input type="text" autocomplete="off" name="strata[]" class="form-control" id="inputStrata" placeholder="Masukkan Strata">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="inputJurusan" class="col-sm-2 col-form-label">Jurusan</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" autocomplete="off" name="jurusan[]" class="form-control" id="inputJurusan" placeholder="Masukkan Jurusan">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="inputKonsentrasi" class="col-sm-2 col-form-label">Konsentrasi</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" autocomplete="off" name="konsentrasi[]" class="form-control" id="inputKonsentrasi" placeholder="Masukkan Konsentrasi">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="inputAlumni" class="col-sm-2 col-form-label">Alumni</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" autocomplete="off" name="nama_kampus[]" class="form-control" id="inputAllumni" placeholder="Masukkan Alumni">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="inputTahunlulus" class="col-sm-2 col-form-label">Tahun Lulus</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" autocomplete="off" name="tahun_lulus[]" class="form-control" id="inputTahunlulus" placeholder="Masukkan Tahun Lulus">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="inputIjazah" class="col-sm-2 col-form-label">Upload Ijazah*</label>
                                                        <div class="col-sm-9">
                                                            <input type="file" class="form-control" id="inputIjazah" name="ijazah[]" accept=".pdf">
                                                            <div class="form-text" id="basic-addon4">Jenis file PDF
                                                                maksimal 15 MB*.
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
                                        <a class="btn btn-primary" onclick="kembaliKeForm(2); topFunction()">
                                            &lt; Previous
                                        </a>
                                    </div>
                                </div>
                                <div class="p-1">
                                    <div class="d-md-flex">
                                        <!-- <a class="btn btn-primary" href="../kepegawaian/tambahdata4.php" role="button">Next ></a> -->
                                        <a class="btn btn-primary" onclick="pindahKeForm(4); topFunction()" role="button">Next > </a>

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
                                                    <th>Nomor SK</th>
                                                    <th>TMT</th>
                                                    <th>Upload SK</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="width: 400px; border: 1px solid #ccc;">
                                                        <textarea type="text" name="catatan_mutasi[]" style="width: 400px; border: 1px solid #ccc;" rows="2"></textarea>
                                                    </td>
                                                    <td style="width: 150px; border: 1px solid #ccc;"><input type="text" autocomplete="off" name="nomor_sk[]" style="width: 150px; border: 1px solid #ccc;" /></td>
                                                    <td style="width: 150px; border: 1px solid #ccc;"><input type="date" autocomplete="off" name="tmt_mutasi[]" style="width: 150px; border: 1px solid #ccc;" /></td>
                                                    <td style="width: 250px; height: 30px;">
                                                        <input type="file" name="dokumen_mutasi[]" accept=".pdf" style="width: 250px; height: 30px;" />
                                                    </td>
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
                                        <label for=" inputSKJabatan" class="col-sm-2 col-form-label">Upload Pas
                                            Foto*</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" id="inputFoto" accept=".png, .jpg, .jpeg" name="foto">
                                            <div class="form-text" id="basic-addon4">Jenis file gambar bisa berupa PNG, JPG, atau JPEG*.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="p-2 ">
                                <div class="d-flex flex-row mb-3 justify-content-center">
                                    <div class="p-2">
                                        <input class="btn btn-danger d-grid gap-2 col-12 mx-auto" type="submit" value="Reset">
                                    </div>
                                    <div class="p-2">
                                        <input class="btn btn-success d-grid gap-2 col-12 mx-auto" type="submit" value="Tambah" name="tambah_data">
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-start">
                                <div class="p-1">
                                    <div class="d-md-flex">
                                        <a class="btn btn-primary" onclick="kembaliKeForm(3); topFunction()" role="button">
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
        // cell1.innerHTML = '<td style="display: none;"><input type="text" autocomplete="off" style="border: 1px solid #ccc;" name="jenis_diklat[]" value="Teknis" /></td>' ;
        cell1.style.display = 'none';

        // Menambahkan elemen input (teks) ke dalam sel-sel pertama, kedua, dan ketiga
        cell1.innerHTML = '<input type="text" autocomplete="off" name="jenis_diklat[]" value="Teknis" />';
        cell2.innerHTML = '<td><input type="text" autocomplete="off" name="nama_diklat[]" pattern="[A-Za-z ]{1,50}" title="Harus Berupa Huruf Minimal Sebanyak 1 Karakter dan Maksimal 50 Karakter" oninput="this.reportValidity()" ></input></td>';
        cell3.innerHTML = '<td><input type="text" autocomplete="off" name="tahun_diklat[]" pattern="[0-9]{4}" title="Harus Berupa Angka Sebanyak Maksimal 4 Karakter" oninput="this.reportValidity()"  /></td>';
        cell4.innerHTML = '<td><input type="text" autocomplete="off" name="jmlh_jam[]" pattern="[0-9]{1,6}" title="Harus Berupa Angka Sebanyak Maksimal 6 Karakter" oninput="this.reportValidity()" /></td>';

        // Menambahkan elemen input (file) ke dalam sel keempat
        cell5.innerHTML = '<input type="file" name="dokumen_diklat[]" accept=".pdf" required />';

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
        cell1.innerHTML = '<td><input type="text" autocomplete="off" style="border: 1px solid #ccc;" name="jenis_diklat[]" value="Jabatan"></td>';
        cell2.innerHTML = '<td><input type="text" autocomplete="off" name="nama_diklat[]" pattern="[A-Za-z ]{1,50}" title="Harus Berupa Huruf Minimal Sebanyak 1 Karakter dan Maksimal 50 Karakter" oninput="this.reportValidity()"></input></td>';
        cell3.innerHTML = '<td><input type="text" autocomplete="off" name="tahun_diklat[]" pattern="[0-9]{4}" title="Harus Berupa Angka Sebanyak Maksimal 4 Karakter" oninput="this.reportValidity()" /></td>';
        cell4.innerHTML = '<td><input type="text" autocomplete="off" name="jmlh_jam[]" pattern="[0-9]{1,6}" title="Harus Berupa Angka Sebanyak Maksimal 6 Karakter" oninput="this.reportValidity()"/></td>';

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
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);

        // Menambahkan elemen input (teks) ke dalam sel-sel pertama, kedua, dan ketiga
        cell1.innerHTML = '<td style="width: 400px; border: 1px solid #ccc;"><textarea type="text" name="catatan_mutasi[]" style="width: 400px; border: 1px solid #ccc;" rows="2"></textarea></td>';
        cell2.innerHTML = '<td style="width: 150px; border: 1px solid #ccc;"><input type="text" autocomplete="off" name="nomor_sk[]" style="width: 150px; border: 1px solid #ccc;" /></td>';
        // Menambahkan elemen input (file) ke dalam sel keempat
        cell3.innerHTML = '<td style="width: 150px; border: 1px solid #ccc;"><input type="date" autocomplete="off" name="tmt_mutasi[]" style="width: 150px; border: 1px solid #ccc;" /></td>';

        // Menambahkan tombol "Remove" ke dalam sel kelima
        cell4.innerHTML = '<td style="width: 250px; height: 30px;"><input type="file" name="dokumen_mutasi[]" accept=".pdf" style="width: 250px; height: 30px;" /></td>';
        cell5.innerHTML = '<button class="btn btn-danger btn-sm remove" type="button" onclick="hapusBaris3(this)"><i class="bi bi-x-lg"></i></button>';
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
        // Validasi input sesuai kebutuhan Anda untuk setiap form
        if (targetForm === 2) {
            const inputNama = document.getElementById('inputNama');
            const inputNip = document.getElementById('inputNip');
            const inputTempatLahir = document.getElementById('inputTempatLahir');
            const tanggalLahir = document.getElementById('tanggal_lahir');
            const jenisKelamin = document.querySelector('select[name="jenis_kelamin"]');
            const agama = document.querySelector('select[name="agama"]');
            const inputAlamat = document.getElementById('inputAlamat');
            const inputNoHP = document.getElementById('inputNoHP');
            const inputEmail = document.getElementById('inputEmail');
            const inputNpwp = document.getElementById('inputNpwp');
            const status = document.querySelector('select[name="status"]');

            if (
                inputNama.checkValidity() &&
                inputNip.checkValidity() &&
                inputTempatLahir.checkValidity() &&
                tanggalLahir.checkValidity() &&
                jenisKelamin.checkValidity() &&
                agama.checkValidity() &&
                inputAlamat.checkValidity() &&
                inputNoHP.checkValidity() &&
                inputEmail.checkValidity() &&
                inputNpwp.checkValidity() &&
                status.checkValidity()
            ) {
                pindahKeFormInternal(targetForm);
            } else {
                alert('Harap mengisi semua data dengan benar sebelum melanjutkan pengisian formulir');
                //                 Swal.fire(
                //   'Harap Mengisi Data Dengan Lengkap',
                //   '',
                //   'info'
                // )
            }
        } else if (targetForm === 3) {
            const Golongan = document.querySelector('select[name="id_golongan"]');
            const tmtGolongan = document.getElementById('inputTmtGol');
            const namaJabatan = document.getElementById('inputNamajabatan');
            const penempatan = document.querySelector('select[name="id_bidang"]');
            const tmt_jabatan = document.getElementById('inputTmtJabatan');
            const sk = document.getElementById('inputSKJabatan');
            const MasaKerjaTahun = document.getElementById('inputTahun');
            const MasaKerjaBulan = document.getElementById('inputBulan');

            // Periksa validitas semua elemen

            if (
                Golongan.checkValidity() &&
                tmtGolongan.checkValidity() &&
                namaJabatan.checkValidity() &&
                penempatan.checkValidity() &&
                tmt_jabatan.checkValidity() &&
                sk.checkValidity() &&
                MasaKerjaTahun.checkValidity() &&
                MasaKerjaBulan.checkValidity()
            ) {
                pindahKeFormInternal(targetForm);
            } else {
                // alert('Harap isi semua data dengan benar sebelum melanjutkan pengisian form.');
                alert('Harap isi semua data dengan benar sebelum melanjutkan pengisian formulir');
                //                  Swal.fire(
                //   'Harap Mengisi Data Dengan Lengkap',
                //   '',
                //   'info')
            }
        } else if (targetForm === 4) {

            pindahKeFormInternal(targetForm);

        } else {
            pindahKeFormInternal(targetForm);
        }
    }

    function pindahKeFormInternal(targetForm) {
        // Semua input valid, pindah ke form yang ditentukan
        for (let i = 1; i <= 4; i++) {
            document.getElementById('form-' + i).style.display = 'none';
        }
        document.getElementById('form-' + targetForm).style.display = 'block';
    }
</script>


<script>
    function kembaliKeForm(previousForm) {
        for (let i = 1; i <= 4; i++) {
            document.getElementById('form-' + i).style.display = 'none';
        }
        document.getElementById('form-' + previousForm).style.display = 'block';
    }
</script>

<script>
    // Ambil elemen select dan input teks
    var selectBidang = document.getElementById('id_bidang');
    var inputNamaBidang = document.getElementById('nama_bidang_text');

    // Tambahkan event listener untuk mengubah nilai input teks
    selectBidang.addEventListener('change', function() {
        // Dapatkan nama bidang yang sesuai dengan ID yang dipilih
        var selectedOption = selectBidang.options[selectBidang.selectedIndex];
        var namaBidang = selectedOption.textContent;

        // Setel nilai input teks dengan nama bidang yang dipilih
        inputNamaBidang.value = namaBidang;
    });
</script>


<!-- <script>
    // Ambil elemen select dan input teks
    var selectGolongan = document.getElementById('id_golongan');
    var inputNamaGolongan = document.getElementById('nama_golongan');

    // Tambahkan event listener untuk mengubah nilai input teks
    selectGolongan.addEventListener('change', function() {
        // Dapatkan nama bidang yang sesuai dengan ID yang dipilih
        var selectedOption = selectGolongan.options[selectGolongan.selectedIndex];
        var namaGol = selectedOption.textContent;

        // Setel nilai input teks dengan nama bidang yang dipilih
        inputNamaGolongan.value = namaGol;
    });
</script> -->

<script>
    // Ambil elemen select dan input teks
    var selectGolongan = document.getElementById('id_golongan');
    var inputNamaGolongan = document.getElementById('nama_golongan_text');

    // Tambahkan event listener untuk mengubah nilai input teks
    selectGolongan.addEventListener('change', function() {
        // Dapatkan nama golongan yang sesuai dengan ID yang dipilih
        var selectedOption = selectGolongan.options[selectGolongan.selectedIndex];
        var namaGolongan = selectedOption.textContent;

        // Setel nilai input teks dengan nama golongan yang dipilih
        inputNamaGolongan.value = namaGolongan;
    });
</script>