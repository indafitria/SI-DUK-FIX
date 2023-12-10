<?php include '../sections/header.php'; ?>
<?php include '../../config/koneksi.php'; ?>
<?php include '../../function/fungsi.php'; ?>

<?php


//jika tidak ada login sebelumnya maka diarahkan ke login.php
if (empty($_SESSION['username']) and empty($_SESSION['pass'])) {
  echo "<script> window.location = '../../index.php' </script>";
};
?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Edit Data</h4>
        </div>
        <div class="card-body">

          <?php
          $nip = $_GET['nip'];
          // $sql_edit = mysqli_query($koneksi,"SELECT * FROM pegawai JOIN data_pribadi on pegawai.id_data_pribadi = data_pribadi.id_data_pribadi
          //         JOIN data_bidang ON pegawai.id_bidang = data_bidang.id_bidang JOIN golongan ON pegawai.id_golongan = golongan.id_golongan
          //         JOIN riwayat_pendidikan ON riwayat_pendidikan.nip = pegawai.nip JOIN riwayat_diklat ON riwayat_diklat.nip = pegawai.nip JOIN riwayat_mutasi ON riwayat_mutasi.nip = pegawai.nip");
          $sql_edit = mysqli_query($koneksi, "SELECT * FROM pegawai JOIN data_pribadi on pegawai.id_data_pribadi = data_pribadi.id_data_pribadi
                JOIN data_bidang ON pegawai.id_bidang = data_bidang.id_bidang JOIN golongan ON pegawai.id_golongan = golongan.id_golongan 
                WHERE pegawai.nip ='$nip'");

          $row_edit = mysqli_fetch_array($sql_edit);
          $id_dapri = $row_edit['id_data_pribadi'];
          $nama = $row_edit['nama'];
          $nip = $row_edit['nip'];
          $tempat_lahir = $row_edit['tempat_lahir'];
          $tanggal_lahir = $row_edit['tanggal_lahir'];
          $usia = $row_edit['usia'];
          $jenis_kelamin = $row_edit['jenis_kelamin'];
          $agama = $row_edit['agama'];


          $alamat = $row_edit['alamat'];
          $no_hp = $row_edit['no_hp'];
          $email = $row_edit['email'];
          $npwp = $row_edit['npwp'];
          $foto = $row_edit['foto'];
          $status = $row_edit['status'];

          // if ($status === 'Pegawai_Aktif') {
          //     $status1 = 'Aktif';
          // } else if ($status === 'Mutasi') {
          //     $status1 = 'Mutasi';
          // } else if ($status === 'Pensiun') {
          //     $status1 = 'Pensiun';
          // }

          // Sekarang $status sudah pasti didefinisikan


          $id_golongan = $row_edit['id_golongan'];
          $tmt_gol = $row_edit['tmt_golongan'];
          $nomor_sk_gol = $row_edit['nomor_sk_golongan'];
          $sk_pangkat = $row_edit['sk_pangkat'];

          $jab = $row_edit['jabatan'];
          $id_bidang = $row_edit['id_bidang'];
          $tmt_jab = $row_edit['tmt_jabatan'];
          $sk = $row_edit['sk_jabatan'];
          $mkt = $row_edit['masa_kerja_tahun'];
          $mkb = $row_edit['masa_kerja_bulan'];
          $no_sk = $row_edit['nomor_sk_jabatan'];



          ?>
          <form role="form" action="editdatapegawai_2.php" method="POST" enctype="multipart/form-data">

            <div class="p-2">
              <!-- <input type="hidden"> -->
              <div class="row mb-3">
                <input type="hidden" class="form-control" value="<?php echo $id_dapri ?>" name="id_data_pribadi">
                <label for="#" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-9">
                  <input type="text" autocomplete="off" class="form-control" value="<?php echo $nama ?>" name="nama" required pattern="[A-Za-z., ]{1,50}" title=" Nama Harus Berupa Huruf Minimal Sebanyak 1 Karakter dan Maksimal 50 Karakter" oninput="this.reportValidity()" placeholder="Masukan Nama Lengkap">
                </div>
              </div>
              <div class="row mb-3">
                <label for="#" class="col-sm-2 col-form-label">NIP</label>
                <div class="col-sm-9">
                  <input type="text" autocomplete="off" class="form-control" value="<?php echo $nip ?>" name="nip" readonly>
                </div>
              </div>
              <div class="row mb-3">
                <label for="#" class="col-sm-2 col-form-label">Tempat Lahir</label>
                <div class="col-sm-9">
                  <input type="text" autocomplete="off" class="form-control" value="<?php echo $tempat_lahir ?>" name="tempat_lahir" required pattern="[A-Za-z ]{1,50}" title="Berupa Huruf Minimal Sebanyak 1 Karakter dan Maksimal 50 Karakter" oninput="this.reportValidity()" placeholder="Masukkan Tempat Lahir">
                </div>
              </div>
              <div class="row mb-3">
                <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-9">
                  <input type="date" autocomplete="off" class="form-control" value="<?php echo $tanggal_lahir ?>" name="tanggal_lahir" id="tanggal_lahir" oninput="hitungUsia()" required="required" oninput="this.reportValidity() placeholder=" Masukkan Tanggal Lahir">
                </div>
              </div>

              <div class="row mb-3">
                <label for="usia" class="col-sm-2 col-form-label">Usia</label>
                <div class="col-sm-9">
                  <input type="text" autocomplete="off" class="form-control" value="<?php echo $usia ?>" name="usia" id="input_usia" required="required" readonly>
                  <span id="hasil_usia"></span>
                </div>
              </div>



              <div class="row mb-3">
                <label for="#" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-9">
                  <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                    <option selected><?php echo $jenis_kelamin ?></option>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="#" class="col-sm-2 col-form-label">Agama</label>
                <div class="col-sm-9">
                  <select class="form-select" aria-label="Default select example" name="agama">
                    <option value="Islam" <?php echo ($agama === 'Islam') ? 'selected' : ''; ?>>Islam</option>
                    <option value="Kristen-Protestan" <?php echo ($agama === 'Kristen') ? 'selected' : ''; ?>>Kristen</option>
                    <option value="Kristen-Katholik" <?php echo ($agama === 'Katholik') ? 'selected' : ''; ?>>Katolik</option>
                    <option value="Hindu" <?php echo ($agama === 'Hindu') ? 'selected' : ''; ?>>Hindu</option>
                    <option value="Buddha" <?php echo ($agama === 'Buddha') ? 'selected' : ''; ?>>Buddha</option>
                    <option value="Khonghucu" <?php echo ($agama === 'Khonghucu') ? 'selected' : ''; ?>>Khonghucu</option>
                  </select>
                </div>
              </div>


              <div class="row mb-3">
                <label for="#" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-9">
                  <input type="text" autocomplete="off" class="form-control" value="<?php echo $alamat ?>" name="alamat" required pattern="[A-Za-z.0-9 ]{1,50}" title="Harus Berupa Huruf atau Angka Minimal Sebanyak 1 Karakter dan Maksimal 50 Karakter" oninput="this.reportValidity()" placeholder="Masukkan Alamat">
                </div>
              </div>


              <div class="row mb-3">
                <label for="#" class="col-sm-2 col-form-label">Nomor HP</label>
                <div class="col-sm-9">
                  <input type="text" autocomplete="off" class="form-control" value="<?php echo $no_hp ?>" name="no_hp" required pattern="[0-9+]{10,14}" title=" Nama Harus Berupa Huruf Minimal Sebanyak 10 Karakter dan Maksimal 14 Karakter" oninput="this.reportValidity()" placeholder="Masukkan Nomor HP">
                </div>
              </div>

              <div class="row mb-3">
                <label for="#" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-9">
                  <input type="email" autocomplete="off" class="form-control" value="<?php echo $email ?>" name="email" required pattern="[A-Za-z0-9.@ ]{5,50}" title=" Harus Berupa Huruf dan Angka, dan Karakter '@'. Minimal Sebanyak 5 Karakter dan Maksimal 50 Karakter" oninput="this.reportValidity()" placeholder="Masukkan Email">
                </div>
              </div>

              <div class="row mb-3">
                <label for="#" class="col-sm-2 col-form-label">Nomor NPWP</label>
                <div class="col-sm-9">
                  <input type="number" class="form-control" value="<?php echo $npwp ?>" name="npwp" required pattern="[0-9]{15,16}" title=" Harus Berupa Angka Minimal Sebanyak 15 Karakter dan Maksimal 1 Karakter" oninput="this.reportValidity()" placeholder="Masukkan NPWP">
                </div>
              </div>

              <div class="row mb-3">
                <label for="#" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-9">
                  <select class="form-select" aria-label="Default select example" name="status">
                    <option value="Pegawai_Aktif" <?php echo ($status === 'Aktif') ? 'selected' : ''; ?>>Aktif</option>
                    <option value="Mutasi" <?php echo ($status === 'Mutasi') ? 'selected' : ''; ?>>Mutasi</option>
                    <option value="Pensiun" <?php echo ($status === 'Pensiun') ? 'selected' : ''; ?>>Pensiun</option>
                  </select>
                </div>
              </div>

            </div>
            <div class="d-flex flex-column mb-3">
              <div class="p-2 fw-bold fs-5">Pangkat/Golongan</div>
              <div class="p-2">
                <!-- <div class="row mb-3">
                                    <label for="#" class="col-sm-2 col-form-label">Golongan</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" name="id_golongan" aria-label="Default select example">
                                            <option selected > echo </option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>
                                </div> -->

                <div class="row mb-3">
                  <label for="#" class="col-sm-2 col-form-label">Golongan</label>
                  <div class="col-sm-9">
                    <select class="form-select" name="id_golongan" id="id_golongan" aria-label="Default select example">
                      <?php
                      $result3 = mysqli_query($koneksi, "SELECT * FROM golongan");
                      while ($data = mysqli_fetch_array($result3)) {
                        $selected = ($data['id_golongan'] == $id_golongan) ? 'selected' : '';
                      ?>
                        <option value="<?= $data['id_golongan']; ?>" <?= $selected; ?>><?php echo $data['nama_golongan']; ?></option>
                      <?php
                      }
                      ?>
                    </select>


                    <!-- Input text to display the selected 'nama_bidang' -->
                    <input type="text" hidden autocomplete="off" name="nama_golongan" id="nama_golongan_text" value="<?php echo isset($nama_golongan) ? $nama_golongan : ''; ?>" readonly>
                    <input type="text" hidden autocomplete="off" name="jenis_sk_pangkat" value="pangkat" readonly>
                  </div>
                </div>


                <div class="row mb-3">
                  <label for="#" class="col-sm-2 col-form-label">TMT</label>
                  <div class="col-sm-9">
                    <input type="date" autocomplete="off" class="form-control" value="<?php echo $tmt_gol ?>" name="tmt_golongan" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="#" class="col-sm-2 col-form-label">Nomor SK Golongan</label>
                  <div class="col-sm-9">
                    <input type="text" autocomplete="off" class="form-control" value="<?php echo $nomor_sk_gol ?>" name="nomor_sk_golongan" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputDokumenDiklat" class="col-sm-2 col-form-label">Dokumen SK</label>
                  <div class="col-sm-9">
                    <?php

                    if (!empty($sk_pangkat)) {
                      echo "<a href='../../Penyimpanan/sk/$sk_pangkat' target='_blank'>$sk_pangkat</a>";
                    } else {
                      echo "Dokumen belum diunggah.";
                    }
                    ?>
                  </div>
                  <div class="row mb-3">
                    <label for="#" class="col-sm-2 col-form-label">Upload SK
                      Pangkat/Awal*</label>
                    <div class="col-sm-9">
                      <input type="file" class="form-control" name="sk_pangkat" accept=".pdf">
                      <div class="form-text" id="basic-addon4">Jenis file PDF maksimal 15 MB*.
                      </div>
                    </div>
                  </div>

                </div>
              </div>

              <div class="d-flex flex-column mb-3">
                <div class="p-2 fw-bold fs-5">Jabatan</div>
                <div class="p-2">
                  <div class="row mb-3">
                    <label for="#" class="col-sm-2 col-form-label">Nama Jabatan</label>
                    <div class="col-sm-9">
                      <input type="text" autocomplete="off" class="form-control" value="<?php echo $jab ?>" name="jabatan" required="required" placeholder="Masukkan Nama Jabatan" required pattern="[A-Za-z ]{3,50}" title="Harus Berupa Huruf Minimal Sebanyak 3 Karakter dan Maksimal 50 Karakter" oninput="this.reportValidity()">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="#" class="col-sm-2 col-form-label">Penempatan</label>
                    <div class="col-sm-9">
                      <select class="form-select" name="id_bidang" id="id_bidang" aria-label="Default select example">
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



                  <div class="row mb-3">
                    <label for="#" class="col-sm-2 col-form-label">TMT</label>
                    <div class="col-sm-9">
                      <input type="date" autocomplete="off" class="form-control" value="<?php echo $tmt_jab ?>" name="tmt_jabatan" required>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="#" class="col-sm-2 col-form-label">Nomor SK Jabatan</label>
                    <div class="col-sm-9">
                      <input type="text" autocomplete="off" class="form-control" value="<?php echo $no_sk ?>" name="nomor_sk_jabatan" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputDokumenDiklat" class="col-sm-2 col-form-label">Dokumen SK</label>
                    <div class="col-sm-9">
                      <?php

                      if (!empty($sk)) {
                        echo "<a href='../../Penyimpanan/sk/$sk' target='_blank'>$sk</a>";
                      } else {
                        echo "Dokumen belum diunggah.";
                      }
                      ?>
                    </div>
                    <div class="row mb-3">
                      <label for="#" class="col-sm-2 col-form-label">Upload SK
                        Jabatan*</label>
                      <div class="col-sm-9">
                        <input type="file" class="form-control" name="sk_jabatan" accept=".pdf">
                        <div class="form-text" id="basic-addon4">Jenis file PDF maksimal 15 MB*.
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="d-flex flex-column mb-3">
                  <div class="p-2 fw-bold fs-5">Masa Kerja</div>
                  <div class="p-2">
                    <div class="row mb-3">
                      <label for="#" class="col-sm-2 col-form-label">Tahun</label>
                      <div class="col-sm-9">
                        <input type="text" autocomplete="off" class="form-control" value="<?php echo $mkt ?>" name="masa_kerja_tahun" placeholder="Masukkan Tahun" required pattern="[0-9]{2}" title="Harus Berupa Angka Maksimal 2 Karakter" oninput="this.reportValidity()">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="#" class="col-sm-2 col-form-label">Bulan</label>
                      <div class="col-sm-9">
                        <input type="text" autocomplete="off" class="form-control" value="<?php echo $mkb ?>" name="masa_kerja_bulan" placeholder="Masukkan Bulan" required pattern="[0-9]{2}" title="Harus Berupa Angka Maksimal 2 Karakter" oninput="this.reportValidity()">
                      </div>
                    </div>
                  </div>
                </div>


                <div class="p-2 fw-bold fs-5">Riwayat SK
                  <a href="../kepegawaian/tambah_sk.php?nip=<?php echo $nip; ?>" class="btn btn-success btn-sm bi bi-plus-lg ms-3" data-toggle="tooltip" data-placement="top" title="Edit"></a>
                </div>
                <?php
                $tampil_sk = mysqli_query($koneksi, "SELECT *
                FROM riwayat_pangkat
                WHERE NIP = '$nip' AND tmt_sk < (SELECT MAX(tmt_sk) FROM riwayat_pangkat)
                ORDER BY tmt_sk ASC;
                ");
                ?>
                <table class="table table-bordered text-center">
                  <thead>
                  <tr>
                      <th>No</th>
                      <th>Mutasi Kepegawaian</th>
                      <th style="width: 100px;" >TMT</th>
                      <th>Nomor SK</th>
                      <th>Dokumen</th>
                      <th style="width: 90px;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $nom = 1;
                    while ($n = mysqli_fetch_array($tampil_sk)) { ?>
                      <tr>
                        <td><?php echo $nom++ ?></td>
                        <td><?php echo $n['jenis_sk']; ?></td>
                        <td><?php echo $n['nomor_sk']; ?></td>
                        <td><?php echo $n['tmt_sk']; ?></td>
                        <td>
                          <?php if (!empty($n['dokumen_sk'])) { ?>
                            <a href='../../Penyimpanan/sk/<?php echo $n['dokumen_sk']; ?>' target='_blank'>
                              <?php echo $n['dokumen_sk']; ?>
                            </a>
                          <?php } else {
                            echo '-';
                          } ?>
                        </td>
                        <td>
                          <a href="../kepegawaian/edit_sk.php?nip=<?php echo $nip; ?>&id_sk=<?php echo $n['id_sk']; ?>" class="btn btn-primary btn-sm bi bi-pencil-square" data-toggle="tooltip" data-placement="top" title="Edit"></a>
                          <a href="../kepegawaian/hapus.php?id_sk=<?php echo $n['id_sk']; ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-sm bi bi-trash3-fill" onClick="window.location.reload()" data-toggle="tooltip" data-placement="top" title="Hapus"></a>
                        </td>

                      </tr>
                    <?php } ?>
                  </tbody>
                </table>

                <div class="p-2 fw-bold fs-5">Riwayat Diklat
                  <a href="../kepegawaian/tambah_datadiklat.php?nip=<?php echo $nip; ?>" class="btn btn-success btn-sm bi bi-plus-lg ms-3" data-toggle="tooltip" data-placement="top" title="Edit"></a>
                </div>

                <?php
                $query = mysqli_query($koneksi, "SELECT * FROM riwayat_diklat JOIN pegawai ON riwayat_diklat.nip = pegawai.nip
                        WHERE riwayat_diklat.nip = '$nip'");
                ?>
                <table class="table table-bordered text-center">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Jenis Diklat</th>
                      <th>Nama Diklat</th>
                      <th>Bulan / Tahun</th>
                      <th>Jumlah Jam</th>
                      <th>Dokumen</th>
                      <th>Aksi</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    while ($n = mysqli_fetch_array($query)) { ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $n['jenis_diklat']; ?></td>
                        <td><?php echo $n['nama_diklat']; ?></td>
                        <td><?php echo $n['tahun_diklat']; ?></td>
                        <td><?php echo $n['jmlh_jam']; ?></td>
                        <td>
                          <?php if (!empty($n['dokumen_diklat'])) { ?>
                            <a href='../../Penyimpanan/sk/<?php echo $n['dokumen_diklat']; ?>' target='_blank'>
                              <?php echo $n['dokumen_diklat']; ?>
                            </a>
                          <?php } else {
                            echo '-';
                          } ?>
                        </td>
                        <td>
                          <a href="../kepegawaian/edit_datadiklat.php?nip=<?php echo $nip; ?>&id_diklat=<?php echo $n['id_diklat']; ?>" class="btn btn-primary btn-sm bi bi-pencil-square" data-toggle="tooltip" data-placement="top" title="Edit"></a>
                          <a href="hapus.php?id_diklat=<?php echo $n['id_diklat']; ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-sm bi bi-trash3-fill" onClick="window.location.reload()" data-toggle="tooltip" data-placement="top" title="Hapus"></a>
                        </td>

                      </tr>
                    <?php } ?>
                  </tbody>
                </table>

                <?php
                $t = mysqli_query($koneksi, "SELECT *
                         FROM riwayat_pendidikan
                         JOIN pegawai ON riwayat_pendidikan.nip = pegawai.nip
                         WHERE riwayat_pendidikan.nip = '$nip'
                         AND (riwayat_pendidikan.strata = 'SMA' OR riwayat_pendidikan.strata = 'SMK')");

                $t_edit = mysqli_fetch_array($t);
                $nopnd = $t_edit['no_pnd'];
                $strata = $t_edit['strata'];
                $nama_sklh = $t_edit['nama_kampus'];
                $jur_sma = $t_edit['jurusan'];
                $tahun_lulus_sma = $t_edit['tahun_lulus'];
                $ijazah = $t_edit['ijazah'];

                ?>
                <div class="d-flex flex-column mb-3">
                  <div class="p-2 fw-bold fs-5">Pendidikan</div>
                  <div class="p-4 fw-bold">Pendidikan Menengah</div>
                  <div class="ps-5">
                    <input type="hidden" class="form-control" value="<?php echo $nopnd ?>" name="no_pnd">
                    <input type="hidden" class="form-control" value="<?php echo $strata ?>" name="strata">
                    <div class="row mb-3">

                      <label for="#" class="col-sm-2 col-form-label">Nama Sekolah</label>
                      <div class="col-sm-9">
                        <input type="text" autocomplete="off" class="form-control" value="<?php echo $nama_sklh ?>" name="nama_kampus" required pattern="[A-Za-z.0-9 ]{1,50}" title="Harus Berupa Huruf atau Angka Minimal Sebanyak 1 Karakter dan Maksimal 50 Karakter" oninput="this.reportValidity()">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="#" class="col-sm-2 col-form-label">Jurusan</label>
                      <div class="col-sm-9">
                        <input type="text" autocomplete="off" class="form-control" value="<?php echo $jur_sma ?>" name="jurusan" placeholder="" required pattern="[A-Za-z ]{1,50}" title="Harus Berupa Huruf Minimal Sebanyak 1 Karakter dan Maksimal 50 Karakter" oninput="this.reportValidity()">
                      </div>
                    </div>
                    <input type="hidden" class="form-control" value="-" name="konsentrasi" placeholder="">
                    <div class="row mb-3">
                      <label for="#" class="col-sm-2 col-form-label">Tahun Lulus</label>
                      <div class="col-sm-9">
                        <input type="text" autocomplete="off" class="form-control" value="<?php echo $tahun_lulus_sma ?>" name="tahun_lulus" placeholder="" required pattern="[0-9]{4}" title="Harus Berupa Angka Sebanyak 4 Karakter" oninput="this.reportValidity()">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="#" class="col-sm-2 col-form-label">Ijazah</label>
                      <div class="col-sm-9">
                        <?php

                        if (!empty($ijazah)) {
                          echo "<a href='../../Penyimpanan/ijazah/$ijazah' target='_blank'>$ijazah</a>";
                        } else {
                          echo "Dokumen Belum Diunggah.";
                        }
                        ?>
                      </div>
                      <label for="#" class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-9">
                        <input type="file" class="form-control" name="ijazah" accept=".pdf">
                        <div class="form-text" id="basic-addon4">Jenis file PDF maksimal 15 MB*.
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="p-2 pb-2 fw-bold fs-5">Pendidikan Tinggi
                  <a href="../kepegawaian/tambah_datapendidikantinggi.php?nip=<?php echo $nip; ?>" class="btn btn-success btn-sm bi bi-plus-lg ms-3" data-toggle="tooltip" data-placement="top" title="Edit"></a>
                </div>
                <?php
                $query2 = mysqli_query($koneksi, "SELECT *
                                    FROM riwayat_pendidikan
                                    JOIN pegawai ON riwayat_pendidikan.nip = pegawai.nip
                                    WHERE riwayat_pendidikan.nip = '$nip'
                                    AND (riwayat_pendidikan.strata = 'S1' OR riwayat_pendidikan.strata = 'S2' OR riwayat_pendidikan.strata = 'S3');
                                    "); ?>
                <table class="table table-bordered text-center">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Strata</th>
                      <th>Jurusan</th>
                      <th>Konsentrasi</th>
                      <th>Alumni</th>
                      <th>Tahun Lulus</th>
                      <th>Dokumen</th>
                      <th>Aksi</th>

                    </tr>
                  </thead>
                  <tbody> <?php
                          $no = 1;
                          while ($p = mysqli_fetch_array($query2)) { ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $p['strata']; ?></td>
                        <td><?php echo $p['jurusan'] ?></td>
                        <td><?php echo $p['konsentrasi']; ?></td>
                        <td><?php echo $p['nama_kampus']; ?></td>
                        <td><?php echo $p['tahun_lulus']; ?></td>


                        <td>
                          <?php if (!empty($p['ijazah'])) { ?>
                            <a href='../../Penyimpanan/ijazah/<?php echo $p['ijazah']; ?>' target='_blank'>
                              <?php echo $p['ijazah']; ?>
                            </a>
                          <?php } else {
                              echo '-';
                            } ?>
                        </td>

                        <td>
                          <a href="../kepegawaian/edit_datasarjana.php?nip=<?php echo $p['nip']; ?>&no_pnd=<?php echo $p['no_pnd'];
                                                                                                            ?>" class="btn btn-primary btn-sm bi bi-pencil-square" data-toggle="tooltip" data-placement="top" title="Edit"></a>
                          <a href="../kepegawaian/hapus.php?no_pnd=<?php echo $p['no_pnd'] ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-sm bi bi-trash3-fill" onClick="window.location.reload()" data-toggle="tooltip" data-placement="top" title="Hapus"></a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>

                <div class="p-2 pb-2 fw-bold fs-5 mt-5">Catatan Mutasi Kepegawaian
                  <a href="../kepegawaian/tambah_datamutasi.php?nip=<?php echo $nip; ?>" class="btn btn-success btn-sm bi bi-plus-lg ms-3" data-toggle="tooltip" data-placement="top" title="Edit"></a>
                </div> <?php
                        $query3 = mysqli_query($koneksi, "SELECT *
                                    FROM riwayat_mutasi
                                    JOIN pegawai ON riwayat_mutasi.nip = pegawai.nip
                                    WHERE riwayat_mutasi.nip = '$nip'"); ?>
                <table class="table table-bordered text-center">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Mutasi Kepegawaian</th>
                      <th style="width: 110px">TMT</th>
                      <th style="width: 110px">Nomor SK</th>
                      <th>Dokumen</th>
                      <th style="width: 90px">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    while ($l = mysqli_fetch_array($query3)) { ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $l['catatan_mutasi']; ?></td>
                        <td><?php echo $l['tmt_mutasi']; ?></td>
                        <td><?php echo $l['nomor_sk']; ?></td>
                        <td>
                          <?php if (!empty($l['dokumen_mutasi'])) { ?>
                            <a href='../../Penyimpanan/sk/<?php echo $l['dokumen_mutasi']; ?>' target='_blank'>
                              <?php echo $l['dokumen_mutasi']; ?>
                            </a>
                          <?php } else {
                            echo '-';
                          } ?>
                        </td>
                        <td>
                          <a href="../kepegawaian/edit_datamutasi.php?nip=<?php echo $nip; ?>&no_mtsi=<?php echo $l['no_mtsi']; ?>" class="btn btn-primary btn-sm bi bi-pencil-square" data-toggle="tooltip" data-placement="top" title="Edit"></a>
                          <a href="hapus.php?no_mtsi=<?php echo $l['no_mtsi']; ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-sm bi bi-trash3-fill" onClick="window.location.reload()" data-toggle="tooltip" data-placement="top" title="Hapus"></a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>


                </table>
                <div class="row mb-3 p-4">
                  <label for="#" class="col-sm-2 col-form-label">Pas Foto*</label>
                  <div class="col-sm-9">
                    <?php

                    if (!empty($foto)) {
                      echo "<a href='../../Penyimpanan/foto/$foto' target='_blank'>$foto</a>";
                    } else {
                      echo "Belum Ada Foto.";
                    }
                    ?>
                  </div>



                  <label for="#" class="col-sm-2 col-form-label">Upload Pas Foto*</label>
                  <div class="col-sm-9">
                    <input type="file" class="form-control" accept=".jpg,.png" name="foto">
                    <div class="form-text" id="basic-addon4">Jenis file PDF maksimal 15 MB*.
                    </div>
                  </div>
                </div>
              </div>



              <div class="d-flex justify-content-center m-4">
                <button type="reset" class="btn btn-md btn-danger m-1" onclick=" resetData(); topFunction()">Reset</button>
                <button type="submit" name="simpan_edp" class="btn btn-md btn-success m-1">Simpan</button>

              </div>
          </form>
          <div class="d-md-flex justify-content-start">
            <a class="btn btn-primary" href="../kepegawaian/detail_pegawai.php?nip=<?php echo $nip; ?>" role="button">Kembali</a>
          </div>


        </div>
      </div>
    </div>
  </div>
</div>
</div>

<?php include '../sections/footer.php'; ?>


<!-- <script>
function resetData(){
  window.alert('Data Telah Di Reset');
}


</script>
<script>
// Ketika pengguna menggulir ke bawah 20px dari bagian atas halaman, tampilkan tombol
window.onscroll = function() {
  scrollFunction();
};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("myBtn").style.display = "block";
  } else {
    document.getElementById("myBtn").style.display = "none";
  }
}

// Ketika tombol diklik, gulir ke bagian atas halaman
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

</script> -->
<script>
  function hitungUsia() {
    var tanggalLahir = document.getElementById("tanggal_lahir").value;
    var tanggalLahirObj = new Date(tanggalLahir);
    var tanggalSekarang = new Date();
    var selisihUsia = tanggalSekarang - tanggalLahirObj;

    var usiaTahun = Math.floor(selisihUsia / 31536000000); // 1 tahun = 31.536.000.000 milidetik
    var usiaBulan = Math.floor((selisihUsia % 31536000000) / 2628000000); // 1 bulan = 2.628.000.000 milidetik

    // var hasilUsia = "Usia Anda adalah " + usiaTahun + " tahun " + usiaBulan + " bulan.";
    // document.getElementById("hasil_usia").textContent = hasilUsia;

    // Mengisi input usia dengan hasil usia
    document.getElementById("input_usia").value = usiaTahun + " tahun " + usiaBulan + " bulan";
  }

  // Memanggil fungsi hitungUsia saat halaman dimuat untuk mengisi input usia dengan format yang benar
  document.addEventListener('DOMContentLoaded', function() {
    hitungUsia();
  });
</script>

<!-- <script>
  let btn = document.getElementById("button")
  btn.addEventListener("click", refreshHalaman)
  // Fungsi untuk melakukan refresh halaman
  function refreshHalaman() {
    location.reload(); // Fungsi ini akan mereload halaman
  }

  // Set interval untuk memanggil fungsi refreshHalaman setiap 5 detik (5000 milidetik)
  setInterval(refreshHalaman, 1000);
</script> -->