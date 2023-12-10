<?php 
include('../config/koneksi.php');
?>

<?php
function tambahDataPribadi($nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $usia, $email, $no_hp, $foto)
{
    global $koneksi;

    $nama = htmlspecialchars($nama);
    $jenis_kelamin = htmlspecialchars($jenis_kelamin);
    $tempat_lahir = htmlspecialchars($tempat_lahir);
    $tanggal_lahir = htmlspecialchars($tanggal_lahir);
    $usia = htmlspecialchars($usia);
    $email = htmlspecialchars($email);
    $no_hp = htmlspecialchars($no_hp);

    $sql = "INSERT INTO data_pribadi (nama, jenis_kelamin, tempat_lahir, tanggal_lahir, usia, email, no_hp, foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssss", $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $usia, $email, $no_hp, $foto);
    if (mysqli_stmt_execute($stmt)) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        return -1; // Jika terjadi kesalahan saat menjalankan kueri
    }
}


function tambahDataPegawai($nip, $id_dapri, $id_bidang, $id_gol, $status, $npwp, $tmt_gol, $jabatan, $tmt_jabatan, $penempatan, $sk, $masa_kerja_thn, $masa_Kerja_bln)
{
    global $koneksi;

    // $nip = htmlspecialchars('nip');
    // $id_dapri = htmlspecialchars('id_data_pribadi');
    // $id_bidang = htmlspecialchars('id_bidang');
    // $id_gol = htmlspecialchars('id_golongan');
    // $status = htmlspecialchars('status');
    // $npwp = htmlspecialchars('npwp');
    // $jabatan = htmlspecialchars('jabatan');
    // $jabatan = htmlspecialchars('penempatan');
    // $masa_kerja_thn = htmlspecialchars('masa_kerja_tahun');
    // $masa_Kerja_bln = htmlspecialchars('masa_kerja_bulan');

    $sql = "INSERT INTO pegawai (nip,id_data_pribadi,id_bidang,id_golongan,status,
           npwp,tmt_golongan,jabatan,tmt_jabatan,penempatan,sk_jabatan,masa_kerja_tahun,masa_kerja_bulan) 
           VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";

    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "siiisssssssss", $nip, $id_dapri, $id_bidang, $id_gol, $status, $npwp, $tmt_gol, $jabatan, $tmt_jabatan, $penempatan, $sk, $masa_kerja_thn, $masa_Kerja_bln);
    if (mysqli_stmt_execute($stmt)) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        return -1; // Jika terjadi kesalahan saat menjalankan kueri
    }
}

function tambahRiwayatPendidikan($nip, $strata, $jurusan, $konsentrasi, $nama_kampus, $tahun_lulus, $ijazah)
{
    global $koneksi;

    // Hapus pemanggilan htmlspecialchars yang tidak perlu di sini
    $sql = "INSERT INTO riwayat_pendidikan (nip, strata, jurusan, konsentrasi, nama_kampus, tahun_lulus, ijazah) VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt) { // Memeriksa apakah persiapan berhasil
        // Tipe data dari masing-masing parameter yang diikat
        $types = "sssssss";

        // Mengikat parameter ke pernyataan SQL
        mysqli_stmt_bind_param($stmt, $types, $nip, $strata, $jurusan, $konsentrasi, $nama_kampus, $tahun_lulus, $ijazah);

        if (mysqli_stmt_execute($stmt)) {
            return mysqli_stmt_affected_rows($stmt);
        } else {
            return -1; // Jika terjadi kesalahan saat menjalankan kueri
        }
    } else {
        return -1; // Jika persiapan gagal
    }
}

function tambahRiwayatDiklat($nip, $jenis_diklat, $nama_diklat, $tahun_diklat, $jmlh_jam, $dokumen_diklat)
{
    global $koneksi;


    $sql = "INSERT INTO riwayat_diklat (nip,jenis_diklat,nama_diklat,tahun_diklat,jmlh_jam,dokumen_diklat) VALUES
            (?,?,?,?,?,?)";

    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "ssssss", $nip, $jenis_diklat, $nama_diklat, $tahun_diklat, $jmlh_jam, $dokumen_diklat);
    if (mysqli_stmt_execute($stmt)) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        return -1;
    }
}

function tambahMutasi($nip, $catatan, $dokumen)
{
    global $koneksi;

    $sql = "INSERT INTO riwayat_mutasi (nip, catatan_mutasi, dokumen_mutasi) VALUES (?, ?, ?)";

    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $nip, $catatan, $dokumen);

    if (mysqli_stmt_execute($stmt)) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        return -1;
    }
}

function hapusDataPegawai($NIP){
    global $koneksi;

    // Menghindari SQL Injection dengan prepared statement
    $sql = "DELETE FROM pegawai WHERE nip = ?";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $NIP);

    if (mysqli_stmt_execute($stmt)) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        return -1; // Jika terjadi kesalahan saat menjalankan kueri
    }
  
}



//  2
function hapusDataPribadi($id_dapri){
    global $koneksi;

    $sql = "DELETE FROM data_pribadi WHERE id_data_pribadi = ?";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id_dapri);

    if (mysqli_stmt_execute($stmt)) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        return -1; // Jika terjadi kesalahan saat menjalankan kueri
    }

}




// 3
function hapusRiwayatDiklat($id_diklat){
    global $koneksi;

    $sql = "DELETE FROM riwayat_diklat WHERE id_diklat = ?";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, 's', $id_diklat);

    if (mysqli_stmt_execute($stmt)) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        return -1; // Jika terjadi kesalahan saat menjalankan kueri
    }

}


// 4
function hapusRiwayatPendidikan($no_pnd){
    global $koneksi;

    $sql = "DELETE FROM riwayat_pendidikan WHERE no_pnd = ?";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, 's', $no_pnd);

    if (mysqli_stmt_execute($stmt)) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        return -1; // Jika terjadi kesalahan saat menjalankan kueri
    }

}



// 5
function hapusRiwayatMutasi($no_mtsi){
    global $koneksi;

    $sql = "DELETE FROM riwayat_mutasi WHERE no_mtsi = ?";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, 's', $no_mtsi);

    if (mysqli_stmt_execute($stmt)) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        return -1; // Jika terjadi kesalahan saat menjalankan kueri
    }

}
// 6
function ubahDataPribadi($id_dapri, $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $usia, $email, $no_hp, $foto, $alamat, $agama) {
    global $koneksi;

    $sql = "UPDATE data_pribadi
            SET nama = ?, jenis_kelamin = ?, tempat_lahir = ?, tanggal_lahir = ?, usia = ?, email = ?, no_hp = ?, foto = ?, alamat = ?, agama = ?
            WHERE id_data_pribadi = ?";

    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssssssi", $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $usia, $email, $no_hp, $foto, $alamat,$agama,$id_dapri);

    if (mysqli_stmt_execute($stmt)) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        return -1; // Jika terjadi kesalahan saat menjalankan kueri
    }
}

function ubahDataPribadi1($id_dapri, $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $usia, $email, $no_hp, $alamat, $agama) {
    global $koneksi;

    $sql = "UPDATE data_pribadi
            SET nama = ?, jenis_kelamin = ?, tempat_lahir = ?, tanggal_lahir = ?, usia = ?, email = ?, no_hp = ?, alamat = ?, agama = ?
            WHERE id_data_pribadi = ?";

    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "sssssssssi", $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $usia, $email, $no_hp, $alamat, $agama, $id_dapri);

    if (mysqli_stmt_execute($stmt)) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        return -1; // Jika terjadi kesalahan saat menjalankan kueri
    }
}

function ubahDataPegawai($nip,$id_dapri,$id_bidang,$id_golongan,$status, $npwp, $tmt_golongan, $jabatan, $tmt_jabatan, $masa_kerja_tahun,$masa_kerja_bulan){
    global $koneksi;

    $sql = "UPDATE pegawai
            SET id_data_pribadi= ?, id_bidang = ?, id_golongan = ?, status = ?, npwp = ?, tmt_golongan = ?, jabatan = ?, tmt_jabatan = ?, masa_kerja_tahun = ?, masa_kerja_bulan = ?
            WHERE nip = ?";

    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "sssssssssi", $id_dapri, $id_bidang,$id_golongan,$status, $npwp, $tmt_golongan, $jabatan, $tmt_jabatan, $masa_kerja_tahun,$masa_kerja_bulan, $nip);

    if (mysqli_stmt_execute($stmt)) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        return -1; // Jika terjadi kesalahan saat menjalankan kueri
    }
}

function ubahDataPegawai1($nip,$id_dapri,$id_bidang,$id_golongan,$status, $npwp, $tmt_golongan, $jabatan, $tmt_jabatan, $sk, $masa_kerja_tahun,$masa_kerja_bulan){
    global $koneksi;

    $sql = "UPDATE pegawai
            SET id_data_pribadi = ? , id_bidang = ?, id_golongan = ?, status = ?, npwp = ?, tmt_golongan = ?, jabatan = ?, tmt_jabatan = ?, sk_jabatan = ?, masa_kerja_tahun = ?, masa_kerja_bulan = ?
            WHERE nip = ?";

    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssssssi",$id_dapri, $id_bidang,$id_golongan,$status, $npwp, $tmt_golongan, $jabatan, $tmt_jabatan,$sk, $masa_kerja_tahun,$masa_kerja_bulan, $nip);

    if (mysqli_stmt_execute($stmt)) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        return -1; // Jika terjadi kesalahan saat menjalankan kueri
    }
}

function ubahDataRiwayatPendidikan($no_pnd, $strata, $jurusan, $konsentrasi, $nama_kampus, $tahun_lulus, $ijazah){
    global $koneksi;

    $sql = "UPDATE riwayat_pendidikan
            SET strata = ?, jurusan = ?, konsentrasi = ?, nama_kampus = ?, tahun_lulus = ?, ijazah = ? 
            WHERE no_pnd = ?";

    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssi", $strata, $jurusan, $konsentrasi, $nama_kampus, $tahun_lulus, $ijazah, $no_pnd);

    if (mysqli_stmt_execute($stmt)) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        return -1; // Jika terjadi kesalahan saat menjalankan kueri
    }
}

function ubahDataRiwayatPendidikan1($no_pnd, $strata, $jurusan, $konsentrasi, $nama_kampus, $tahun_lulus){
    global $koneksi;

    $sql = "UPDATE riwayat_pendidikan
            SET strata = ?, jurusan = ?, konsentrasi = ?, nama_kampus = ?, tahun_lulus = ?
            WHERE no_pnd = ?";

    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "sssssi", $strata, $jurusan, $konsentrasi, $nama_kampus, $tahun_lulus, $no_pnd);

    if (mysqli_stmt_execute($stmt)) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        return -1; // Jika terjadi kesalahan saat menjalankan kueri
    }
}

function ubahDataRiwayatDiklat($id_diklat,$jenis_diklat,$nama_diklat,$tahun_diklat,$jmlh_jam,$dokumen_diklat){
    global $koneksi;

    $sql = "UPDATE riwayat_diklat
            SET jenis_diklat = ?, nama_diklat = ?, tahun_diklat = ?, jmlh_jam = ?, dokumen_diklat = ?
            WHERE id_diklat = ?";

    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "ssssbi",$jenis_diklat,$nama_diklat,$tahun_diklat,$jmlh_jam,$dokumen_diklat,$id_diklat);

    if (mysqli_stmt_execute($stmt)) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        return -1; // Jika terjadi kesalahan saat menjalankan kueri
    }
}

function ubahDataRiwayatDiklat1($id_diklat,$jenis_diklat,$nama_diklat,$tahun_diklat,$jmlh_jam){
    global $koneksi;

    $sql = "UPDATE riwayat_diklat
            SET jenis_diklat = ?, nama_diklat = ?, tahun_diklat = ?, jmlh_jam = ? WHERE id_diklat = ?";

    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "ssssi",$jenis_diklat,$nama_diklat,$tahun_diklat,$jmldfh_jam,$id_diklat);

    if (mysqli_stmt_execute($stmt)) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        return -1; // Jika terjadi kesalahan saat menjalankan kueri
    }
}


function ubahDataRiwayatMutasi($no_mtsi,$catatan_mutasi,$waktu_mutasi,$dokumen){
    global $koneksi;

    $sql = "UPDATE riwayat_mutasi
            SET catatan_mutasi = ?, waktu_mutasi = ?, dokumen = ?
            WHERE no_mtsi = ?";

    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "sssi",$catatan_mutasi,$waktu_mutasi,$dokumen,$no_mtsi);

    if (mysqli_stmt_execute($stmt)) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        return -1; // Jika terjadi kesalahan saat menjalankan kueri
    }
}

function ubahDataRiwayatMutasi1($no_mtsi,$catatan_mutasi,$waktu_mutasi){
    global $koneksi;

    $sql = "UPDATE riwayat_mutasi
            SET catatan_mutasi = ?, waktu_mutasi = ?
            WHERE no_mtsi = ?";

    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "ssi",$catatan_mutasi,$waktu_mutasi, $no_mtsi);

    if (mysqli_stmt_execute($stmt)) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        return -1; // Jika terjadi kesalahan saat menjalankan kueri
    }
}


 
?>