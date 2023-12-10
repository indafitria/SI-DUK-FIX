<?php
include '../sections/header.php';
include '../../config/koneksi.php';
include '../../function/fungsi.php';


?>

<?php
if (isset($_POST['simpan_data'])) {
    $id_diklat = $_POST['id_diklat'];
    $nip = $_POST['nip'];
    $jenis_diklat = $_POST['jenis_diklat'];
    $nama_diklat = $_POST['nama_diklat'];
    $tahun_diklat = $_POST['tahun_diklat'];
    $jmlh_jam = $_POST['jmlh_jam'];
    $lokasi_file = $_FILES['dokumen_diklat']['tmp_name'];
    $dokumen_diklat = $_FILES['dokumen_diklat']['name'];
    $ukuran_dokumen = $_FILES['dokumen_diklat']['size'];


    // Periksa apakah ada perubahan sebelum menjalankan proses edit


    if (empty($lokasi_file)) {
        $hasil_ubah = ubahDataRiwayatDiklat1($id_diklat, $jenis_diklat, $nama_diklat, $tahun_diklat, $jmlh_jam);
    } else // Validasi ukuran file
        if ($ukuran_dokumen > 15000000) { // 15 MB dalam bytes
            echo "<script> alert('Ukuran file lebih dari 15 MB, data tidak dapat ditambahkan.'); window.history.back();</script>";
            exit();
        } else if ($ukuran_dokumen < 15000000) {
            $allowed_extensions = array('pdf');
            $file_extension = pathinfo($dokumen_diklat, PATHINFO_EXTENSION);

            if (!in_array($file_extension, $allowed_extensions)) {
                echo "<script> alert('Format file tidak valid. Hanya file PDF yang diizinkan.'); window.location='../contets/tambah_datadiklat.php?nip=" . $nip . "';</script>";
                exit();
            } else {
                // Generate a unique filename to avoid overwriting
                // Pindahkan file yang diunggah
                move_uploaded_file($lokasi_file, '../../Penyimpanan/sertifikat/' . $dokumen_diklat);

                // Tambahkan data diklat ke database dengan nama file yang baru
                $hasil_ubah = ubahDataRiwayatDiklat($id_diklat, $jenis_diklat, $nama_diklat, $tahun_diklat, $jmlh_jam, $dokumen_diklat);
            }
        } else {
            // Jika tidak ada dokumen yang diunggah, panggil fungsi tanpa dokumen
            $hasil_ubah = ubahDataRiwayatDiklat1($id_diklat, $jenis_diklat, $nama_diklat, $tahun_diklat, $jmlh_jam);
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
                    <h4>Edit Data Diklat</h4>
                </div>
                <div class="card-body">
                    <?php
                    $nip = $_GET['nip'];
                    $id_diklat = $_GET['id_diklat'];
                    $edk = mysqli_query($koneksi, "SELECT * FROM riwayat_diklat WHERE id_diklat = '$id_diklat'");
                    $edit_edk = mysqli_fetch_array($edk);
                    $jenis_diklat = $edit_edk['jenis_diklat'];
                    $nama_diklat = $edit_edk['nama_diklat'];
                    $tahun_diklat = $edit_edk['tahun_diklat'];
                    $jmlh_jam = $edit_edk['jmlh_jam'];
                    $dok = $edit_edk['dokumen_diklat'];
                    ?>
                    <form action="edit_datadiklat.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" value="<?php echo $nip; ?>" name="nip">
                        <input type="hidden" class="form-control" value="<?php echo $id_diklat; ?>" name="id_diklat">
                        <div class="d-flex flex-row mb-3">
                            <div class="p-2 ml-cm">
                                <div class="card mb-3">
                                    <select class="form-select" id="aksiSelect" name="jenis_diklat">
                                        <option> <?php echo $jenis_diklat; ?></option>
                                        <option value="Jabatan">Diklat Jabatan</option>
                                        <option value="Teknis">Diklat Teknis</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputNamaDiklat" class="col-sm-2 col-form-label">Nama Diklat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="<?php echo $nama_diklat; ?>" name="nama_diklat" placeholder="Masukkan Nama Diklat" required pattern="[A-Za-z., ]{1,50}" title="Harus Berupa Huruf Minimal Sebanyak 1 Karakter dan Maksimal 50 Karakter" oninput="this.reportValidity()">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputTahunDiklat" class="col-sm-2 col-form-label">Tahun Diklat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="<?php echo $tahun_diklat; ?>" name="tahun_diklat" placeholder="Masukkan Tahun Diklat" required pattern="[0-9]{4}" title="Harus Berupa Angka Sebanyak Maksimal 4 Karakter" oninput="this.reportValidity()">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputJumlahJam" class="col-sm-2 col-form-label">Jumlah Jam</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="<?php echo $jmlh_jam; ?>" name="jmlh_jam" placeholder="Masukkan Jumlah Jam" required pattern="[0-9]{1,6}" title="Harus Berupa Angka Sebanyak Maksimal 6 Karakter" oninput="this.reportValidity()">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDokumenDiklat" class="col-sm-2 col-form-label">Dokumen Diklat</label>
                            <div class="col-sm-9">
                                <?php

                                if (!empty($dok)) {
                                    echo "<a href='../../Penyimpanan/sertifikat/$dok' target='_blank'>$dok</a>";
                                } else {
                                    echo "Dokumen belum diunggah.";
                                }
                                ?>
                            </div>
                            <div class="row mb-3">
                                <label for="inputDokumenDiklat" class="col-sm-2 col-form-label">Upload Dokumen Diklat*</label>
                                <div class="col-sm-9">
                                    <input type="file" accept=".pdf" name="dokumen_diklat" class="form-control">
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