<?php include '../sections/header.php'; ?>
<?php include '../../config/koneksi.php'; ?>
<?php include '../../function/fungsi.php'; ?>



<?php
if (isset($_POST['simpan_edp'])) {
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

    $lokasi_foto = $_FILES['foto']['tmp_name'];
    $foto = $_FILES['foto']['name'];
    $ukuran_foto = $_FILES['foto']['size'];


    $status = $_POST['status'];
    $id_golongan = $_POST['id_golongan'];
    $tmt_gol = $_POST['tmt_golongan'];
    $jab = $_POST['jabatan'];
    $id_bidang = $_POST['id_bidang'];
    $tmt_jab = $_POST['tmt_jabatan'];
    $penempatan = $_POST['penempatan'];
    $lokasi_sk = $_FILES['sk_jabatan']['tmp_name'];
    $sk = $_FILES['sk_jabatan']['name'];
    $ukuran_sk = $_FILES['sk_jabatan']['size'];

    $mkt = $_POST['masa_kerja_tahun'];
    $mkb = $_POST['masa_kerja_bulan'];
    $nopnd = $_POST['no_pnd'];
    $strata = $_POST['strata'];
    $jurusan = $_POST['jurusan'];
    $konsentrasi = $_POST['konsentrasi'];
    $nama_sklh = $_POST['nama_kampus'];
    $thn_lulus = $_POST['tahun_lulus'];

    $lokasi_ijazah = $_FILES['ijazah']['tmp_name'];
    $ijazah = $_FILES['ijazah']['name'];
    $ukuran_ijazah = $_FILES['ijazah']['size'];

    $cttn_mutasi1 = $jab . ' ' . $penempatan . ' ' . 'Dinas Komunikasi,Informatika,Persandian,dan Statistik Provinsi Kalimantan Tengah';
    $pegawai['catatan_mutasi'] = $cttn_mutasi1;


    if (empty($lokasi_foto) && empty($lokasi_sk) && empty($lokasi_ijazah)) {
        $nilai = 1;
    } else if (!empty($lokasi_foto) && empty($lokasi_sk) && empty($lokasi_ijazah)) {
        $nilai = 2;
    } else if (empty($lokasi_foto) && !empty($lokasi_sk) && empty($lokasi_ijazah)) {
        $nilai = 3;
    } else if (empty($lokasi_foto) && empty($lokasi_sk) && !empty($lokasi_ijazah)) {
        $nilai = 4;
    } else if (!empty($lokasi_foto) && !empty($lokasi_sk) && empty($lokasi_ijazah)) {
        $nilai = 5;
    } else if (!empty($lokasi_foto) && empty($lokasi_sk) && !empty($lokasi_ijazah)) {
        $nilai = 6;
    } else if (empty($lokasi_foto) && !empty($lokasi_sk) && !empty($lokasi_ijazah)) {
        $nilai = 7;
    } else if (!empty($lokasi_foto) && !empty($lokasi_sk) && !empty($lokasi_ijazah)) {
        $nilai = 8;
    }

    switch ($nilai) {
        case 1:
            $hasil_1 = ubahDataPribadi1($id_dapri, $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $usia, $email, $no_hp, $alamat, $agama);
            $hasil_2 = ubahDataPegawai($nip, $id_dapri, $id_bidang, $id_golongan, $status, $npwp, $tmt_gol, $jab, $tmt_jab, $mkt, $mkb);
            $hasil_4 = ubahDataRiwayatPendidikan1($nopnd, $strata, $jurusan, $konsentrasi, $nama_sklh, $thn_lulus);

            if ($hasil_1 && $hasil_2 && $hasil_4) {
                echo "<script> alert('Edit Data Berhasil'); window.location='detail_datapegawai.php?nip=" . $nip . "';</script>";
            } else {
                echo "<script> alert('Edit Data Gagal'); window.history.back();</script>";
            }

            break;

        case 2:

            if ($ukuran_foto > 15000000) { // 15 MB dalam bytes
                echo "<script> alert('Ukuran file lebih dari 15 MB, data tidak dapat ditambahkan.'); window.history.back();</script>";
                exit();
            } else if ($ukuran_foto < 15000000) {
                $allowed_extensions = array('jpg', 'jpeg', 'JPEG', 'JPG');
                $file_extension = pathinfo($foto, PATHINFO_EXTENSION);

                if (!in_array(strtolower($file_extension), $allowed_extensions)) {
                    echo "<script> alert('Format file tidak valid. Hanya file JPG dan JPEG yang diizinkan.'); window.history.back();</script>";
                    exit();
                } else {
                    move_uploaded_file($lokasi_foto, '../../Penyimpanan/foto/' . $foto);
                    // Tambahkan data pribadi ke database dengan nama file yang baru
                    $hasil_1 = ubahDataPribadi($id_dapri, $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $usia, $email, $no_hp, $foto, $alamat, $agama);
                    $hasil_2 = ubahDataPegawai($nip, $id_dapri, $id_bidang, $id_golongan, $status, $npwp, $tmt_gol, $jab, $tmt_jab, $mkt, $mkb);
                    $hasil_4 = ubahDataRiwayatPendidikan1($nopnd, $strata, $jurusan, $konsentrasi, $nama_sklh, $thn_lulus);
                }
            } else {
                $hasil_1 = ubahDataPribadi1($id_dapri, $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $usia, $email, $no_hp, $alamat, $agama);
                $hasil_2 = ubahDataPegawai($nip, $id_dapri, $id_bidang, $id_golongan, $status, $npwp, $tmt_gol, $jab, $tmt_jab, $mkt, $mkb);
                $hasil_4 = ubahDataRiwayatPendidikan1($nopnd, $strata, $jurusan, $konsentrasi, $nama_sklh, $thn_lulus);
            }


            if ($hasil_1 && $hasil_2 && $hasil_4 > 0) {
                echo "<script> alert('Edit Data Berhasil'); window.location='detail_datapegawai.php?nip=" . $nip . "';</script>";
            } else {
                echo "<script> alert('Edit Data Gagal'); window.history.back();</script>";
            }

            break;

        case 3:
            if ($ukuran_sk > 15000000) { // 15 MB dalam bytes
                echo "<script> alert('Ukuran file lebih dari 15 MB, data tidak dapat ditambahkan.'); window.history.back();</script>";
                exit();
            } else if ($ukuran_sk < 15000000) {
                $allowed_extensions = array('pdf');
                $file_extension = pathinfo($sk, PATHINFO_EXTENSION);

                if (!in_array(strtolower($file_extension), $allowed_extensions)) {
                    echo "<script> alert('Format file tidak valid. Hanya file PDFG yang diizinkan.'); window.history.back();</script>";
                    exit();
                } else {
                    move_uploaded_file($lokasi_sk, '../../Penyimpanan/sk/' . $sk);

                    $hasil_1 = ubahDataPribadi1($id_dapri, $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $usia, $email, $no_hp, $alamat, $agama);

                    $hasil_2 = ubahDataPegawai1($nip, $id_dapri, $id_bidang, $id_golongan, $status, $npwp, $tmt_gol, $jab, $tmt_jab, $sk, $mkt, $mkb);
                    $hasil_3 = tambahMutasi($nip, $cttn_mutasi1, $sk);
                    $hasil_4 = ubahDataRiwayatPendidikan1($nopnd, $strata, $jurusan, $konsentrasi, $nama_sklh, $thn_lulus);
                }
            } else {
                $hasil_1 = ubahDataPribadi1($id_dapri, $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $usia, $email, $no_hp, $alamat, $agama);
                $hasil_2 = ubahDataPegawai($nip, $id_dapri, $id_bidang, $id_golongan, $status, $npwp, $tmt_gol, $jab, $tmt_jab, $mkt, $mkb);
                $hasil_4 = ubahDataRiwayatPendidikan1($nopnd, $strata, $jurusan, $konsentrasi, $nama_sklh, $thn_lulus);
            }


            if ($hasil_1 && $hasil_2 && $hasil_4 || $hasil_3 > 0) {
                echo "<script> alert('Edit Data Berhasil'); window.location='detail_datapegawai.php?nip=" . $nip . "';</script>";
            } else {
                echo "<script> alert('Edit Data Gagal'); window.history.back();</script>";
            }

            break;

        case 4:
            if ($ukuran_ijazah > 15000000) { // 15 MB dalam bytes
                echo "<script> alert('Ukuran file lebih dari 15 MB, data tidak dapat ditambahkan.'); window.history.back();</script>";
                exit();
            } else if ($ukuran_ijazah < 15000000) {
                $allowed_extensions = array('pdf');
                $file_extension = pathinfo($ijazah, PATHINFO_EXTENSION);

                if (!in_array(strtolower($file_extension), $allowed_extensions)) {
                    echo "<script> alert('Format file tidak valid. Hanya file PDFG yang diizinkan.'); window.history.back();</script>";
                    exit();
                } else {
                    move_uploaded_file($lokasi_ijazah, '../../Penyimpanan/ijazah/' . $ijazah);

                    $hasil_1 = ubahDataPribadi1($id_dapri, $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $usia, $email, $no_hp, $alamat, $agama);

                    $hasil_2 = ubahDataPegawai($nip, $id_dapri, $id_bidang, $id_golongan, $status, $npwp, $tmt_gol, $jab, $tmt_jab, $mkt, $mkb);
                    $hasil_4 = ubahDataRiwayatPendidikan($nopnd, $strata, $jurusan, $konsentrasi, $nama_sklh, $thn_lulus,$ijazah);
                }
            } else {
                $hasil_1 = ubahDataPribadi1($id_dapri, $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $usia, $email, $no_hp, $alamat, $agama);
                $hasil_2 = ubahDataPegawai($nip, $id_dapri, $id_bidang, $id_golongan, $status, $npwp, $tmt_gol, $jab, $tmt_jab, $mkt, $mkb);
                $hasil_4 = ubahDataRiwayatPendidikan1($nopnd, $strata, $jurusan, $konsentrasi, $nama_sklh, $thn_lulus);
            }


            if ($hasil_1 && $hasil_2 && $hasil_4 > 0) {
                echo "<script> alert('Edit Data Berhasil'); window.location='detail_datapegawai.php?nip=" . $nip . "';</script>";
            } else {
                echo "<script> alert('Edit Data Gagal'); window.history.back();</script>";
            }

            break;
    
            
    }
}
?>