<?php include '../sections/header.php';
include '../../config/koneksi.php';
include '../../function/fungsi.php';

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
  $jabatan = $_POST['jabatan'];
  $id_bidang = $_POST['id_bidang'];
  $tmt_jabatan = $_POST['tmt_jabatan'];
  $penempatan = $_POST['penempatan'];
  $jenis_sk = $_POST['jenis_sk'];
  $lokasi_sk = $_FILES['sk_jabatan']['tmp_name'];
  $sk = $_FILES['sk_jabatan']['name'];
  $ukuran_sk = $_FILES['sk_jabatan']['size'];
  $nomor_sk_jabatan = $_POST['nomor_sk_jabatan'];
  
  $id_gol = $_POST['id_golongan'];
  $nama_golongan = $_POST['nama_golongan'];
  $tmt_gol = $_POST['tmt_golongan'];
  $jenis_sk_pangkat = $_POST['jenis_sk_pangkat'];
  $nomor_sk_pangkat = $_POST['nomor_sk_pangkat'];
  $lokasi_sk_pangkat = $_FILES['sk_pangkat']['tmp_name'];
  $sk_pangkat = $_FILES['sk_pangkat']['name'];
  $ukuran_sk_pangkat = $_FILES['sk_pangkat']['size'];


  $masa_kerja_thn = $_POST['masa_kerja_tahun'];
  $masa_kerja_bln = $_POST['masa_kerja_bulan'];
  $jenis_diklat = $_POST['jenis_diklat'];
  $nama_diklat = $_POST['nama_diklat'];
  $tahun_diklat = $_POST['tahun_diklat'];
  $jmlh_jam = $_POST['jmlh_jam'];
  $lokasi_dokumen_diklat = $_FILES['dokumen_diklat']['tmp_name'];
  $dokumen_diklat = $_FILES['dokumen_diklat']['name'];
  $ukuran_dokumen_diklat = $_FILES['dokumen_diklat']['size'];
  $strata = $_POST['strata'];
  $jurusan = $_POST['jurusan'];
  $konsentrasi = $_POST['konsentrasi'];
  $nama_sklh = $_POST['nama_kampus'];
  $thn_lulus = $_POST['tahun_lulus'];
  $lokasi_ijazah = $_FILES['ijazah']['tmp_name'];
  $ijazah = $_FILES['ijazah']['name'];
  $ukuran_ijazah = $_FILES['ijazah']['size'];
  $cttn_mutasi1 = $jabatan . ' ' . $penempatan . ' ' . 'Dinas Komunikasi,Informatika,Persandian,dan Statistik Provinsi Kalimantan Tengah';
  $pegawai['catatan_mutasi'] = $cttn_mutasi1;
  $lokasi_dokumen = $_FILES['dokumen_mutasi']['tmp_name'];
  $dokumen = $_FILES['dokumen_mutasi']['name'];
  $ukuran_dokumen = $_FILES['dokumen_mutasi']['size'];
  $lokasi_foto = $_FILES['foto']['tmp_name'];
  $foto = $_FILES['foto']['name'];
  $ukuran_foto = $_FILES['foto']['size'];
  // $files = array($sk, $dokumen_diklat, $ijazah, $dokumen);
  $allowed_extensions1 = array("jpg", "jpeg", "png");
  $allowed_extensions2 = array("pdf"); // Sesuaikan dengan ekstensi yang diizinkan
  $allowed_extensions2 = array_map('strtolower', $allowed_extensions2);
  function is_valid_extension($file_extension, $allowed_extensions)
  {
    return in_array($file_extension, $allowed_extensions);
  }

  // Memeriksa file SK
  if ((is_string($sk) && !empty($sk) && !is_dir($sk)) ) {
    $file_extension = strtolower(pathinfo($sk, PATHINFO_EXTENSION));
    if (is_valid_extension($file_extension, $allowed_extensions2)) {
      // Melakukan penanganan jika file SK valid
    } else {
      echo "<script> alert('Format file SK Pangkat/Golongan tidak valid.');window.history.back();</script>";
      exit;
    }
  } else {
    echo "<script> alert('Format file SK Pangkat/Golongan tidak valid.');window.history.back();</script>";
    exit;
  }

  if ((is_string($sk_pangkat) && !empty($sk_pangkat) && !is_dir($sk_pangkat)) ) {
    $file_extension = strtolower(pathinfo($sk_pangkat, PATHINFO_EXTENSION));
    if (is_valid_extension($file_extension, $allowed_extensions2)) {
     
    } else {
      echo "<script> alert('Format file SK Pangkat/Golongan tidak valid.');window.history.back();</script>";
      exit;
    }
  } else {
    echo "<script> alert('Format file SK Pangkat/Golongan tidak valid.');window.history.back();</script>";
    exit;
  }


  $allowed_extensions1 = array("jpg", "jpeg", "png");
  
  // Memeriksa apakah ada file Foto yang diunggah
  if (is_string($foto) && !empty($foto) && !is_dir($foto)) {
      $file_extension = pathinfo($foto, PATHINFO_EXTENSION);
      if (is_valid_extension($file_extension, $allowed_extensions1)) {
          // Melakukan penanganan jika file Foto valid
          move_uploaded_file($lokasi_foto, '../../Penyimpanan/foto/' . $foto);
      } else {
          echo "<script> alert('Format file Foto tidak valid.');window.history.back();</script>";
          exit;
      }
  }
  
  // }
  move_uploaded_file($lokasi_foto, '../../Penyimpanan/foto/' . $foto);
  $hasil_tambah_data1 = tambahDataPribadi($nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $usia, $email, $no_hp, $foto, $alamat, $agama);

  move_uploaded_file($lokasi_sk, '../../Penyimpanan/sk/' . $sk);
  move_uploaded_file($lokasi_sk_pangkat, '../../Penyimpanan/sk/' . $sk_pangkat);
  $id_dapri = mysqli_insert_id($koneksi);

  $hasil_tambah2 = tambahDataPegawai($nip, $id_dapri, $id_bidang, $id_gol, $status, $npwp, $nama_golongan, $tmt_gol, $nomor_sk_pangkat, $sk_pangkat, $jabatan, $tmt_jabatan, $penempatan, $nomor_sk_jabatan, $sk, $masa_kerja_thn, $masa_kerja_bln);

  $hasil_tambah3 = tambahMutasi($nip,$cttn_mutasi1,$nomor_sk_jabatan,$tmt_jabatan,$sk);
  $hasil_tambah4 = tambahPangkat($nip,$jenis_sk_pangkat,$nama_golongan,$nomor_sk_pangkat,$tmt_gol,$sk_pangkat);





  foreach ($_POST['strata'] as $a => $value) {
    $strata = $_POST['strata'][$a];
    $jurusan = $_POST['jurusan'][$a];
    $konsentrasi = $_POST['konsentrasi'][$a];
    $nama_sklh = $_POST['nama_kampus'][$a];
    $thn_lulus = $_POST['tahun_lulus'][$a];
    $lokasi_ijazah = $_FILES['ijazah']['tmp_name'][$a];
    $ijazah = $_FILES['ijazah']['name'][$a];
    $ukuran_ijazah = $_FILES['ijazah']['size'][$a];
  
    $file_extension = strtolower(pathinfo($ijazah, PATHINFO_EXTENSION));
  
    // Memeriksa ekstensi file Ijazah
    if (is_valid_extension($file_extension, $allowed_extensions2)) {
      $destination = "../../Penyimpanan/ijazah/" . $ijazah;
      move_uploaded_file($lokasi_ijazah, $destination);
    
        $hasil_tambah5 = tambahRiwayatPendidikan($nip, $strata, $jurusan, $konsentrasi, $nama_sklh, $thn_lulus, $ijazah);
    }
  }
  

  foreach ($_POST['jenis_diklat'] as $b => $value) {
    $jenis_diklat = $_POST['jenis_diklat'][$b];
    $nama_diklat = $_POST['nama_diklat'][$b];
    $tahun_diklat = $_POST['tahun_diklat'][$b];
    $jmlh_jam = $_POST['jmlh_jam'][$b];
  
    $lokasi_dok_diklat = $_FILES['dokumen_diklat']['tmp_name'][$b];
    $dokumen_diklat = $_FILES['dokumen_diklat']['name'][$b];
    $ukuran_dok_diklat = $_FILES['dokumen_diklat']['size'][$b];

    $file_extension = strtolower(pathinfo($dokumen_diklat, PATHINFO_EXTENSION));
  
    // Memeriksa ekstensi file Dokumen Diklat
    if (is_valid_extension($file_extension, $allowed_extensions2)) {
      $destination = "../../Penyimpanan/sertifikat/" . $dokumen_diklat;
  
      if (move_uploaded_file($lokasi_dok_diklat, $destination)) {
  
        // Menambahkan data riwayat diklat
        $hasil_tambah6 = tambahRiwayatDiklat($nip, $jenis_diklat, $nama_diklat, $tahun_diklat, $jmlh_jam, $dokumen_diklat);
      } else {
        echo "Gagal mengunggah file Dokumen Diklat $dokumen_diklat.<br>";
      }
    } else {
      echo "Format file Dokumen Diklat $dokumen_diklat tidak valid.<br>";
    }
  }


  foreach ($_POST['catatan_mutasi'] as $c => $value) {
    $catatan_mutasi = $_POST['catatan_mutasi'][$c];
    $nomor_sk = $_POST['nomor_sk'][$c];
    $tmt_mutasi = $_POST['tmt_mutasi'][$c];
    $lokasi_dok_mutasi = $_FILES['dokumen_mutasi']['tmp_name'][$c];
    $dokumen_mutasi = $_FILES['dokumen_mutasi']['name'][$c];
    $ukuran_dok_mutasi = $_FILES['dokumen_mutasi']['size'][$c];
    
    $file_extension = strtolower(pathinfo($dokumen_mutasi, PATHINFO_EXTENSION));

    // Memeriksa ekstensi file Dokumen Mutasi
    if (in_array($file_extension, $allowed_extensions2)) {
        $destination = "../../Penyimpanan/sk/" . $dokumen_mutasi;

        if (move_uploaded_file($lokasi_dok_mutasi, $destination)) {
            // Menambahkan data riwayat mutasi
            $hasil_tambah7 = tambahMutasi($nip, $catatan_mutasi, $nomor_sk, $tmt_mutasi, $dokumen_mutasi);
        } else {
            echo "Gagal mengunggah file Dokumen Mutasi $dokumen_mutasi.<br>";
        }
    } else {
        echo "Format file Dokumen Mutasi $dokumen_mutasi tidak valid.<br>";
    }
}


 $jumlah_sk = count($_POST['jenis']);

 for ($d = 0; $d <= $jumlah_sk - 1; $d++) {
    $jenis_sk = $_POST['jenis'][$d];
    $keterangan = $_POST['keterangan'][$d];
    $nomor_sk = $_POST['nomor_sk'][$d];
    $tmt_sk = $_POST['tmt_sk'][$d];
    $lokasi_dok_sk = $_FILES['dokumen_sk']['tmp_name'][$d];
    $dokumen_sk = $_FILES['dokumen_sk']['name'][$d];
    $ukuran_dok_sk = $_FILES['dokumen_sk']['size'][$d];
    

    $file_extension = strtolower(pathinfo($dokumen_sk, PATHINFO_EXTENSION));
    // Memeriksa ekstensi file Dokumen Mutasi
    if (in_array($file_extension, $allowed_extensions2)) {
      $destination = "../../Penyimpanan/sk/" . $dokumen_sk;

      if (move_uploaded_file($lokasi_dok_sk, $destination)) {
          // Menambahkan data riwayat mutasi
          $hasil_tambah8 = tambahPangkat($nip, $jenis_sk, $keterangan, $nomor_sk, $tmt_sk, $dokumen_sk);
      } else {
          echo "Gagal mengunggah file Dokumen $dokumen_sk.<br>";
      }
  } else {
      echo "Format file Dokumen Mutasi $dokumen_sk tidak valid.<br>";
  }
  }

  if ( $hasil_tambah2 ||  $hasil_tambah3 ||  $hasil_tambah4 ||  $hasil_tambah5 ||  $hasil_tambah6 ||  $hasil_tambah7 ||  $hasil_tambah8 > 0) {
    echo "<script> alert('Tambah Data Berhasil'); window.location='data_pegawai.php';</script>";
} else {
    echo "<script> alert('Tambah Data Gagal'); window.history.back();</script>";
}



}

?>