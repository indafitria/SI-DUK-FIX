<?php
include '../sections/header.php';
include '../../config/koneksi.php';
include '../../function/fungsi.php';
?>

<?php 

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));


//jika tidak ada login sebelumnya maka diarahkan ke login.php
if (empty($_SESSION['username']) and empty($_SESSION['pass'])) {
    echo "<script> window.location = 'index.php' </script>";
};
?>

<?php
if (isset($_POST['submit'])) {
    $nip = $_POST['nip'];
    $catatan_mutasi = $_POST['catatan_mutasi'];
    $tmt_mutasi = $_POST['Tmt'];
    $lokasi_file = $_FILES['dokumen_mutasi']['tmp_name'];
    $dokumen_mutasi = $_FILES['dokumen_mutasi']['name'];
    $ukuran_dokumen = $_FILES['dokumen_mutasi']['size'];

    $allowed_extensions = array('pdf');
    $file_extension = pathinfo($dokumen_mutasi, PATHINFO_EXTENSION);
    // Validasi format file
    if (!in_array($file_extension, $allowed_extensions)) {
        echo "<script> alert('Format file tidak valid. Hanya file PDF yang diizinkan.');  window.location='../contets/tambah_datamutasi.php?nip=" . $nip . "';</script>";
        exit();
    }

    // Validasi ukuran file
    if ($ukuran_dokumen > 15000000) { // 15 MB dalam bytes
        echo "<script> alert('Ukuran file lebih dari 15 MB, data tidak dapat ditambahkan.'); window.history.back();</script>";
        exit();
    }

    // Pindahkan file yang diunggah
    move_uploaded_file($lokasi_file, '../../Penyimpanan/sk/' . $dokumen_mutasi);

    // Tambahkan data mutasi ke database
    $hasil_tambah_mutasi = tambahMutasi($nip, $catatan_mutasi,$tmt_mutasi ,$dokumen_mutasi);

    if ($hasil_tambah_mutasi > 0) {
        echo "<script> alert('Proses Tambah Data Berhasil'); window.location='editdatapegawai.php?nip=" . $nip . "';</script>";
    } else {
        echo "<script> alert('Proses Tambah Data Gagal'); window.history.back();</script>";
    }
}
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Data Mutasi Kepegawaian</h4>
                </div>
                <div class="card-body">
                    <?php
                    $nip =  $_GET['nip'];
                    ?>
                    <form action="tambah_datamutasi.php" method="POST" enctype="multipart/form-data">

                        <input type="hidden" class="form-control" value="<?php echo $nip; ?>" name="nip">
                        <div class="row mb-3">
                            <label for="inputCatatanMutasiKepegawaian" class="col-sm-2 col-form-label text-nowrap">Catatan Mutasi Kepegawaian</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="catatan_mutasi" placeholder="Masukkan Catatan Mutasi Kepegawaian" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputCatatanMutasiKepegawaian" class="col-sm-2 col-form-label text-nowrap">TMT Mutasi</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="Tmt" rows="5"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputSKJabatan" class="col-sm-2 col-form-label">Upload Dokumen Mutasi*</label>
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
                                    <input class="btn btn-success d-grid gap-2 col-12 mx-auto" type="submit" name ="submit" value="Simpan">
                                </div>
                            </div>
                        </div>
                        </form>

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

