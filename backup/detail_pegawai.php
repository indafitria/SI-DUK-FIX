<?php include '../sections/header.php';
include('../../config/koneksi.php'); ?>


<div class="container container-detail">
    <div class="d-flex justify-content-center">
        <div class="p-2 flex-grow-1">
            <div class="card card-detail">
                <?php
                $nip = $_GET['nip'];
                $sql = mysqli_query($koneksi, "SELECT * FROM pegawai JOIN data_pribadi ON pegawai.id_data_pribadi = data_pribadi.id_data_pribadi
                JOIN golongan ON pegawai.id_golongan = golongan.id_golongan
                JOIN data_bidang ON pegawai.id_bidang = data_bidang.id_bidang WHERE pegawai.nip = '$nip' ");
                ?>
                <h4 class="card-title card-header">Detail Data</h4>
                <div class="card-body row m-1">
                    <div class="text-detail col ms-4">
                        <p class="card-text">Nama</p>
                        <p class="card-text">NIP</p>
                        <p class="card-text">Tempat Lahir</p>
                        <p class="card-text">Tanggal Lahir</p>
                        <p class="card-text">Usia</p>
                        <p class="card-text">Jenis Kelamin</p>
                        <p class="card-text">Agama</p>
                        <p class="card-text">Alamat</p>
                        <p class="card-text">No HP</p>
                        <p class="card-text">Email</p>
                        <p class="card-text">No NPWP</p>
                        <p class="card-text">Status</p>
                    </div>

                    <div class="text-detail col-1 ms-4">
                        <p class="card-text">:</p>
                        <p class="card-text">:</p>
                        <p class="card-text">:</p>
                        <p class="card-text">:</p>
                        <p class="card-text">:</p>
                        <p class="card-text">:</p>
                        <p class="card-text">:</p>
                        <p class="card-text">:</p>
                        <p class="card-text">:</p>
                        <p class="card-text">:</p>
                        <p class="card-text">:</p>
                        <p class="card-text">:</p>
                    </div>
                    <?php
                    while ($r = mysqli_fetch_array($sql)) {
                    ?>
                        <div class="text-detail col-6 ms-4">
                            <p class="card-text"><?php echo $r['nama']; ?></p>
                            <p class="card-text"><?php echo $r['nip']; ?></p>
                            <p class="card-text"><?php echo $r['tempat_lahir']; ?></p>
                            <p class="card-text"><?php echo $r['tanggal_lahir']; ?></p>
                            <p class="card-text"><?php echo $r['usia']; ?></p>
                            <p class="card-text"><?php echo $r['jenis_kelamin']; ?></p>
                            <p class="card-text"><?php echo $r['agama']; ?></p>
                            <p class="card-text"><?php echo $r['alamat']; ?></p>
                            <p class="card-text"><?php echo $r['no_hp']; ?></p>
                            <p class="card-text"><?php echo $r['email']; ?></p>
                            <p class="card-text"><?php echo $r['npwp']; ?></p>
                            <p class="card-text"><?php echo $r['status']; ?></p>
                        </div>

                </div>
                <hr class="card-divider">
                </hr>

                <div class="card-body row m-1">
                    <p class="card-text text-jenis">Pangkat :</p>
                    <div class="text-detail col ms-4">
                        <p class="card-text">Golongan</p>
                        <p class="card-text">TMT</p>
                    </div>
                    <div class="text-detail col-1 ms-4">
                        <p class="card-text">:</p>
                        <p class="card-text">:</p>
                    </div>
                    <div class="text-detail col-6 ms-4">
                        <p class="card-text"><?php echo $r['nama_golongan']; ?></p>
                        <p class="card-text"><?php echo $r['tmt_golongan']; ?></p>
                    </div>
                </div>
                <hr class="card-divider">
                </hr>

                <div class="card-body m-1">
                    <div class="row">
                        <p class="card-text text-jenis">Jabatan :</p>
                        <div class="text-detail col ms-4">
                            <p class="card-text">Nama Jabatan</p>
                            <p class="card-text">Penempatan</p>
                            <p class="card-text">TMT</p>
                        </div>
                        <div class="text-detail col-1 ms-4">
                            <p class="card-text">:</p>
                            <p class="card-text">:</p>
                            <p class="card-text">:</p>
                        </div>
                        <div class="text-detail col-6 ms-4">
                            <p class="card-text"><?php echo $r['jabatan']; ?></p>
                            <p class="card-text"><?php echo $r['nama_bidang']; ?></p>
                            <p class="card-text"><?php echo $r['tmt_jabatan']; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="d-flex flex-column document-box m-3">
                            <h2 class="document-title p-2 bd-highlight">
                                <i class="fa-solid fa-file-pdf fa-2xl pe-2" style="color: #ff0000;"></i>SK Jabatan
                            </h2>
                            <div class="text-center"><a href="../../Penyimpanan/sk/<?php echo $r['sk_jabatan'] ?>" class="btn btn-lihatdok btn-sm btn-primary">Lihat
                                    Dokumen</a></div>
                        </div>
                    </div>

                </div>
                <hr class="card-divider">
                </hr>
                <div class="card-body row m-1">
                    <p class="card-text text-jenis">Masa Kerja :</p>
                    <div class="text-detail col ms-4">
                        <p class="card-text">Tahun</p>
                        <p class="card-text">Bulan</p>
                    </div>
                    <div class="text-detail col-1 ms-4">
                        <p class="card-text">:</p>
                        <p class="card-text">:</p>
                    </div>
                    <div class="text-detail col-6 ms-4">
                        <p class="card-text"><?php echo $r['masa_kerja_tahun']; ?> Tahun</p>
                        <p class="card-text"><?php echo $r['masa_kerja_bulan']; ?> Bulan</p>
                    </div>
                </div>
                
<?php } ?>
                <hr class="card-divider">
                </hr>
                <?php
                        $sql1 = mysqli_query($koneksi, "SELECT * FROM riwayat_diklat JOIN pegawai ON riwayat_diklat.nip = pegawai.nip WHERE riwayat_diklat.nip = '$nip' AND jenis_diklat = 'teknis'") ?>
                <div class="card-body m-1">
                    <div class="row">
                        <p class="card-text text-jenis">Diklat Teknis :</p>
                        <div class="text-detail col ms-4">
                            <p class="card-text">Nama</p>
                            <p class="card-text">Bulan/Tahun</p>
                            <p class="card-text">Jumlah Jam</p>
                        </div>
                        <div class="text-detail col-1 ms-4">
                            <p class="card-text">:</p>
                            <p class="card-text">:</p>
                            <p class="card-text">:</p>
                        </div>
                        <?php while ($s = mysqli_fetch_array($sql1)) { ?>
                            <div class="text-detail col-6  ms-4">
                                <p class="card-text"><?php echo $s['nama_diklat']; ?></p>
                                <p class="card-text"><?php echo $s['tahun_diklat']; ?></p>
                                <p class="card-text"><?php echo $s['jmlh_jam'] ?></p>
                            </div>
                            <div class="row">
                                <div class="d-flex flex-column document-box m-3">
                                    <h2 class="document-title p-2 bd-highlight">
                                        <i class="fa-solid fa-file-pdf fa-2xl pe-2" style="color: #ff0000;"></i>Dokumen
                                        Diklat
                                    </h2>
                                    <div class="text-center"><a href="../../Penyimpanan/sertifikat/<?php echo $s['dokumen_diklat'] ?>" class="btn btn-lihatdok btn-sm btn-primary">Lihat
                                            Dokumen</a></div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
                <hr class="card-divider">
                </hr>
                <?php
                        $sql2 = mysqli_query($koneksi, "SELECT * FROM riwayat_diklat JOIN pegawai ON riwayat_diklat.nip = pegawai.nip WHERE riwayat_diklat.nip = '$nip' AND jenis_diklat = 'jabatan'") ?>

                <div class="card-body m-1">
                    <div class="row">
                        <p class="card-text text-jenis">Diklat Jabatan :</p>
                        <div class="text-detail col ms-4">
                            <p class="card-text">Nama</p>
                            <p class="card-text">Bulan/Tahun</p>
                            <p class="card-text">Jumlah Jam</p>
                        </div>
                        <div class="text-detail col-1 ms-4">
                            <p class="card-text">:</p>
                            <p class="card-text">:</p>
                            <p class="card-text">:</p>
                        </div>
                        <?php while ($s = mysqli_fetch_array($sql1)) { ?>
                            <div class="text-detail col-6  ms-4">
                                <p class="card-text"><?php echo $s['nama_diklat']; ?></p>
                                <p class="card-text"><?php echo $s['tahun_diklat']; ?></p>
                                <p class="card-text"><?php echo $s['jmlh_jam'] ?></p>
                            </div>
                            <div class="row">
                                <div class="d-flex flex-column document-box m-3">
                                    <h2 class="document-title p-2 bd-highlight">
                                        <i class="fa-solid fa-file-pdf fa-2xl pe-2" style="color: #ff0000;"></i>Dokumen
                                        Diklat
                                    </h2>
                                    <div class="text-center"><a href="../../Penyimpanan/sertifikat/<?php echo $s['dokumen_diklat'] ?>" class="btn btn-lihatdok btn-sm btn-primary">Lihat
                                            Dokumen</a></div>
                                </div>
                            </div>
                        <?php } ?>


                    </div>
                </div>
                <hr class="card-divider">
                </hr>
                <?php ?>
                <div class="card-body m-1">
                    <div class="row">
                        <?php $sql3 = mysqli_query($koneksi, "SELECT *
                                        FROM riwayat_pendidikan
                                        JOIN pegawai ON riwayat_pendidikan.nip = pegawai.nip
                                        WHERE riwayat_pendidikan.nip = '$nip'
                                        AND (riwayat_pendidikan.strata = 'SMA' OR riwayat_pendidikan.strata = 'SMK');
                                        "); ?>
                        <p class="card-text text-jenis">Pendidikan :</p>
                        <p class="card-text text-jenis ms-3">Pendidikan Menengah :</p>
                        <div class="text-detail col ms-5">
                            <p class="card-text">Nama Sekolah</p>
                            <p class="card-text">Jurusan</p>
                            <p class="card-text">Tahun Lulus</p>
                        </div>
                        <div class="text-detail col-1 ms-5">
                            <p class="card-text">:</p>
                            <p class="card-text">:</p>
                            <p class="card-text">:</p>
                        </div>
                        <?php while ($a = mysqli_fetch_array($sql3)) { ?>
                            <div class="text-detail col-6 ms-5">
                                <p class="card-text"><?php echo $a['nama_kampus']; ?> </p>
                                <p class="card-text"><?php echo $a['jurusan']; ?> </p>
                                <p class="card-text"><?php echo $a['tahun_lulus']; ?> </p>
                            </div>

                            <div class="row">
                                <div class="d-flex flex-column document-box m-3">
                                    <h2 class="document-title p-2 bd-highlight">
                                        <i class="fa-solid fa-file-pdf fa-2xl pe-2" style="color: #ff0000;"></i>Ijazah
                                    </h2>
                                    <div class="text-center"><a href="../../Penyimpanan/ijazah/<?php echo $a['ijazah']; ?>" class="btn btn-lihatdok btn-sm btn-primary">Lihat
                                            Dokumen</a></div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                    <div class="row">
                        <?php
                        $t = mysqli_query($koneksi, "SELECT *
                    FROM riwayat_pendidikan
                    JOIN pegawai ON riwayat_pendidikan.nip = pegawai.nip
                    WHERE riwayat_pendidikan.nip = '$nip'
                    AND (riwayat_pendidikan.strata = 'S1' OR riwayat_pendidikan.strata = 'S2' OR riwayat_pendidikan.strata = 'S3');
                    "); ?>
                        <p class="card-text text-jenis ms-3">Perguruan Tinggi :</p>
                        <div class="text-detail col ms-5">
                            <p class="card-text">Strata</p>
                            <p class="card-text">Jurusan</p>
                            <p class="card-text">Konsentrasi</p>
                            <p class="card-text">Alumni</p>
                            <p class="card-text">Tahun Lulus</p>
                        </div>
                        <div class="text-detail col-1 ms-5">
                            <p class="card-text">:</p>
                            <p class="card-text">:</p>
                            <p class="card-text">:</p>
                            <p class="card-text">:</p>
                            <p class="card-text">:</p>
                        </div>
                        <?php while ($m = mysqli_fetch_array($t)) { ?>
                            <div class="text-detail col-6 ms-5">
                                <p class="card-text"><?php echo $m['strata']; ?></p>
                                <p class="card-text"><?php echo $m['jurusan']; ?></p>
                                <p class="card-text"><?php echo $m['konsentrasi']; ?></p>
                                <p class="card-text"><?php echo $m['nama_kampus']; ?></p>
                                <p class="card-text"></p>
                            </div>

                    </div>
                    <div class="row">
                        <div class="d-flex flex-column document-box m-3">
                            <h2 class="document-title p-2 bd-highlight">
                                <i class="fa-solid fa-file-pdf fa-2xl pe-2" style="color: #ff0000;"></i>Dokumen Diklat
                            </h2>
                            <div class="text-center"><a href="#" class="btn btn-lihatdok btn-sm btn-primary">Lihat
                                    Dokumen</a></div>
                        </div>
                    </div>


                </div>
            <?php } ?>
            <hr class="card-divider">
            </hr>
            <?php
            $mts = mysqli_query($koneksi,"SELECT * FROM riwayat_mutasi JOIN pegawai ON riwayat_mutasi.nip = pegawai.nip WHERE riwayat_mutasi.nip = '$nip'");
            ?>
            <div class="card-body row m-1">
                <div class="text-detail col ms-4">
                    <p class="card-text">Catatan Mutasi</p>
                </div>
                <div class="text-detail col-1 ms-4">
                    <p class="card-text">:</p>
                </div>
                <?php while($y = mysqli_fetch_array($mts)){?>
                <div class="text-detail col-6 ms-4">
                    <p class="card-text"><?php echo $y['catatan_mutasi']?></p>
                </div>

                <div class="row">
                    <div class="d-flex flex-column document-box m-3">
                        <h2 class="document-title p-2 bd-highlight">
                            <i class="fa-solid fa-file-pdf fa-2xl pe-2" style="color: #ff0000;"></i>Dokumen Diklat
                        </h2>
                        <div class="text-center"><a href="../../Penyimpanan/sk/<?php echo $y['dokumen_mutasi']; ?>" class="btn btn-lihatdok btn-sm btn-primary">Lihat
                                            Dokumen</a></div>
                    </div>

                    <!-- <div class="d-flex flex-column document-box m-3">
                        <h2 class="document-title p-2 bd-highlight">
                            <i class="fa-solid fa-file-pdf fa-2xl pe-2" style="color: #ff0000;"></i>Dokumen Diklat
                        </h2>
                        <div class="text-center"><a href="#" class="btn btn-lihatdok btn-sm btn-primary">Lihat
                                Dokumen</a></div>
                    </div> -->
                </div>

            </div>
            <?php } ?>
            <hr class="card-divider">
            </hr>

            <div class="card-body row m-1">

                <div class="d-flex flex-column document-box m-3">
                    <h2 class="document-title p-2 bd-highlight">
                        <i class="fa-solid fa-file-word fa-2xl pe-2" style="color: #0158ef;"></i>Dokumen Diklat
                    </h2>
                    <div class="text-center"><a href="#" class="btn btn-lihatdok btn-sm btn-primary">Lihat
                            Dokumen</a></div>
                </div>
                <div class="d-flex flex-column document-box m-3">
                    <h2 class="document-title p-2 bd-highlight">
                        <i class="fa-solid fa-file-word fa-2xl pe-2" style="color: #0158ef;"></i>Dokumen Diklat
                    </h2>
                    <div class="text-center"><a href="#" class="btn btn-lihatdok btn-sm btn-primary">Lihat
                            Dokumen</a></div>
                </div>
            </div>

            <div class="d-flex justify-content-center m-4">
                <a href="../kepegawaian/data_pegawai.php" class="btn btn-md btn-primary m-1">Kembali</a>
                <a href="../kepegawaian/editdatapegawai.phpnip=<?php echo $row['nip']; ?>"  class="btn btn-md btn-warning m-1">Edit</a>

            </div>

            </div>
        </div>

        <?php 
        $sql4 = mysqli_query($koneksi,"SELECT * FROM pegawai JOIN data_pribadi ON pegawai.id_data_pribadi = data_pribadi.id_data_pribadi WHERE pegawai.nip = '$nip'");
        ?>
        <div class="p-2">
            <div class="card card-pegawai">
                <div class="card-header">
                    <h4 class="card-title">Foto Pegawai</h4>
                </div>
                <?php while ($foto = mysqli_fetch_array($sql4) ){?>
                <img src="../../Penyimpanan/foto/<?php echo $foto['foto']; ?>" alt="Foto Pegawai" class="pegawai-foto">
            </div>

        </div>
    </div>
    <?php } ?>
</div>

<?php include '../sections/footer.php'; ?>