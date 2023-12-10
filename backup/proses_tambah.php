<?php include '../sections/header.php'; ?>
<?php include '../../config/koneksi.php'; ?>
<?php include '../../function/fungsi.php'; ?>

<?php

if (isset($_POST['tambah_data'])) {



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
    $status = $_POST['status'];
    $id_golongan = $_POST['id_golongan'];
    $tmt_golongan = $_POST['tmt_golongan'];
    $jabatan = $_POST['jabatan'];
    $id_bidang = $_POST['id_bidang'];
    $tmt_jabatan = $_POST['tmt_jabatan'];
    $penempatan = $_POST['penempatan'];

    // FILE
    $lokasi_sk = $_FILES['sk_jabatan']['tmp_name'];
    $sk = $_FILES['sk_jabatan']['name'];
    $ukuran_sk = $_FILES['sk_jabatan']['size'];

    $masa_kerja_tahun = $_POST['masa_kerja_tahun'];
    $masa_kerja_bulan = $_POST['masa_kerja_bulan'];


    $lokasi_foto = $_FILES['foto']['tmp_name'];
    $foto = $_FILES['foto']['name'];
    $ukuran_foto = $_FILES['foto']['size'];

    $allowed_extensions_sk = array('pdf', 'PDF');
    $file_extension_sk = pathinfo($_FILES['sk_jabatan']['name'], PATHINFO_EXTENSION);

    $allowed_extensions_foto = array('jpg', 'jpeg', 'JPEG', 'JPG', 'PNG', 'png');
    $file_extension_foto = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);

   

    if (!in_array($file_extension_foto, $allowed_extensions_foto)) {
        echo "<script> alert('Format file gambar tidak valid. Hanya file JPG/jpg/png/PNG yang diizinkan.'); window.location='#';</script>";
        // exit();
    } else {
        if ($ukuran_foto > 15000000) { // 15 MB dalam bytes
            echo "<script> alert('Ukuran Gambar lebih dari 15 MB, Gambar tidak dapat ditambahkan.'); window.history.back();</script>";
            exit();
        }

        // Pindahkan file yang diunggah
        move_uploaded_file($lokasi_foto, '../../Penyimpanan/foto/' . $foto);

        // Tambahkan data diklat ke database
        $tambah_dapri = tambahDataPribadi($nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $usia, $email, $no_hp, $foto, $alamat, $agama);
      
    }


    if (!in_array($file_extension_sk, $allowed_extensions_sk)) {
        echo "<script> alert('Format file sk tidak valid. Hanya file pdf yang diizinkan.'); window.location='#';</script>";
        // exit();
    } else {
        if ($ukuran_sk > 15000000) { // 15 MB dalam bytes
            echo "<script> alert('Ukuran Gambar lebih dari 15 MB, Gambar tidak dapat ditambahkan.'); window.history.back();</script>";
        }

        // Pindahkan file yang diunggah
        move_uploaded_file($lokasi_sk, '../../Penyimpanan/sk/' . $sk);

        $id_dapri = mysqli_insert_id($koneksi);


        $tambah_pegawai = tambahDataPegawai($nip, $id_dapri, $id_bidang, $id_golongan, $status, $npwp, $tmt_golongan, $jabatan, $tmt_jabatan, $penempatan, $sk, $masa_kerja_tahun, $masa_kerja_bulan);
    }



    $jumlah_pendidikan = count($_POST['strata']);

    for ($p = 0; $p <= $jumlah_pendidikan - 1; $p++) {

        $strata = $_POST['strata'][$p];
        $jurusan = $_POST['jurusan'][$p];
        $konsentrasi = $_POST['konsentrasi'][$p];
        $tahun_lulus = $_POST['tahun_lulus'][$p];
        $nama_kampus = $_POST['nama_kampus'][$p];
        // FILE
        $lokasi_ijazah = $_FILES['ijazah']['tmp_name'][$p];
        $ijazah = $_FILES['ijazah']['name'][$p];
        $ukuran_ijazah = $_FILES['ijazah']['size'][$p];

        $allowed_extensions_ijazah = array('pdf', 'PDF');
        $file_extension_ijazah = pathinfo($ijazah, PATHINFO_EXTENSION);

        if (!in_array($file_extension_ijazah, $allowed_extensions_ijazah)) {
            echo "<script> alert('Format Ijazah tidak valid. Hanya file PDF yang diizinkan.'); window.location='#';</script>";
            // exit();
        } else {
            if ($ukuran_ijazah > 15000000) { // 15 MB dalam bytes
                echo "<script> alert('Ukuran file lebih dari 15 MB, data tidak dapat ditambahkan.'); window.history.back();</script>";
                // exit();
            }

            // Pindahkan file yang diunggah
            move_uploaded_file($lokasi_ijazah, '../../Penyimpanan/ijazah/' . $ijazah);
            $tambah_pendidikan = tambahRiwayatPendidikan($nip, $strata, $jurusan, $konsentrasi, $nama_kampus, $tahun_lulus, $ijazah);

          
            // exit();
        }
    }

    $jumlah_diklat = count($_POST['nama_diklat']);

    for ($d = 0; $d <= $jumlah_diklat - 1; $d++) {

        $jenis_diklat = $_POST['jenis_diklat'][$d];
        $nama_diklat = $_POST['nama_diklat'][$d];
        $tahun_diklat = $_POST['tahun_diklat'][$d];
        $jmlh_jam = $_POST['jmlh_jam'][$d];
        // FILE

        $lokasi_dok_diklat = $_FILES['dokumen_diklat']['tmp_name'][$d];
        $dokumen_diklat = $_FILES['dokumen_diklat']['name'][$d];
        $ukuran_dok_diklat = $_FILES['dokumen_diklat']['size'][$d];

        $allowed_extensions_diklat = array('pdf', 'PDF');
        $file_extension_diklat = pathinfo($_FILES['dokumen_diklat']['name'][$d], PATHINFO_EXTENSION);

        if (!in_array($file_extension_diklat, $allowed_extensions_diklat)) {
            echo "<script> alert('Format file Dokumen Diklat tidak valid. Hanya file PDF yang diizinkan.'); window.location='#';</script>";
            // exit();
        } else {
            if ($ukuran_dok_diklat > 15000000) { // 15 MB dalam bytes
                echo "<script> alert('Ukuran file lebih dari 15 MB, data tidak dapat ditambahkan.'); window.history.back();</script>";
                // exit();
            }

            // Pindahkan file yang diunggah
            move_uploaded_file($lokasi_dok_diklat, '../../Penyimpanan/sertifikat/' . $dokumen_diklat);
            $tambah_diklat = tambahRiwayatDiklat($nip, $jenis_diklat, $nama_diklat, $tahun_diklat, $jmlh_jam, $dokumen_diklat);
            // exit();
        }
    }

    $jumlah_mutasi = count($_POST['catatan_mutasi']);

    for ($m = 0; $m <= $jumlah_mutasi - 1; $m++) {

        $catatan_mutasi = $_POST['catatan_mutasi'][$m];
        // FILE
        $lokasi_dok_mutasi = $_FILES['dokumen_mutasi']['tmp_name'][$m];
        $dokumen_mutasi = $_FILES['dokumen_mutasi']['name'][$m];
        $ukuran_dok_mutasi = $_FILES['dokumen_mutasi']['size'][$m];

        $allowed_extensions_mutasi = array('pdf', 'PDF');
        $file_extension_mutasi = pathinfo($dokumen_mutasi, PATHINFO_EXTENSION);

        if (!in_array($file_extension_mutasi, $allowed_extensions_mutasi)) {
            echo "<script> alert('Format file dokumen mutasi tidak valid. Hanya file PDF yang diizinkan.');window.location='#';</script>";
            // exit();
        } else {
            if ($ukuran_dok_mutasi > 15000000) { // 15 MB dalam bytes
                echo "<script> alert('Ukuran file lebih dari 15 MB, data tidak dapat ditambahkan.'); window.history.back();</script>";
                // exit();
            }

            // Pindahkan file yang diunggah
            move_uploaded_file($lokasi_dok_mutasi, '../../Penyimpanan/sk/' . $dokumen_mutasi);
            $tambah_mutasi = tambahMutasi($nip, $catatan_mutasi, $dokumen_mutasi);
            // exit();
        }
    }



    if ($tambah_dapri || $tambah_pegawai || $tambah_pendidikan || $tambah_diklat || $tambah_mutasi > 0) {
        echo "<script> alert('Edit Data Berhasil'); window.location='../../contents/kepegawaian/data_pegawai.php';</script>";
    } else {
        echo "<script> alert('Edit Data Gagal'); window.history.back();</script>";
    }
}



?>