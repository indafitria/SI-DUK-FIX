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
    $jenis_diklat = $_POST['jenis_diklat'];
    $nama_diklat = $_POST['nama_diklat'];
    $tahun_diklat = $_POST['tahun_diklat'];
    $jmlh_jam = $_POST['jmlh_jam'];
    $lokasi_file = $_FILES['dokumen_diklat']['tmp_name'];
    $dokumen_diklat = $_FILES['dokumen_diklat']['name'];
    $ukuran_dokumen = $_FILES['dokumen_diklat']['size'];

    $allowed_extensions = array('pdf');
    $file_extension = pathinfo($dokumen_diklat, PATHINFO_EXTENSION);

    // Validasi format file
    if (!in_array($file_extension, $allowed_extensions)) {
        echo "<script> alert('Format file tidak valid. Hanya file PDF yang diizinkan.'); window.location='../contets/tambah_datadiklat.php?nip=" . $nip . "';</script>";
        exit();
    }

    // Validasi ukuran file
    if ($ukuran_dokumen > 15000000) { // 15 MB dalam bytes
        echo "<script> alert('Ukuran file lebih dari 15 MB, data tidak dapat ditambahkan.'); window.history.back();</script>";
        exit();
    }

    // Pindahkan file yang diunggah
    move_uploaded_file($lokasi_file, '../../Penyimpanan/sertifikat/' . $dokumen_diklat);

    // Tambahkan data diklat ke database
    $hasil_tambah_diklat = tambahRiwayatDiklat($nip, $jenis_diklat, $nama_diklat, $tahun_diklat, $jmlh_jam, $dokumen_diklat);

    if ($hasil_tambah_diklat > 0) {
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
                    <h4>Tambah Data Diklat</h4>
                </div>
                <div class="card-body">
                    <?php
                    $nip = $_GET['nip'];
                    ?>
                    <form action="tambah_datadiklat.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" value="<?php echo $nip; ?>" name="nip">
                        <div class="d-flex flex-row mb-3">
                            <div class="p-2 ml-cm">
                                <div class="card mb-3">
                                    <select class="form-select" id="aksiSelect" name="jenis_diklat">
                                        <option selected disabled>Pilih Jenis Diklat</option>
                                        <option value="Jabatan">Diklat Jabatan</option>
                                        <option value="Teknis">Diklat Teknis</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputNamaDiklat" class="col-sm-2 col-form-label">Nama Diklat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama_diklat" placeholder="Masukkan Nama Diklat" required pattern="[A-Za-z ]{4,50}" title="Harus Berupa Huruf Minimal Sebanyak 4 Karakter dan Maksimal 50 Karakter" oninput="this.reportValidity()">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputTahunDiklat" class="col-sm-2 col-form-label">Tahun Diklat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="tahun_diklat" placeholder="Masukkan Tahun Diklat" required pattern="[0-9]{4}" title="Harus Berupa Angka Sebanyak 4 Karakter" oninput="this.reportValidity()">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputJumlahJam" class="col-sm-2 col-form-label">Jumlah Jam</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="jmlh_jam" placeholder="Masukkan Jumlah Jam" required pattern="[0-9]{1,6}" title="Harus Berupa Angka Minimal Sebanyak 1 Karakter dan Maksimal 6 Karakter" oninput="this.reportValidity()">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputDokumenDiklat" class="col-sm-2 col-form-label">Upload Dokumen Diklat*</label>
                            <div class="col-sm-9">
                                <input type="file" accept=".pdf" name="dokumen_diklat" class="form-control" required>
                                <div class="form-text">Jenis file PDF maksimal 15 MB*.</div>
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