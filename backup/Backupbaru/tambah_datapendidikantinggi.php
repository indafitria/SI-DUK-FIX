<?php include '../sections/header.php'; ?>
<?php include '../../config/koneksi.php'; ?>
<?php include '../../function/fungsi.php';

if(empty($_SESSION['username']) AND empty($_SESSION['pass'])){
    echo "<script> window.location = '../contents/login.php' </script>";
  };
  
?>

<?php
if (isset($_POST['submit'])) {
    $nip = $_POST['nip'];
    $strata = $_POST['strata'];
    $jurusan = $_POST['jurusan'];
    $konsentrasi = $_POST['konsentrasi'];
    $nama_kampus = $_POST['nama_kampus'];
    $tahun_lulus = $_POST['tahun_lulus'];

    $lokasi_file = $_FILES['ijazah']['tmp_name'];
    $dokumen_ijazah = $_FILES['ijazah']['name'];
    $ukuran_dokumen = $_FILES['ijazah']['size'];

    // Validasi ekstensi file
    $allowed_extensions = array('pdf');
    $file_extension = pathinfo($dokumen_ijazah, PATHINFO_EXTENSION);

    if (!in_array($file_extension, $allowed_extensions)) {
        echo "<script> alert('Format file tidak valid. Hanya file PDF yang diizinkan.'); window.history.back();</script>";
        exit();
    }

    // Validasi ukuran file
    if ($ukuran_dokumen > 15000000) { // 15 MB dalam bytes
        echo "<script> alert('Ukuran file lebih dari 15 MB, data tidak dapat ditambahkan.'); window.history.back();</script>";
        exit();
    }

    // Pindahkan file yang diunggah
    move_uploaded_file($lokasi_file, '../../Penyimpanan/ijazah/' . $dokumen_ijazah);

    // Tambahkan data diklat ke database
    $hasil_tambah_diklat = tambahRiwayatPendidikan($nip, $strata, $jurusan, $konsentrasi, $nama_kampus, $tahun_lulus, $dokumen_ijazah);

    if ($hasil_tambah_diklat > 0) {
        echo "<script> alert('Proses Tambah Data Berhasil'); window.location='editdatapegawai.php?nip=" . $nip . "';</script>";
    } else {
        echo "<script> alert('Proses Tambah Data Gagal'); window.location='tambah_datapendidikantinggi.php?nip=" . $nip . "';</script>";
    }
}
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Data Pendidikan Tinggi</h4>
                </div>
                <div class="card-body">
                    <?php
                    $nip = $_GET['nip'];
                    ?>
                    <form action="tambah_datapendidikantinggi.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" value="<?php echo $nip; ?>" name="nip">
                        <div class="row mb-3">
                            <label for="inputCatatanMutasi" class="col-sm-2 col-form-label">Strata</label>
                            <div class="col-sm-9">
                                <select class="form-select" aria-label="Default select example" name="strata">
                                    <option selected disabled>Pilih Strata</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputBulanTahun" class="col-sm-2 col-form-label">Jurusan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="jurusan" placeholder="Masukkan Jurusan">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputJumlahJam" class="col-sm-2 col-form-label">Konsentrasi</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="konsentrasi" placeholder="Masukkan Konsentrasi">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputNama" class="col-sm-2 col-form-label">Alumni</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama_kampus" placeholder="Masukkan Alumni">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputBulanTahun" class="col-sm-2 col-form-label">Tahun Lulus</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="tahun_lulus" placeholder="Masukkan Tahun Lulus">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputSKJabatan" class="col-sm-2 col-form-label">Upload Ijazah*</label>
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
                                    <input class="btn btn-success d-grid gap-2 col-12 mx-auto" type="submit" name="submit" value="Simpan">
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
