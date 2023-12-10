<?php include '../sections/header.php'; ?>
<?php include '../../config/koneksi.php'; ?>
<?php include '../../function/fungsi.php'; ?>

<?php 

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));


//jika tidak ada login sebelumnya maka diarahkan ke login.php
if (empty($_SESSION['username']) and empty($_SESSION['pass'])) {
    echo "<script> window.location = 'index.php' </script>";
};
?>


<?php

if (isset($_POST['simpan_pnd'])) {
    $nip = $_POST['nip'];
    $no_pnd = $_POST['no_pnd'];
    $strata = $_POST['strata'];
    $jurusan = $_POST['jurusan'];
    $konsentrasi = $_POST['konsentrasi'];
    $nama_kampus = $_POST['nama_kampus'];
    $tahun_lulus = $_POST['tahun_lulus'];

    $lokasi_ijazah = $_FILES['ijazah']['tmp_name'];
    $ijazah = $_FILES['ijazah']['name'];
    $ukuran_ijazah = $_FILES['ijazah']['size'];

    // $hasil_ubah = proses_edit_sarjana();
    // $hasil_ubah = proses_edit_sarjana($no_pnd,$strata,$jurusan,$konsentrasi,$nama_kampus,$tahun_lulus,$lokasi_ijazah,$ijazah,$ukuran_ijazah);
    if (empty($lokasi_ijazah)) {
       $hasil_ubah = ubahDataRiwayatPendidikan1($no_pnd,$strata,$jurusan,$konsentrasi,$nama_kampus,$tahun_lulus);
    } else // Validasi ukuran file
        if ($ukuran_ijazah > 15000000) { // 15 MB dalam bytes
            echo "<script> alert('Ukuran file lebih dari 15 MB, data tidak dapat ditambahkan.'); window.history.back();</script>";
            exit();

        } else if ($ukuran_ijazah < 15000000) {
            $allowed_extensions = array('pdf');
            $file_extension = pathinfo($ijazah, PATHINFO_EXTENSION);

            if (!in_array($file_extension, $allowed_extensions)) {
                echo "<script> alert('Format file tidak valid. Hanya file PDF yang diizinkan.'); window.history.back();</script>";
                exit();
            } else {
                // Generate a unique filename to avoid overwriting
                // Pindahkan file yang diunggah
                move_uploaded_file($lokasi_ijazah, '../../Penyimpanan/sertifikat/' . $ijazah);

                // Tambahkan data diklat ke database dengan nama file yang baru
                $hasil_ubah = ubahDataRiwayatPendidikan($no_pnd,$strata,$jurusan,$konsentrasi,$nama_kampus,$tahun_lulus,$ijazah);
            }
        } else {
            // Jika tidak ada dokumen yang diunggah, panggil fungsi tanpa dokumen
           $hasil_ubah = ubahDataRiwayatPendidikan1($no_pnd,$strata,$jurusan,$konsentrasi,$nama_kampus,$tahun_lulus);
        }


    if ($hasil_ubah > 0) {
        echo "<script> alert('Proses Edit Data Berhasil'); window.location='editdatapegawai.php?nip=" . $nip . "';</script>";
    } else {
        echo "<script> alert('Proses Edit Data Gagal'); window.location='#';</script>";
    }
}
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Data Pendidikan Tinggi</h4>
                </div>
                <div class="card-body">
                    <?php
                    $nip = $_GET['nip'];
                    $no_pnd = $_GET['no_pnd'];
                    $t = mysqli_query($koneksi, "SELECT * FROM riwayat_pendidikan WHERE no_pnd = '$no_pnd'");

                    $t_edit = mysqli_fetch_array($t);
                    $no_pnd = $t_edit['no_pnd'];
                    $strata = $t_edit['strata'];
                    $nama_kampus = $t_edit['nama_kampus'];
                    $jur= $t_edit['jurusan'];
                    $ksn = $t_edit['konsentrasi'];
                    $tahun_lulus= $t_edit['tahun_lulus'];
                    $ijazah = $t_edit['ijazah'];

                    ?>
                    <form action="edit_datasarjana.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" value="<?php echo $nip; ?>" name="nip">
                        <input type="hidden" class="form-control" value="<?php echo $no_pnd?>" name="no_pnd">
                        <div class="row mb-3">
                            <label for="inputCatatanMutasi" class="col-sm-2 col-form-label">Strata</label>
                            <div class="col-sm-9">
                                <select class="form-select" aria-label="Default select example" name="strata">
                                    <option value="<?php echo $strata ?>" selected><?php echo $strata ?></option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputBulanTahun" class="col-sm-2 col-form-label">Jurusan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="<?php echo $jur ?>" name="jurusan" placeholder="Masukkan Jurusan">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputJumlahJam" class="col-sm-2 col-form-label">Konsentrasi</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="<?php echo $ksn ?>" name="konsentrasi" placeholder="Masukkan Konsentrasi">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputNama" class="col-sm-2 col-form-label">Alumni</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="<?php echo $nama_kampus ?>" name="nama_kampus" placeholder="Masukkan Alumni">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputBulanTahun" class="col-sm-2 col-form-label">Tahun Lulus</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" value="<?php echo $tahun_lulus ?>" name="tahun_lulus" placeholder="Masukkan Tahun Lulus">
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="inputDokumenDiklat" class="col-sm-2 col-form-label">File Ijazah</label>
                            <div class="col-sm-9">
                                <?php

                                if (!empty($ijazah)) {
                                    echo "<a href='../../Penyimpanan/ijazah/$ijazah' target='_blank'>$ijazah</a>";
                                } else {
                                    echo "Dokumen belum diunggah.";
                                }
                                ?>
                            </div>

                        <div class="row mb-3">
                            <label for="inputSKJabatan" class="col-sm-2 col-form-label">Upload Ijazah</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="ijazah" accept=".pdf">
                                <div class="form-text" id="basic-addon4">Jenis file PDF maksimal 15 MB*.
                                </div>
                            </div>
                        </div>

                        <div class="p-2">
                            <div class="d-flex flex-row mb-3 justify-content-center">
                                <div class="p-2">
                                    <input class="btn btn-danger d-grid gap-2 col-12 mx-auto" type="reset" value="Reset">
                                </div>
                                <div class="p-2">
                                    <input class="btn btn-success d-grid gap-2 col-12 mx-auto" type="submit" name="simpan_pnd" value="Simpan">
                                </div>
                            </div>
                        </div>

                        <div class="d-md-flex justify-content-start">
                            <a class="btn btn-primary" href="../kepegawaian/editdatapegawai.php?nip=<?php echo $nip ?>" role="button">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../sections/footer.php'; ?>
