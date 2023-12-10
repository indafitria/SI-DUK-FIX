<?php include '../sections/header.php'; ?>
<?php include '../../config/koneksi.php'; ?>
<?php include '../../function/fungsi.php'; ?>

<?php



//jika tidak ada login sebelumnya maka diarahkan ke login.php
if (empty($_SESSION['username']) and empty($_SESSION['pass'])) {
  echo "<script> window.location = '../../index.php' </script>";
};


$_SESSION['level'] = $level;
?>

<div class="container">
  <div class="d-flex justify-content-center">
    <div class="flex-grow-1 pe-3">
      <div class="col-md-12 mt-5">
        <div class="card">
          <div class="card-header">
            <h4>Detail Pegawai</h4>
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
            if ($row_edit['agama'] == 'Islam') {
              $agama = 'Islam';
            } else if ($row_edit['agama'] == 'Kristen-Katholik') {
              $agama = 'Katholik';
            } else if ($row_edit['agama'] == 'Kristen-Protestan') {
              $agama = 'Kristen';
            } else if ($row_edit['agama'] == 'Buddha') {
              $agama = 'Buddha';
            } else if ($row_edit['agama'] == 'Khonghucu') {
              $agama = 'Khonghucu';
            } else if ($row_edit['agama'] == 'Hindu') {
              $agama1 = 'Hindu';
            }
            $alamat = $row_edit['alamat'];
            $no_hp = $row_edit['no_hp'];
            $email = $row_edit['email'];
            $npwp = $row_edit['npwp'];
            $foto = $row_edit['foto'];
            $status = $row_edit['status'];
            if($status == 'Pegawai_Aktif'){
              $status1 = 'Aktif';   
            }if($status == 'Mutasi'){
              $status1 = 'Mutasi';   
            }if($status == 'Pensiun'){
              $status1 = 'Pensiun';   
            }
              
           

          
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
              <fieldset disabled>
                <div class="p-2">
                  <!-- <input type="hidden"> -->
                  <div class="row mb-3">
                    <input type="hidden" class="form-control" value="<?php echo $id_dapri ?>" name="id_data_pribadi">
                    <label for="#" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-9">
                      <input type="text" autocomplete="off" class="form-control" value="<?php echo $nama ?>" name="nama">
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
                      <input type="text" autocomplete="off" class="form-control" value="<?php echo $tempat_lahir ?>" name="tempat_lahir">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-9">
                      <input type="date" autocomplete="off" class="form-control" value="<?php echo $tanggal_lahir ?>" name="tanggal_lahir" id="tanggal_lahir" oninput="hitungUsia()" required="required" oninput="this.reportValidity()">
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
                      <input type="text" autocomplete="off" class="form-control" value="<?php echo $jenis_kelamin ?>" name="jenis_kelamin">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="#" class="col-sm-2 col-form-label">Agama</label>
                    <div class="col-sm-9">
                      <input type="text" autocomplete="off" class="form-control" value="<?php echo $agama ?>" name="agama">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="#" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-9">
                      <input type="text" autocomplete="off" class="form-control" value="<?php echo $alamat ?>" name="alamat">
                    </div>
                  </div>


                  <div class="row mb-3">
                    <label for="#" class="col-sm-2 col-form-label">Nomor HP</label>
                    <div class="col-sm-9">
                      <input type="text" autocomplete="off" class="form-control" value="<?php echo $no_hp ?>" name="no_hp">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="#" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-9">
                      <input type="email" autocomplete="off" class="form-control" value="<?php echo $email ?>" name="email">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="#" class="col-sm-2 col-form-label">Nomor NPWP</label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" value="<?php echo $npwp ?>" name="npwp">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="#" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-9">
                    <input type="text" autocomplete="off" class="form-control" value="<?php echo $status1 ?>" name="status">

                    </div>
                  </div>
                </div>

                <div class="d-flex flex-column mb-3">
                  <div class="p-2 fw-bold fs-5">Pangkat/Golongan</div>
                  <div class="p-2">
                    <div class="row mb-3">
                      <label for="#" class="col-sm-2 col-form-label">Golongan</label>


                      <div class="col-sm-9">
                        <!-- Input text to display the selected 'nama_bidang' -->
                        <input type="text" autocomplete="off" class="form-control" value="<?php echo $row_edit['nama_golongan']; ?>" id="nama_golongan_text" readonly>

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
                    </div>
                  </div>

                  <div class="d-flex flex-column mb-3">
                    <div class="p-2 fw-bold fs-5">Jabatan</div>
                    <div class="p-2">
                      <div class="row mb-3">
                        <label for="#" class="col-sm-2 col-form-label">Nama Jabatan</label>
                        <div class="col-sm-9">
                          <input type="text" autocomplete="off" class="form-control" value="<?php echo $jab ?>" name="jabatan">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="#" class="col-sm-2 col-form-label">Penempatan</label>
                        <div class="col-sm-9">

                          <input type="text" class="form-control" autocomplete="off" value="<?php echo $row_edit['nama_bidang']; ?>" name="penempatan" readonly>
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
                      </div>
                    </div>

                    <div class="d-flex flex-column mb-3">
                      <div class="p-2 fw-bold fs-5">Masa Kerja</div>
                      <div class="p-2">
                        <div class="row mb-3">
                          <label for="#" class="col-sm-2 col-form-label">Tahun</label>
                          <div class="col-sm-9">
                            <input type="text" autocomplete="off" class="form-control" value="<?php echo $mkt ?>" name="masa_kerja_tahun">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label for="#" class="col-sm-2 col-form-label">Bulan</label>
                          <div class="col-sm-9">
                            <input type="text" autocomplete="off" class="form-control" value="<?php echo $mkb ?>" name="masa_kerja_bulan">
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="p-2 fw-bold fs-5">Riwayat SK
                    </div>
                    <?php
                    $tampil_sk = mysqli_query($koneksi, "SELECT *
                      FROM riwayat_pangkat
                      WHERE NIP = '$nip' AND tmt_sk < (SELECT MAX(tmt_sk) FROM riwayat_pangkat)
                      ORDER BY tmt_sk ASC");
                    // $cek1 = mysqli_fetch_array($tampil_sk);
                    ?>

                    <table class="table table-bordered text-center">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Jenis SK</th>
                          <th>Nomor SK</th>
                          <th>TMT</th>
                          <th>Dokumen</th>
                        </tr>
                      </thead>
                      <?php if (empty($tampil_sk)) { ?>
                        <tbody>

                          <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                          </tr>
                        </tbody>
                    </table>

                  <?php } else { ?>


                    <tbody>
                      <?php
                        $nom = 1;
                        while ($n = mysqli_fetch_array($tampil_sk)) { ?>
                        <tr>
                          <td><?php echo $nom++ ?></td>
                          <td><?php echo $n['jenis_sk']; ?></td>
                          <td><?php echo $n['nomor_sk']; ?></td>
                          <td><?php echo $n['tmt_sk']; ?></td>
                          <td><a href='../../Penyimpanan/sk/<?php echo $n['dokumen_sk']; ?>' target='_blank'><?php echo $n['dokumen_sk']; ?></a></td>


                        </tr>
                      <?php } ?>
                    </tbody>
                    </table>
                  <?php } ?>
                  <div class="p-2 fw-bold fs-5">Riwayat Diklat
                  </div>

                  <?php
                  $query = mysqli_query($koneksi, "SELECT * FROM riwayat_diklat JOIN pegawai ON riwayat_diklat.nip = pegawai.nip
                              WHERE riwayat_diklat.nip = '$nip'");
                  $cek_query = mysqli_num_rows($query);

                  ?>

                    <table class="table table-bordered text-center">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th style="width: 110px">Jenis Diklat</th>
                          <th style="width: 120px">Nama Diklat</th>
                          <th style="width: 150px">Bulan / Tahun</th>
                          <th style="width: 110px">Jumlah Jam</th>
                          <th>Dokumen</th>

                        </tr>
                      </thead>
                      <tbody>
                      <?php if($cek_query === 0){?>
                      <tr>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>

                        </tr>
                        <?php } else {
                        $no = 1;
                        while ($n = mysqli_fetch_array($query)) { ?>
                          <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $n['jenis_diklat']; ?></td>
                            <td><?php echo $n['nama_diklat']; ?></td>
                            <td><?php echo $n['tahun_diklat']; ?></td>
                            <td><?php echo $n['jmlh_jam']; ?></td>
                            <td><a href='../../Penyimpanan/sk/<?php echo $n['dokumen_diklat']; ?>' target='_blank'><?php echo $n['dokumen_diklat']; ?></a></td>

                          </tr>
                        <?php } 
                      } ?>
                  
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
                          <input type="text" autocomplete="off" class="form-control" value="<?php echo $nama_sklh ?>" name="nama_kampus">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="#" class="col-sm-2 col-form-label">Jurusan</label>
                        <div class="col-sm-9">
                          <input type="text" autocomplete="off" class="form-control" value="<?php echo $jur_sma ?>" name="jurusan">
                        </div>
                      </div>
                      <input type="hidden" class="form-control" value="-" name="konsentrasi">
                      <div class="row mb-3">
                        <label for="#" class="col-sm-2 col-form-label">Tahun Lulus</label>
                        <div class="col-sm-9">
                          <input type="text" autocomplete="off" class="form-control" value="<?php echo $tahun_lulus_sma ?>" name="tahun_lulus">
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

                      </div>
                    </div>
                  </div>

                  <div class="p-2 pb-2 fw-bold fs-5">Pendidikan Tinggi
                  </div>
                  <?php
                  $query2 = mysqli_query($koneksi, "SELECT *
                                          FROM riwayat_pendidikan
                                          JOIN pegawai ON riwayat_pendidikan.nip = pegawai.nip
                                          WHERE riwayat_pendidikan.nip = '$nip'
                                          AND (riwayat_pendidikan.strata = 'S1' OR riwayat_pendidikan.strata = 'S2' OR riwayat_pendidikan.strata = 'S3');
                                          "); 
                  $cek_query2 = mysqli_num_rows($query2);?>
                  <table class="table table-bordered text-center">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Strata</th>
                        <th>Jurusan</th>
                        <th>Konsentrasi</th>
                        <th>Alumni</th>
                        <th style="width: 110px">Tahun Lulus</th>
                        <th>Dokumen</th>

                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <?php if ($cek_query2 === 0) { ?>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <?php } else {

                          $no = 1;
                          while ($p = mysqli_fetch_array($query2)) { ?>

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

                        <?php }
                        } ?>
                      </tr>
                    </tbody>
                  </table>
                        

                  <div class="p-2 pb-2 fw-bold fs-5 mt-5">Catatan Mutasi Kepegawaian
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

                        </tr>
                      <?php } ?>
                    </tbody>


                  </table>
                  </div>
              </fieldset>

              <?php if ($level == 1 || $level == 2) { ?>
              <div class="card-body row m-1 justify-content-center">


                <div class="d-flex flex-column document-box m-3">
                  <h2 class="document-title p-2 bd-highlight">
                    Dokumen Ujian Dinas
                  </h2>
                  <div class="text-center"><a href="../kepegawaian/report_biodata.php?nip=<?php echo $nip; ?>" class="btn btn-lihatdok btn-sm btn-primary">Lihat
                      Dokumen</a></div>
                </div>
                <div class="d-flex flex-column document-box m-3">
                  <h2 class="document-title p-2 bd-highlight">
                    Dokumen Diklat
                  </h2>
                  <div class="text-center"><a href="../kepegawaian/report_biodata_diklat.php?nip=<?php echo $nip; ?>" class="btn btn-lihatdok btn-sm btn-primary">Lihat
                      Dokumen</a></div>
                </div>
              </div>
              <?php } ?>
              <div class="d-flex justify-content-center m-4">
                <a href="../kepegawaian/data_pegawai.php" class="btn btn-md btn-primary m-1">Kembali</a>

                <?php if ($level == 1 || $level == 2) { ?>
                  <a href="../kepegawaian/editdatapegawai.php?nip=<?php echo $nip; ?>" class="btn btn-md btn-warning m-1">Edit</a>
                <?php } ?>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <?php
    $sql4 = mysqli_query($koneksi, "SELECT * FROM pegawai JOIN data_pribadi ON pegawai.id_data_pribadi = data_pribadi.id_data_pribadi WHERE pegawai.nip = '$nip'");
    ?>
    <div class="col-md-3 mt-5 ps-3">
      <div class="card card-pegawai">
        <div class="card-header">
          <h4>Foto Pegawai</h4>
        </div>
        <?php
        $foto = mysqli_fetch_array($sql4);
        if (empty($foto['foto']) || !file_exists("../../Penyimpanan/foto/" . $foto['foto'])) {
        ?>
          <img src="../../assets/img/user.jpeg" alt="Foto Pegawai">
        <?php } else { ?>
          <img src="../../Penyimpanan/foto/<?php echo $foto['foto']; ?>" alt="Foto Pegawai" class="pegawai-foto">
        <?php } ?>
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