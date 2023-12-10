<?
include('../config/koneksi.php');
include('fungsi.php');
?>

<?php

$id_dapri = $_POST['id_data_pribadi'];
$nama = $_POST['nama'];
$nip = $_POST['nip'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$usia = $_POST['usia'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$agama = $_POST['agama'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$email = $_POST['email'];
$npwp = $_POST['npwp'];
$lokasi_file = $_FILES['foto']['tmp_name'];
$foto_file = $_FILES['foto']['name'];
$ukuran_foto = $_FILES['foto']['size'];
$status = $_POST['status'];
$id_golongan = $_POST['id_golongan'];
$tmt_golongan = $_POST['tmt_golongan'];
$jabatan = $_POST['jabatan'];
$id_bidang = $_POST['id_bidang'];
$tmt_jabatan = $_POST['tmt_jabatan'];
$penempatan = $_POST['penempatan'];
$lokasi_file_sk = $_FILES['sk_jabatan']['tmp_name'];
$sk_file = $_FILES['sk_jabatan']['name'];
$ukuran_sk = $_FILES['sk_jabatan']['size'];
$mkt = $_POST['masa_kerja_tahun'];
$mkb = $_POST['masa_kerja_bulan'];

$cttn_mutasi1 = $jabatan . ' ' . $penempatan . ' ' . 'Dinas Komunikasi,Informatika,Persandian,dan Statistik Provinsi Kalimantan Tengah';
$pegawai['catatan_mutasi'] = $cttn_mutasi1;

include('../function/fungsi.php');
if (empty($lokasi_file) && empty($lokasi_file_sk)) {
    $hasilubah = ubahDataPribadi1($id_dapri, $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $usia, $email, $no_hp, $alamat, $agama);

    $hasilubah1 = ubahDataPegawai($nip,$id_dapri,$id_bidang,$id_golongan,$status,$npwp,$tmt_golongan,$jabatan,$tmt_jabatan,$mkt,$mkb);

} elseif ($ukuran_foto <= 2048000 && empty($lokasi_file_sk)) {
    move_uploaded_file($lokasi_file, '../foto/' . $foto_file);
    $hasilubah = ubahDataPribadi($id_dapri, $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $usia, $email, $no_hp, $foto_file, $alamat, $agama);

    $hasilubah1 = ubahDataPegawai($nip, $id_bidang, $id_golongan, $status, $npwp, $tmt_golongan, $jabatan, $tmt_jabatan, $mkt, $mkb);
} else if (empty($lokasi_file) && $ukuran_sk <= 2048000) {
    move_uploaded_file($lokasi_file_sk, '../sk/' . $sk_file);

    $hasilubah = ubahDataPribadi1($id_dapri, $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $usia, $email, $no_hp, $alamat, $agama);

    $hasilubah1 = ubahDataPegawai1($nip, $id_bidang, $id_golongan, $status, $npwp, $tmt_golongan, $jabatan, $tmt_jabatan, $sk_file, $mkt, $mkb);
} else if ($ukuran_foto <= 2048000 && $ukuran_sk <= 2048000) {
    move_uploaded_file($lokasi_file, '../foto/' . $foto_file);
    move_uploaded_file($lokasi_file_sk, '../sk/' . $sk_file);

    $hasilubah = ubahDataPribadi($id_dapri, $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $usia, $email, $no_hp, $foto_file, $alamat, $agama);

    $hasilubah1 = ubahDataPegawai1($nip, $id_bidang, $id_golongan, $status, $npwp, $tmt_golongan, $jabatan, $tmt_jabatan, $sk_file, $mkt, $mkb);
} elseif ($ukuran_foto > 2048000) {
    echo "<script> alert ('Ukuran foto $foto_file lebih dari 2 MB, tidak dapat menambahkan data');
    window.location='tampil-data.php' </script>";
} elseif ($ukuran_sk > 2048000) {
    echo "<script> alert ('Ukuran foto $sk_file lebih dari 2 MB, tidak dapat menambahkan data');
    window.location='tampil-data.php' </script>";
} else {
    $hasilubah = ubahDataPribadi1($id_dapri, $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $usia, $email, $no_hp, $alamat, $agama);

    $hasilubah1 = ubahDataPegawai($nip, $id_bidang, $id_golongan, $status, $npwp, $tmt_golongan, $jabatan, $tmt_jabatan, $mkt, $mkb);
}


if ($hasilubah > 0 && $hasilubah1 > 0) {
    echo "<script> alert('Proses Edit Data Pribadi Berhasil'); window.location='#;</script>";
} else {
    echo "<script> alert('Proses Tambah Data Gagal'); window.location='#';</script>";
}


?>
