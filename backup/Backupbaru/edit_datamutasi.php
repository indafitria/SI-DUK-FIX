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

if (isset($_POST['Simpan'])) {
    $nip = $_POST['nip'];
    $no_mtsi = $_POST['no_mtsi'];
    $catatan = $_POST['catatan_mutasi'];
    $tmt = $_POST['Tmt'];

    $lokasi_dok_mut = $_FILES['dokumen_mutasi']['tmp_name'];
    $dok = $_FILES['dokumen_mutasi']['name'];
    $ukuran_dok = $_FILES['dokumen_mutasi']['size'];

    if (empty($lokasi_dok_mut)) {
        $hasil = ubahDataRiwayatMutasi1($no_mtsi, $catatan, $tmt);
    } else 
    
    if (!empty($lokasi_dok_mut)) {
        // Validasi format file
        $allowed_extensions = array('pdf');
        $file_extension = pathinfo($dok, PATHINFO_EXTENSION);

        if (!in_array($file_extension, $allowed_extensions)) {
            echo "<script> alert('Format file tidak valid. Hanya file PDF yang diizinkan.'); window.history.back();</script>";
            exit();
        }

        // Validasi ukuran file
        if ($ukuran_dok > 15000000) { // 15 MB dalam bytes
            echo "<script> alert('Ukuran file lebih dari 15 MB, data tidak dapat ditambahkan.'); window.history.back();</script>";
            exit();
        } else {
            // Generate a unique filename to avoid overwriting
            // Pindahkan file yang diunggah
            move_uploaded_file($lokasi_dok_mut, '../../Penyimpanan/sk/' . $dok);

            // Tambahkan data diklat ke database dengan nama file yang baru
            $hasil = ubahDataRiwayatMutasi($no_mtsi, $catatan, $tmt ,$dok);
        }
    } else {
        $hasil = ubahDataRiwayatMutasi1($no_mtsi, $catatan, $tmt);
    }

    
    if ($hasil > 0) {
        echo "<script> alert('Proses Edit Data Berhasil'); window.location='editdatapegawai.php?nip=" . $nip . "';</script>";
    } else {
        echo "<script> alert('Proses Edit Data Gagal'); window.history.back;</script>";
    }
}
?>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Data Mutasi Kepegawaian</h4>
                </div>
                <div class="card-body">
                    <?php
                    $nip = $_GET['nip'];
                    $no = $_GET['no_mtsi'];
                    $query = mysqli_query($koneksi, "SELECT * FROM riwayat_mutasi WHERE no_mtsi = '$no'");
                    $p = mysqli_fetch_array($query);
                    $c = $p['catatan_mutasi'];
                    $dok = $p['dokumen_mutasi'];
                    $tmt = $p['Tmt'];


                    ?>
                    <form action="edit_datamutasi.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" value="<?php echo $nip; ?>" name="nip">
                        <input type="hidden" class="form-control" value="<?php echo $no; ?>" name="no_mtsi">


                        <div class="row mb-3">
                            <label for="inputCatatanMutasiKepegawaian" class="col-sm-2 col-form-label text-nowrap">Catatan Mutasi Kepegawaian</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="catatan_mutasi" rows="5"> <?php echo $c ?></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputCatatanMutasiKepegawaian" class="col-sm-2 col-form-label text-nowrap">TMT</label>
                            <div class="col-sm-10">
                            <input type="date" class="form-control" value="<?php echo $tmt ?>" name="Tmt">
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="inputDokumenDiklat" class="col-sm-2 col-form-label">File Ijazah</label>
                            <div class="col-sm-9">
                                <?php

                                if (!empty($dok)) {
                                    echo "<a href='../../Penyimpanan/sk/$dok' target='_blank'>$dok</a>";
                                } else {
                                    echo "Dokumen belum diunggah.";
                                }
                                ?>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputSKJabatan" class="col-sm-2 col-form-label">Upload Dokumen Mutasi</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="dokumen_mutasi" accept=".pdf">
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
                                    <input class="btn btn-success d-grid gap-2 col-12 mx-auto" type="submit" name="Simpan" value="Simpan">
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