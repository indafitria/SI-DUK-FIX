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
    $nama_golongan = $_POST['nama_golongan'];
    $id_golongan = $_POST['id_golongan'];
    $tmt_gol = $_POST['tmt_golongan'];
    $nomor_sk_golongan = $_POST['nomor_sk_golongan'];
    $lokasi_sk_pangkat = $_FILES['sk_pangkat']['tmp_name'];
    $sk_pangkat = $_FILES['sk_pangkat']['name'];
    $ukuran_sk_pangkat = $_FILES['sk_pangkat']['size'];
    $jenis_sk_pangkat=$_POST['jenis_sk_pangkat'];


    $jab = $_POST['jabatan'];
    $id_bidang = $_POST['id_bidang'];
    $no_sk_jabatan = $_POST['nomor_sk_jabatan'];
    $tmt_jabatan = $_POST['tmt_jabatan'];
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



    if (empty($lokasi_foto) && empty($lokasi_sk) && empty($lokasi_ijazah) && empty($lokasi_sk_pangkat)) {

        $hasil_1 = ubahDataPribadi1($id_dapri, $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $usia, $email, $no_hp, $alamat, $agama);
        // $hasil_2 = ubahDataPegawai($nip, $id_bidang, $id_golongan, $status, $npwp, $tmt_gol, $jab, $tmt_jab, $no_sk_jabatan, $mkt, $mkb);

        $hasil_2 = ubahDataPegawai(
            $nip,
            $id_bidang,
            $id_golongan,
            $status,
            $npwp,
            $tmt_gol,
            $nomor_sk_golongan,
            $jab,
            $tmt_jabatan,
            $no_sk_jabatan,
            $mkt,
            $mkb
        );

        ubahDataPegawai($nip, $id_bidang, $id_golongan, $status, $npwp, $tmt_gol, $nomor_sk_golongan, $jab, $tmt_jabatan, $no_sk_jabatan, $mkt, $mkb);

        $hasil_4 = ubahDataRiwayatPendidikan1($nopnd, $strata, $jurusan, $konsentrasi, $nama_sklh, $thn_lulus);
    } else {

        if (!empty($lokasi_foto)) {

            if ($ukuran_foto > 15000000) { // 15 MB dalam bytes
                echo "<script> alert('Ukuran file lebih dari 15 MB, data tidak dapat ditambahkan.'); window.history.back();</script>";
                // exit();
            } else if ($ukuran_foto < 15000000) {
                move_uploaded_file($lokasi_foto, '../../Penyimpanan/foto/' . $foto);
                // Tambahkan data pribadi ke database dengan nama file yang baru
                $hasil_1 = ubahDataPribadi($id_dapri, $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $usia, $email, $no_hp, $foto, $alamat, $agama);
            }
        } else {
            $hasil_1 = ubahDataPribadi1($id_dapri, $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $usia, $email, $no_hp, $alamat, $agama);
        }
        $allowed_size = 15000000; // 15 MB dalam bytes

        if (
            (!empty($lokasi_sk) && $ukuran_sk > $allowed_size) ||
            (!empty($lokasi_sk_pangkat) && $ukuran_sk_pangkat > $allowed_size)
        ) {
            echo "<script> alert('Ukuran file lebih dari 15 MB, data tidak dapat ditambahkan.'); window.history.back();</script>";
            exit();
        } else {
            if (!empty($lokasi_sk) && !empty($lokasi_sk_pangkat)) {
                move_uploaded_file($lokasi_sk, '../../Penyimpanan/sk/' . $sk);
                move_uploaded_file($lokasi_sk_pangkat, '../../Penyimpanan/sk/' . $sk_pangkat);
        
                $hasil_2 = ubahDataPegawai1($nip, $id_bidang, $id_golongan, $status, $npwp, $tmt_gol, $nomor_sk_golongan, $sk_pangkat, $jab, $tmt_jab, $no_sk_jabatan, $sk, $mkt, $mkb);
                $hasil_3 = tambahMutasi($nip,$cttn_mutasi1,$no_sk_jabatan,$tmt_jabatan,$sk);
                $hasil_4 = tambahPangkat($nip, $jenis_sk_pangkat, $nama_golongan, $nomor_sk_golongan,  $tmt_gol,$sk_pangkat);
              
            } elseif (!empty($lokasi_sk) && empty($lokasi_sk_pangkat)) {
                move_uploaded_file($lokasi_sk, '../../Penyimpanan/sk/' . $sk);
                $hasil_2 = ubahDataPegawai2($nip, $id_bidang, $id_golongan, $status, $npwp, $tmt_gol, $nomor_sk_golongan, $jab, $tmt_jabatan, $no_sk_jabatan, $sk, $mkt, $mkb);
                $hasil_3 = tambahMutasi($nip,$cttn_mutasi1,$no_sk_jabatan,$tmt_jabatan,$sk);

            } elseif (empty($lokasi_sk) && !empty($lokasi_sk_pangkat)) {
                move_uploaded_file($lokasi_sk_pangkat, '../../Penyimpanan/sk/' . $sk_pangkat);
                $hasil_2 = ubahDataPegawai3($nip, $id_bidang, $id_golongan, $status, $npwp, $tmt_gol, $nomor_sk_golongan, $jab, $tmt_jabatan, $no_sk_jabatan, $sk, $mkt, $mkb);
                $hasil_3 = tambahPangkat($nip, $jenis_sk_pangkat, $nama_golongan, $nomor_sk_golongan,  $tmt_gol,$sk_pangkat);
            } else {
                $hasil_2 = ubahDataPegawai($nip, $id_bidang, $id_golongan, $status, $npwp, $tmt_gol, $jab, $tmt_jab, $no_sk_jabatan, $mkt, $mkb);
            }
        }
        



    if (!empty($lokasi_ijazah)) {
        if ($ukuran_ijazah > 15000000) { // 15 MB dalam bytes
            echo "<script> alert('Ukuran file lebih dari 15 MB, data tidak dapat ditambahkan.'); window.history.back();</script>";
            exit();
        } else if ($ukuran_ijazah < 15000000) {
            $allowed_extensions = array('pdf', 'PDF');
            $file_extension = pathinfo($ijazah, PATHINFO_EXTENSION);

            if (!in_array(strtolower($file_extension), $allowed_extensions)) {
                echo "<script> alert('Format file tidak valid. Hanya file PDFG yang diizinkan.'); window.history.back();</script>";
                exit();
            } else {
                move_uploaded_file($lokasi_ijazah, '../../Penyimpanan/ijazah/' . $ijazah);

                $hasil_5 = ubahDataRiwayatPendidikan($nopnd, $strata, $jurusan, $konsentrasi, $nama_sklh, $thn_lulus, $ijazah);
            }
        } else {
            $hasil_5 = ubahDataRiwayatPendidikan1($nopnd, $strata, $jurusan, $konsentrasi, $nama_sklh, $thn_lulus);
        }
    }
    }

}



if ($hasil_1 || $hasil_2 || $hasil_3 || $hasil_4 || $hasil_5  > 0) {
    echo "<script> alert('Edit Data Berhasil'); window.location='#';</script>";
} else {
    echo "<script> alert('Edit Data Gagal'); window.location='#';</script>";
}

?>



