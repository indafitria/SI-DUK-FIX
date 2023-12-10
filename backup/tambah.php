<?php
include '../config/koneksi.php';
include('fungsi.php');




$nip = $_POST['nip'];
$jenis_diklat = $_POST['jenis_diklat'];
$nama_diklat = $_POST['nama_diklat'];
$tahun_diklat = $_POST['tahun_diklat'];
$jmlh_jam = $_POST['jmlh_jam'];
$lokasi_file = $_FILES['dokumen_diklat']['tmp_name'];
$dokumen_diklat = $_FILES['dokumen_diklat']['name'];
$ukuran_dokumen = $_FILES['dokumen_diklat']['size'];

// Validasi ekstensi file
$allowed_extensions = array('pdf');
$file_extension = pathinfo($dokumen_diklat, PATHINFO_EXTENSION);

if (!in_array($file_extension, $allowed_extensions)) {
    echo "<script> alert('Format file tidak valid. Hanya file PDF yang diizinkan.'); window.location='../contets/tambah_datadiklat.php?nip=" . $nip . "';</script>";
    exit();
}

// Validasi ukuran file
if ($ukuran_dokumen > 2048000) {
    echo "<script> alert('Ukuran file lebih dari 2 MB, data tidak dapat ditambahkan.'); window.location='../contents/kepegawaian/tambah_datadiklat.php?nip=" . $nip . "';</script>";
    exit();
}


// Pindahkan file yang diunggah
move_uploaded_file($lokasi_file, '../Penyimpanan/sertifikat/' . $dokumen_diklat);

// Tambahkan data diklat ke database
$hasil_tambah_diklat = tambahRiwayatDiklat($nip, $jenis_diklat, $nama_diklat, $tahun_diklat, $jmlh_jam, $dokumen_diklat);

if ($hasil_tambah_diklat > 0) {
    echo "<script> alert('Proses Tambah Data Berhasil'); window.location='../contents/kepegawaian/editdatapegawai.php?nip=" . $nip . "';</script>";
} else {
    echo "<script> alert('Proses Tambah Data Gagal'); window.location='../contents/kepegawaian/tambah_datadiklat.php?nip=" . $nip . "';</script>";
}
?>
