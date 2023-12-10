<?php
include '../sections/header.php';
include '../../config/koneksi.php';
include '../../function/fungsi.php';
?>

<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));


//jika tidak ada login sebelumnya maka diarahkan ke login.php
if (empty($_SESSION['username']) and empty($_SESSION['pass'])) {
    echo "<script> window.location = '../../index.php' </script>";
};

?>

<?php
if (isset($_POST['simpan_data'])) {
    $nip = $_POST['nip'];
    $id_sk = $_POST['id_sk'];
    $jenis_sk = $_POST['jenis_sk'];
    $keterangan = $_POST['keterangan'];
    $nomor_sk = $_POST['nomor_sk'];
    $tmt_sk = $_POST['tmt_sk'];
    $lokasi_sk = $_FILES['dokumen_sk']['tmp_name'];
    $dokumen_sk = $_FILES['dokumen_sk']['name'];
    $ukuran_dok = $_FILES['dokumen_sk']['size'];



    // Periksa apakah ada perubahan sebelum menjalankan proses edit
    // $existingData = mysqli_query($koneksi, "SELECT * FROM riwayat_mutasi WHERE no_mtsi = '$no_mtsi'");
    // if ($existingData) {
    //     $row = mysqli_fetch_array($existingData);

    //     if (
    //         $row['catatan'] == $catatan &&
    //         $row['nomor_sk'] == $nomor_sk &&
    //         $row['tmt_mutasi'] == $tmt &&
    //         $row['dokumen_mutasi'] == $dok
    //     ) {
    //         // Data yang diinputkan sama dengan yang sudah ada, tidak perlu mengedit.
    //         echo "<script> alert('Tidak ada perubahan data.'); window.location='editdatapegawai.php?nip=" . $nip . "';</script>";
    //         exit();
    //     }
    // }


    if (empty($lokasi_sk)) {
        $hasil = ubahSK1($id_sk, $jenis_sk, $keterangan, $nomor_sk, $tmt_sk);
    } else 
    
    if (!empty($lokasi_sk)) {
        // Validasi format file
        $allowed_extensions = array('pdf');
        $file_extension = pathinfo($dokumen_sk, PATHINFO_EXTENSION);

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
            move_uploaded_file($lokasi_sk, '../../Penyimpanan/sk/' . $dokumen_sk);

            // Tambahkan data diklat ke database dengan nama file yang baru
            $hasil = ubahSK($id_sk, $jenis_sk, $keterangan, $nomor_sk, $tmt_sk, $dokumen_sk);
        }
    } else {
        $hasil = ubahSK1($id_sk, $jenis_sk, $keterangan, $nomor_sk, $tmt_sk);
    }


    if ($hasil > 0) {
        echo "<script> alert('Edit Data Berhasil'); window.location='././editdatapegawai.php?nip=" . $nip . "';</script>";
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
                    <h4>Edit Data Riwayat Pangkat/Golongan</h4>
                </div>
                <div class="card-body">
                    <?php
                    $nip = $_GET['nip'];
                    $id_sk = $_GET['id_sk'];
                    $query = mysqli_query($koneksi, "SELECT * FROM riwayat_pangkat WHERE id_sk = '$id_sk'");
                    $query_edit = mysqli_fetch_array($query);
                    $jenis_sk = $query_edit['jenis_sk'];
                    $keterangan = $query_edit['keterangan'];
                    $nomor_sk = $query_edit['nomor_sk'];
                    $tmt_sk = $query_edit['tmt_sk'];
                    $dokumen_sk = $query_edit['dokumen_sk'];

                    ?>
                    <form action="edit_sk.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" value="<?php echo $id_sk; ?>" name="id_sk">
                        <input type="hidden" class="form-control" value="<?php echo $nip; ?>" name="nip">
                        <div class="d-flex flex-row mb-3">
                            <div class="p-2 ml-cm">
                                <div class="card mb-3">
                                    <select class="form-select" id="aksiSelect" name="jenis_sk">
                                        <option selected><?php echo $jenis_sk; ?></option>
                                        <option value="cpns">CPNS</option>
                                        <option value="pns">PNS</option>
                                        <option value="pangkat">PANGKAT</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputNoSK" class="col-sm-2 col-form-label">Keterangan SK</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="<?php echo $keterangan; ?>" name="nomor_sk" placeholder="Masukkan Minimal Sebanyak 4 Karakter dan Maksimal 50 Karakter" oninput="this.reportValidity()" autocomplete="off">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputNoSK" class="col-sm-2 col-form-label">Nomor SK</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="<?php echo $nomor_sk; ?>" name="nomor_sk" placeholder="Masukkan Minimal Sebanyak 4 Karakter dan Maksimal 50 Karakter" oninput="this.reportValidity()" autocomplete="off">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputTahunDiklat" class="col-sm-2 col-form-label">TMT</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" value="<?php echo $tmt_sk; ?>" name="tmt_sk" required pattern="[0-9]{4}" title="Harus Berupa Angka Sebanyak 4 Karakter" oninput="this.reportValidity()">
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="inputDokumenDiklat" class="col-sm-2 col-form-label">Dokumen SK</label>
                            <div class="col-sm-9">
                                <?php

                                if (!empty($dokumen_sk)) {
                                    echo "<a href='../../Penyimpanan/sk/$dokumen_sk'target='_blank'>$dokumen_sk</a>";
                                } else {
                                    echo "Dokumen belum diunggah.";
                                }
                                ?>
                            </div>
                            <div class="row mb-3">
                                <label for="#" class="col-sm-2 col-form-label">Upload Dokumen SK*</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" name="dokumen_sk" accept=".pdf">
                                    <div class="form-text" id="basic-addon4">Jenis file PDF maksimal 15 MB*.
                                    </div>
                                </div>
                            </div>

                            <div class="p-2">
                                <div class="d-flex flex-row mb-3 justify-content-center">
                                    <div class="p-2">
                                        <input class="btn btn-danger d-grid gap-2 col-12 mx-auto" type="reset" value="Reset" onclick="resetData()">
                                    </div>
                                    <div class="p-2">
                                        <input class="btn btn-success d-grid gap-2 col-12 mx-auto" type="submit" name="simpan_data" value="Simpan">
                                    </div>
                                </div>

                            </div>

                    </form>

                    <div class="d-md-flex justify-content-start">
                        <a class="btn btn-primary" href="../kepegawaian/editdatapegawai.php?nip=<?php echo $nip; ?>" role="button">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../sections/footer.php'; ?>