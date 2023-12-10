<?php

// include('../../config/koneksi.php');

// $id_user = $_GET['id_user'];

// $query = mysqli_query($koneksi,"SELECT * FROM user WHERE id_user = '$id_user'");
// $hasil = mysqli_fetch_array($query);

// $nama = $hasil['nama'];

// include '../../function/fungsi.php';

// $hasil_reset = resetPassUser($id_user);

// if ($hasil_reset > 0) {
//     echo "<script> alert('Reset Password Milik Admin. $nama. Berhasil! Silahkan Masukan Pass 12345'); window.history.back();</script>";
// } else {
//     echo "<script> alert('Reset Password Gagal'); window.history.back();</script>";
// }



include('../../config/koneksi.php');
include '../../function/fungsi.php';

$id_user = $_GET['id_user'];

$query = mysqli_query($koneksi,"SELECT * FROM user WHERE id_user = '$id_user'");
$hasil = mysqli_fetch_array($query);
$nama = $hasil['nama'];



$hasil_reset = resetPassUser($id_user);


if ($hasil_reset > 0) {
    echo "<script>alert('Reset Password berhasil! Password sekarang adalah 12345. Silakan login dan segera ubah kata sandi.'); window.history.back();</script>";
// } else {
//     echo "<script>alert('Reset Password Gagal'); window.history.back();</script>";
}


?>