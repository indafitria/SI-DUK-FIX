<?php include '../sections/header.php'; ?>
<?php include '../../config/koneksi.php'; ?>
<?php include '../../function/fungsi.php'; ?>



<?php
if (isset($_POST['simpan_edp'])) {
  $id_dapri = $_POST['id_data_pribadi'];
  $nama = $_POST['nama'];
  $nip = $_POST['nip'];
  $tempat_lahir = $_POST['tempat_lahir'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $usia = $_POST['usia'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $agama = $_POST['agama'];
  $alamat = $_POST['alamat'];
  $no_hp = $_POST['no_hp'];
  $email = $_POST['email'];
  $npwp = $_POST['npwp'];

  $lokasi_foto = $_FILES['foto']['tmp_name'];
  $foto = $_FILES['foto']['name'];
  $ukuran_foto = $_FILES['foto']['size'];


  $status = $_POST['status'];
  $id_golongan = $_POST['id_golongan'];
  $tmt_gol = $_POST['tmt_golongan'];
  $jab = $_POST['jabatan'];
  $id_bidang = $_POST['id_bidang'];
  $tmt_jab = $_POST['tmt_jabatan'];
  $penempatan = $_POST['penempatan'];
  $lokasi_sk = $_FILES['sk_jabatan']['tmp_name'];
  $sk = $_FILES['sk_jabatan']['name'];
  $ukuran_sk = $_FILES['sk_jabatan']['size'];


  $mkt = $_POST['masa_kerja_tahun'];
  $mkb = $_POST['masa_kerja_bulan'];
  $nopnd = $_POST['no_pnd'];
  $strata = $_POST['strata'];
  $jurusan = $_POST['jurusan'];
  $konsentrasi = $_POST['konsentrasi'];
  $nama_sklh = $_POST['nama_kampus'];
  $thn_lulus = $_POST['tahun_lulus'];


  $lokasi_ijazah = $_FILES['ijazah']['tmp_name'];
  $ijazah = $_FILES['ijazah']['name'];
  $ukuran_ijazah = $_FILES['ijazah']['size'];

  $cttn_mutasi1 = $jab . ' ' . $penempatan.' '.'Dinas Komunikasi,Informatika,Persandian,dan Statistik Provinsi Kalimantan Tengah';

    $pegawai['catatan_mutasi'] = $cttn_mutasi1;


    // Logika untuk tabel data pribadi
    if (empty($lokasi_foto)) {
      // Jika foto tidak diunggah, panggil fungsi tanpa mengubah foto
      $hasil_1 = ubahDataPribadi1($id_dapri, $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $usia, $email, $no_hp, $alamat, $agama);
    } else {
      if ($ukuran_foto > 15000000) { // 15 MB dalam bytes
        echo "<script> alert('Ukuran file lebih dari 15 MB, data tidak dapat ditambahkan.'); window.history.back();</script>";
        exit();
      } else if ($ukuran_foto < 15000000) {
        $allowed_extensions = array('jpg', 'jpeg', 'JPEG', 'JPG');
        $file_extension = pathinfo($foto, PATHINFO_EXTENSION);
  
        if (!in_array(strtolower($file_extension), $allowed_extensions)) {
          echo "<script> alert('Format file tidak valid. Hanya file JPG dan JPEG yang diizinkan.'); window.history.back();</script>";
          exit();
        } else {
          move_uploaded_file($lokasi_foto, '../../Penyimpanan/foto/' . $foto);
          // Tambahkan data pribadi ke database dengan nama file yang baru
          $hasil_1 = ubahDataPribadi($id_dapri, $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $usia, $email, $no_hp, $foto, $alamat, $agama);
        }
      } else {
        $hasil_1 = ubahDataPribadi1($id_dapri, $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $usia, $email, $no_hp, $alamat, $agama);
      }
    }
  
    // Logika untuk tabel data pegawai
    if (empty($lokasi_sk)) {
      // Jika SK tidak diunggah, panggil fungsi tanpa mengubah SK
      $hasil_2 = ubahDataPegawai($nip, $id_dapri, $id_bidang, $id_golongan, $status, $npwp, $tmt_gol, $jab, $tmt_jab, $mkt, $mkb);
    } else {
      if ($ukuran_sk > 15000000) { // 15 MB dalam bytes
        echo "<script> alert('Ukuran file SK lebih dari 15 MB, data tidak dapat ditambahkan.'); window.history.back();</script>";
        exit();
      } else if ($ukuran_sk < 15000000) {
        $allowed_extensions = array('pdf');
        $file_extension = pathinfo($sk, PATHINFO_EXTENSION);
  
        if (!in_array(strtolower($file_extension), $allowed_extensions)) {
          echo "<script> alert('Format file tidak valid. Hanya file PDF yang diizinkan.'); window.history.back();</script>";
          exit();
        } else {
          move_uploaded_file($lokasi_sk, '../../Penyimpanan/sk/' . $sk);
          // Tambahkan data pegawai ke database dengan nama file yang baru
          $hasil_2 = ubahDataPegawai1($nip, $id_dapri, $id_bidang, $id_golongan, $status, $npwp, $tmt_gol, $jab, $tmt_jab, $sk, $mkt, $mkb);
          $hasil_3 = tambahMutasi($nip, $cttn_mutasi1, $sk);
        }
      } else {
        $hasil_2 = ubahDataPegawai($nip, $id_dapri, $id_bidang, $id_golongan, $status, $npwp, $tmt_gol, $jab, $tmt_jab, $mkt, $mkb);
      }
    }
  
    // Logika untuk tabel data pendidikan
    if (empty($lokasi_ijazah)) {
      // Jika ijazah tidak diunggah, panggil fungsi tanpa mengubah ijazah
      $hasil_4 = ubahDataRiwayatPendidikan1($nopnd, $strata, $jurusan, $konsentrasi, $nama_sklh, $thn_lulus);
    } else {
      if ($ukuran_ijazah > 15000000) { // 15 MB dalam bytes
        echo "<script> alert('Ukuran file ijazah lebih dari 15 MB, data tidak dapat ditambahkan.'); window.history.back();</script>";
        exit();
      } else if ($ukuran_ijazah < 15000000) {
        $allowed_extensions = array('pdf');
        $file_extension = pathinfo($ijazah, PATHINFO_EXTENSION);
  
        if (!in_array(strtolower($file_extension), $allowed_extensions)) {
          echo "<script> alert('Format file tidak valid. Hanya file PDF yang diizinkan.'); window.history.back();</script>";
          exit();
        } else {
          move_uploaded_file($lokasi_ijazah, '../../Penyimpanan/ijazah/' . $ijazah);
          // Tambahkan data pendidikan ke database dengan nama file yang baru
          $hasil_4 = ubahDataRiwayatPendidikan($nopnd, $strata, $jurusan, $konsentrasi, $nama_sklh, $thn_lulus, $ijazah);
        }
      } else {
        $hasil_4 = ubahDataRiwayatPendidikan1($nopnd, $strata, $jurusan, $konsentrasi, $nama_sklh, $thn_lulus);
      }
    }
  
    if ($hasil_1 && $hasil_2 && $hasil_3 && $hasil_4) {
      echo "<script> alert('Edit Data Berhasil'); window.location='detail_datapegawai.php?nip=" . $nip . "';</script>";
    } else {
      echo "<script> alert('Edit Data Gagal'); window.history.back();</script>";
    }
  }
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
                JOIN data_bidang ON pegawai.id_bidang = data_bidang.id_bidang JOIN golongan ON pegawai.id_golongan = golongan.id_golongan WHERE pegawai.nip ='$nip'");

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
          $id_golongan = $row_edit['id_golongan'];
          $tmt_gol = $row_edit['tmt_golongan'];
          $jab = $row_edit['jabatan'];
          $id_bidang = $row_edit['id_bidang'];
          $tmt_jab = $row_edit['tmt_jabatan'];
          $sk = $row_edit['sk_jabatan'];
          $mkt = $row_edit['masa_kerja_tahun'];
          $mkb = $row_edit['masa_kerja_bulan'];
         


          ?>
          <form role="form" action="editdatapegawai.php" method="POST" enctype="multipart/form-data">

            <div class="p-2">
              <!-- <input type="hidden"> -->
              <div class="row mb-3">
                <input type="hidden" class="form-control" value="<?php echo $id_dapri ?>" name="id_data_pribadi">
                <label for="#" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" value="<?php echo $nama ?>" name="nama" required="required" placeholder="Masukan Nama Lengkap">
                </div>
              </div>
              <div class="row mb-3">
                <label for="#" class="col-sm-2 col-form-label">NIP</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" value="<?php echo $nip ?>" name="nip" required="required" placeholder="Masukkan NIP">
                </div>
              </div>
              <div class="row mb-3">
                <label for="#" class="col-sm-2 col-form-label">Tempat Lahir</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" value="<?php echo $tempat_lahir ?>" name="tempat_lahir" required="required" placeholder="Masukkan Tempat Lahir">
                </div>
              </div>
              <div class="row mb-3">
                <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-9">
                  <input type="date" class="form-control" value="<?php echo $tanggal_lahir ?>" name="tanggal_lahir" id="tanggal_lahir" oninput="hitungUsia()" required="required" placeholder="Masukkan Tanggal Lahir">
                </div>
              </div>

              <div class="row mb-3">
                <label for="usia" class="col-sm-2 col-form-label">Usia</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" value="<?php echo $usia ?>" name="usia" id="input_usia" required="required" readonly>
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
                    <option selected><?php echo $agama ?></option>
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
                <label for="#" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" value="<?php echo $alamat ?>" name="alamat" required="required" placeholder="Masukkan Alamat">
                </div>
              </div>

              <div class="row mb-3">
                <label for="#" class="col-sm-2 col-form-label">Nomor HP</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" value="<?php echo $no_hp ?>" name="no_hp" required="required" placeholder="Masukkan Nomor HP">
                </div>
              </div>

              <div class="row mb-3">
                <label for="#" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-9">
                  <input type="email" class="form-control" value="<?php echo $email ?>" name="email" required="required" placeholder="Masukkan Email">
                </div>
              </div>

              <div class="row mb-3">
                <label for="#" class="col-sm-2 col-form-label">Nomor NPWP</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" value="<?php echo $npwp ?>" name="npwp" required="required" placeholder="Masukkan NPWP">
                </div>
              </div>

              <div class="row mb-3">
                <label for="#" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-9">
                  <select class="form-select" aria-label="Default select example" name="status">
                    <option selected><?php echo $status ?></option>
                    <option value="Pegawai Aktif">Aktif</option>
                    <option value="Pensiun">Pensiun</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="d-flex flex-column mb-3">
              <div class="p-2 fw-bold fs-5">Pangkat</div>
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
                    <select class="form-select" name="id_golongan" aria-label="Default select example">
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
                  <label for="#" class="col-sm-2 col-form-label">TMT</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" value="<?php echo $tmt_gol ?>" name="tmt_golongan" required="required">
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
                    <input type="text" class="form-control" value="<?php echo $jab ?>" name="jabatan" required="required" placeholder="Masukkan Nama Jabatan">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="#" class="col-sm-2 col-form-label">Penempatan</label>
                  <div class="col-sm-9">
                    <select class="form-select" name="id_bidang" id="id_bidang" aria-label="Default select example">
                      <?php
                      $result3 = mysqli_query($koneksi, "SELECT * FROM data_bidang");
                      while ($data = mysqli_fetch_array($result3)) {
                        $selected = ($data['nama_bidang'] == $nama_bidang) ? 'selected' : '';
                      ?>
                        <option value="<?= $data['id_bidang']; ?>" <?= $selected; ?>><?php echo $data['nama_bidang']; ?></option>
                      <?php
                      }
                      ?>
                    </select>

                    <!-- Input text to display the selected 'nama_bidang' -->
                    <input type="hidden" name="penempatan" id="nama_bidang_text" value="<?php echo isset($nama_bidang) ? $nama_bidang : ''; ?>" readonly>
                  </div>
                </div>



                <div class="row mb-3">
                  <label for="#" class="col-sm-2 col-form-label">TMT</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" value="<?php echo $tmt_jab ?>" name="tmt_jabatan" required="required">
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
                      <input type="text" class="form-control" value="<?php echo $mkt ?>" name="masa_kerja_tahun" placeholder="Masukkan Tahun">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="#" class="col-sm-2 col-form-label">Bulan</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" value="<?php echo $mkb ?>" name="masa_kerja_bulan" placeholder="Masukkan Bulan">
                    </div>
                  </div>
                </div>
              </div>

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
                      <td><?php echo $n['dokumen_diklat']; ?></td>
                      <td>
                        <a href="../kepegawaian/edit_datadiklat.php?nip=<?php echo $nip; ?>&id_diklat=<?php echo $n['id_diklat']; ?>" class="btn btn-primary btn-sm bi bi-pencil-square" data-toggle="tooltip" data-placement="top" title="Edit"></a>
                        <a href="hapus.php?id_diklat=<?php echo $n['id_diklat']; ?>" class="btn btn-danger btn-sm bi bi-trash3-fill" onClick="window.location.reload()" data-toggle="tooltip" data-placement="top" title="Hapus"></a>
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
                      <input type="text" class="form-control" value="<?php echo $nama_sklh ?>" name="nama_kampus">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="#" class="col-sm-2 col-form-label">Jurusan</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" value="<?php echo $jur_sma ?>" name="jurusan" placeholder="">
                    </div>
                  </div>
                  <input type="hidden" class="form-control" value="-" name="konsentrasi" placeholder="">
                  <div class="row mb-3">
                    <label for="#" class="col-sm-2 col-form-label">Tahun Lulus</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" value="<?php echo $tahun_lulus_sma ?>" name="tahun_lulus" placeholder="">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="#" class="col-sm-2 col-form-label">Ijazah</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" value="<?php echo $ijazah ?>">
                    </div>
                  </div>
                  <div class="row mb-3">
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
                        <a href="../kepegawaian/hapus.php?no_pnd=<?php echo $p['no_pnd'] ?>" class="btn btn-danger btn-sm bi bi-trash3-fill" onClick="window.location.reload()" data-toggle="tooltip" data-placement="top" title="Hapus"></a>
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
                    <th>Dokumen</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  while ($l = mysqli_fetch_array($query3)) { ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $l['catatan_mutasi']; ?></td>
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
                        <a href="hapus.php?no_mtsi=<?php echo $l['no_mtsi']; ?>" class="btn btn-danger btn-sm bi bi-trash3-fill" onClick="window.location.reload()" data-toggle="tooltip" data-placement="top" title="Hapus"></a>
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
              </div>
            </div>

            <div class="row mb-3 p-4">
              <label for="#" class="col-sm-2 col-form-label">Upload Pas Foto*</label>
              <div class="col-sm-9">
                <input type="file" class="form-control" accept=".jpg,.png" name="foto">
                <div class="form-text" id="basic-addon4">Jenis file PDF maksimal 15 MB*.
                </div>
              </div>
            </div>


            <div class="d-flex justify-content-center m-4">
              <button type="reset" class="btn btn-md btn-danger m-1">Reset</button>
              <button type="submit" name="simpan_edp" class="btn btn-md btn-success m-1">Simpan</button>

            </div>
          </form>


        </div>
      </div>
    </div>
  </div>
</div>

<?php include '../sections/footer.php'; ?>

<!-- <script>
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
</script> -->

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