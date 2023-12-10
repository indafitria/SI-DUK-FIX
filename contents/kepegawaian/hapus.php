<?php
include('../../config/koneksi.php');

if (isset($_GET['id_data_pribadi']) && $_GET['id_data_pribadi'] != '') {
    $nilai = 1;
} else if (isset($_GET['nip']) && $_GET['nip'] != '') {
    $nilai = 2;
} else if (isset($_GET['no_pnd']) && $_GET['no_pnd'] != '') {
    $nilai = 3;
} else if (isset($_GET['id_diklat']) && $_GET['id_diklat'] != '') {
    $nilai = 4;
} else if (isset($_GET['no_mtsi']) && $_GET['no_mtsi'] != '') {
    $nilai = 5;
} else if (isset($_GET['id_user']) && $_GET['id_user'] != '') {
    $nilai = 6;
} else if (isset($_GET['id_sk']) && $_GET['id_sk'] != '') {
    $nilai = 7;
}
else {
    echo "<script> alert('Data tidak ditemukan'); window.history.back();</script>";
}

include '../../function/fungsi.php';

switch ($nilai) {
    case 1:
        $id_dapri = $_GET['id_data_pribadi'];
        $hasilHapus = hapusDataPribadi($id_dapri);
        break;

    case 2:
        $nip = $_GET['nip'];
        $hasilHapus = hapusDataPegawai($nip);
        break;

    case 3:
        $no_pnd = $_GET['no_pnd'];
        $hasilHapus = hapusRiwayatPendidikan($no_pnd);
        break;

    case 4:
        $id_diklat = $_GET['id_diklat'];
        $hasilHapus = hapusRiwayatDiklat($id_diklat);
        break;

    case 5:
        $no_mtsi = $_GET['no_mtsi'];
        $hasilHapus = hapusRiwayatMutasi($no_mtsi);
        break;

    case 6:
        $id_user = $_GET['id_user'];
        $hasilHapus = hapusUser($id_user);
        break;

    case 7:
        $id_sk = $_GET['id_sk'];
        $hasilHapus = hapus_pangkat($id_sk);
        break;
}

if ($hasilHapus > 0) {
    echo "<script> alert('Proses Hapus Data Berhasil'); window.history.back();</script>";
} else {
    echo "<script> alert('Proses Hapus Data Gagal'); window.history.back();</script>";
}
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>