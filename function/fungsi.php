<?php
include(__DIR__ . '/../config/koneksi.php');
// include (__DIR__.'../assets/PHPMailer-master/src/PHPMailer.php');
// include (__DIR__.'../assets/PHPMailer-master/src/SMTP.php');
// include (__DIR__.'../assets/PHPMailer-master/src/Exception.php'); 

// require_once '../assets/PHPMailer-master/src/PHPMailer.php';
// require_once '../assets/PHPMailer-master/src/SMTP.php';
// require_once '../assets/PHPMailer-master/src/Exception.php';
require_once(__DIR__ . '/../assets/PHPMailer-master/src/PHPMailer.php');
require_once(__DIR__ . '/../assets/PHPMailer-master/src/SMTP.php');
require_once(__DIR__ . '/../assets/PHPMailer-master/src/Exception.php');


?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

function login($username, $password)
{

    global $koneksi;

    $username = mysqli_real_escape_string($koneksi, $username);
    $password = md5($password);

    // Mencari pengguna berdasarkan username
    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);
    $ketemu = mysqli_num_rows($result);

    // Mencari pengguna berdasarkan password
    $query2 = "SELECT * FROM user WHERE pass = '$password'";
    $result2 = mysqli_query($koneksi, $query2);
    $ketemu2 = mysqli_num_rows($result2);

    // Mencari pengguna berdasarkan username dan password
    $query3 = "SELECT * FROM user WHERE username = '$username' AND pass = '$password'";
    $result3 = mysqli_query($koneksi, $query3);
    $ketemu3 = mysqli_num_rows($result3);

    if ($ketemu3 == 1) {
        $row = mysqli_fetch_assoc($result3);
        // Detail sesi loginnya
        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['pass'] = $row['pass'];

        // Login berhasil

        echo "<script>
        window.location = '../contents/kepegawaian/home.php';</script>";
    } else if ($ketemu3 != 1 && $ketemu == 0 && $ketemu2 == 0) {
        // Menampilkan pesan gagal jika belum memasukkan username dan password
        echo "<script>alert('Username dan Password anda tidak valid ! Mohon periksa kembali.');
        window.history.back();</script>";
    } else if ($ketemu3 != 1 && $ketemu == 0) {
        // Menampilkan pesan gagal jika username salah
        echo "<script>alert('Username anda tidak valid ! Mohon periksa kembali.');
        window.history.back();</script>";
    } else if ($ketemu3 != 1 && $ketemu2 == 0) {
        // Menampilkan pesan gagal jika password salah
        echo "<script>alert('Password anda tidak valid ! Mohon periksa kembali.');
        window.history.back();</script>";
    } else {
        // Menampilkan pesan gagal jika login gagal
        echo "<script>alert('LOGIN GAGAL! Mohon Periksa kembali Username dan Password Anda.');
        window.history.back();</script>";
    }
}

function generateRandomCode()
{
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $code = '';
    $length = 5; // Panjang kode yang diinginkan
    for ($i = 0; $i < $length; $i++) {
        $code .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $code;
}

// Fungsi untuk mengirim email reset password
use PHPMailer\PHPMailer\PHPMailer;

function lupaPass($email)
{
    global $koneksi;
    $email = htmlspecialchars($email);
    $query = "SELECT * FROM user WHERE email = '$email'";
    $hasil = mysqli_query($koneksi, $query);
    $ketemu = mysqli_num_rows($hasil);

    if ($ketemu === 1) {
        $row = mysqli_fetch_assoc($hasil);

        // Generate kode acak
        $resetCode = generateRandomCode();

        // Update reset_token ke dalam tabel user
        $updateQuery = "UPDATE user SET reset_token = '$resetCode' WHERE email = '$email'";
        $updateResult = mysqli_query($koneksi, $updateQuery);

        if ($updateResult) {
            // Mengirim kode reset password melalui email
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = '2021.diskominfo@gmail.com'; // Gantilah dengan alamat email pengirim yang sesuai
            $mail->Password = 'jdmdqjlrzlyyxfni'; // Gantilah dengan kata sandi email pengirim yang sesuai
            $mail->Port = 587;
            $mail->setFrom('2021.diskominfo@gmail.com', 'SI-DUK');
            $mail->addAddress($email);
            $mail->Subject = 'Berikut ini kode terbaru anda';
            $mail->Body = 'Kode reset password: ' . $resetCode;

            if ($mail->send()) {
                echo "<script>alert('Email Ditemukan! Silahkan Cek Kode Verifikasi di Email Anda'); 
                window.location = '../contents/verifikasi_kode.php';</script>";
            } else {
                echo 'Email gagal terkirim: ' . $mail->ErrorInfo;
            }
        } else {
            echo 'Gagal mengupdate reset token';
        }
    } else if ($ketemu == 0) {
        echo "<script>alert('Email anda tidak terdaftar ! Silahkan Masukan Kembali.');
        window.history.back();</script>";
    }
}



function verifikasiToken($reset_token)
{
    global $koneksi;

    $reset_token = htmlspecialchars($reset_token);
    $query = "SELECT * FROM user WHERE reset_token = '$reset_token'";
    $hasil = mysqli_query($koneksi, $query);

    if ($hasil) {
        $ketemu = mysqli_num_rows($hasil);

        if ($ketemu == 1) {
            $row = mysqli_fetch_assoc($hasil);
            return $row;
        }
    }

    return false; // Token tidak valid atau tidak ditemukan
}


function password_baru($email, $pass_baru, $konfirmasi_password)
{

    global $koneksi;

    $email = htmlspecialchars($email);
    $pass_baru = htmlspecialchars($pass_baru);
    $konfirmasi_password = htmlspecialchars($konfirmasi_password);

    if ($pass_baru === $konfirmasi_password) {
        $pass = md5($pass_baru);
        $query = "UPDATE user SET pass = '$pass', reset_token = '' WHERE email = '$email' ";
        $hasil = mysqli_query($koneksi, $query);
        if ($hasil) {
            return mysqli_affected_rows($koneksi);
            echo "<script>alert('Password Anda Berhasil Diganti! Silahkan Login Menggunakan Password Anda yang Baru'); 
            window.location = '../content/login.php';</script>";
        } else {
            return -1; // Jika terjadi kesalahan saat menjalankan kueri
        }
    } else {
        echo "<script>alert('Password Baru dan Konfirmasi Password Tidak Sama! Silahkan Masukan Ulang!'); 
        window.history.back();</script>";
    }
}

function ubahPassword($id_user, $password)
{

    global $koneksi;

    $query = "UPDATE user SET pass = '$password' WHERE id_user = $id_user";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        return true; // Kata sandi berhasil diubah
    } else {
        return false; // Terjadi kesalahan saat mengubah kata sandi
    }
}


function detailPegawai($nip)
{
    global $koneksi;

    $query = "SELECT * FROM pegawai 
              JOIN data_pribadi ON pegawai.id_data_pribadi = data_pribadi.id_data_pribadi
              JOIN golongan ON pegawai.id_golongan = golongan.id_golongan
              JOIN data_bidang ON pegawai.id_bidang = data_bidang.id_bidang 
              WHERE pegawai.nip = ?";

    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "s", $nip);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        // Handle kesalahan eksekusi query, misalnya:
        // throw new Exception(mysqli_error($koneksi));
        return null;
    }

    // Ambil satu baris data pegawai sebagai array asosiatif
    $row = mysqli_fetch_assoc($result);

    // Bebaskan sumber daya statement
    mysqli_stmt_close($stmt);

    return $row;
}

function detaildiklatTeknis($nip)
{
    global $koneksi;

    $query = "SELECT * FROM riwayat_diklat JOIN pegawai ON riwayat_diklat.nip = pegawai.nip WHERE riwayat_diklat.nip = '?' AND jenis_diklat = 'teknis'";

    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "s", $nip);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        // Handle kesalahan eksekusi query, misalnya:
        // throw new Exception(mysqli_error($koneksi));
        return null;
    }

    // Ambil satu baris data pegawai sebagai array asosiatif
    $row = mysqli_fetch_assoc($result);

    // Bebaskan sumber daya statement
    mysqli_stmt_close($stmt);

    return $row;
}

function tambahDataPribadi($nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $usia, $email, $no_hp, $foto, $alamat, $agama)
{
    global $koneksi;


    $nama = htmlspecialchars($nama);
    $jenis_kelamin = htmlspecialchars($jenis_kelamin);
    $tempat_lahir = htmlspecialchars($tempat_lahir);
    $tanggal_lahir = htmlspecialchars($tanggal_lahir);
    // $usia = htmlspecialchars($usia);
    $email = htmlspecialchars($email);
    $no_hp = htmlspecialchars($no_hp);
    $alamat = htmlspecialchars($alamat);
    $agama = htmlspecialchars($agama);

    $sql = "INSERT INTO data_pribadi (nama, jenis_kelamin, tempat_lahir, tanggal_lahir, usia, email, no_hp, foto, alamat, agama) VALUES ( ?, ?, ?, ?, ?, ?, ?,?,?,?)";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssssss", $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $usia, $email, $no_hp, $foto, $alamat, $agama);
    if (mysqli_stmt_execute($stmt)) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        return -1; // Jika terjadi kesalahan saat menjalankan kueri
    }
}

function tambahDataPegawai($nip, $id_dapri, $id_bidang, $id_gol, $status, $npwp, $nama_golongan, $tmt_gol, $nomor_sk_gol, $sk_pangkat, $jabatan, $tmt_jabatan, $penempatan, $nomor_sk_jabatan, $sk, $masa_kerja_thn, $masa_kerja_bln)
{
    global $koneksi;

    $sql = "INSERT INTO pegawai (nip,
    id_data_pribadi,
    id_bidang,
    id_golongan,
    status,
    npwp,
    nama_golongan,
    tmt_golongan,
    nomor_sk_golongan,
    sk_pangkat,
    jabatan,
    tmt_jabatan,
    penempatan,
    nomor_sk_jabatan,
    sk_jabatan,
    masa_kerja_tahun,
    masa_kerja_bulan) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "iiiisssssssssssii", $nip, $id_dapri, $id_bidang, $id_gol, $status, $npwp, $nama_golongan, $tmt_gol, $nomor_sk_gol, $sk_pangkat, $jabatan, $tmt_jabatan, $penempatan, $nomor_sk_jabatan, $sk, $masa_kerja_thn, $masa_kerja_bln);

    if (mysqli_stmt_execute($stmt)) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        return -1; // Return -1 if there's an error executing the query
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

function tambahMutasi($nip, $catatan, $nomor_sk, $tmt, $dokumen)
{
    global $koneksi;

    $sql = "INSERT INTO riwayat_mutasi (nip, catatan_mutasi, nomor_sk, tmt_mutasi, dokumen_mutasi) VALUES (?, ?, ?,?,?)";

    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "sssss", $nip, $catatan, $nomor_sk, $tmt, $dokumen);

    if (mysqli_stmt_execute($stmt)) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        return -1;
    }
}


function tambahPangkat($nip, $jenis_sk, $keterangan ,$nomor_sk, $tmt_sk, $dokumen_sk)
{
    global $koneksi;

    $sql = "INSERT INTO riwayat_pangkat (nip, jenis_sk, keterangan,nomor_sk, tmt_sk, dokumen_sk) VALUES (?, ?,?,?,?,?)";

    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "isssss",$nip, $jenis_sk, $keterangan ,$nomor_sk, $tmt_sk, $dokumen_sk);

    if (mysqli_stmt_execute($stmt)) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        return -1;
    }
}


function tambah_user($nama, $email, $username,$pass,$level)
{
    global $koneksi;


    $nama = htmlspecialchars($nama);
    $email = htmlspecialchars($email);
    $username = htmlspecialchars($username);
    $pass = htmlspecialchars($pass);
    $level = htmlspecialchars($level);
    $reset_pass = " ";

    $sql = "INSERT INTO user (nama, email, username, pass, level, reset_token) VALUES ( ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "ssssis", $nama, $email, $username,$pass,$level,$reset_pass);
    if (mysqli_stmt_execute($stmt)) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        return -1; // Jika terjadi kesalahan saat menjalankan kueri
    }
}


function hapusDataPegawai($NIP)
{
    global $koneksi;

    // Menghindari SQL Injection dengan prepared statement
    $sql = "DELETE FROM pegawai WHERE nip = ?";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, 's', $NIP);

    if (mysqli_stmt_execute($stmt)) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        return -1; // Jika terjadi kesalahan saat menjalankan kueri
    }
}

function hapus_pangkat($id_sk)
{
    global $koneksi;

    // Menghindari SQL Injection dengan prepared statement
    $sql = "DELETE FROM riwayat_pangkat WHERE id_sk = ?";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id_sk);

    if (mysqli_stmt_execute($stmt)) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        return -1; // Jika terjadi kesalahan saat menjalankan kueri
    }
}


//  2
function hapusDataPribadi($id_dapri)
{
    global $koneksi;

    $sql = "DELETE FROM data_pribadi WHERE id_data_pribadi = ?";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, 's', $id_dapri);

    if (mysqli_stmt_execute($stmt)) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        return -1; // Jika terjadi kesalahan saat menjalankan kueri
    }
}



// 3
function hapusRiwayatDiklat($id_diklat)
{
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
function hapusRiwayatPendidikan($no_pnd)
{
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
function hapusRiwayatMutasi($no_mtsi)
{
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
function hapusUser($id_user)
{
    global $koneksi;

    $sql = "DELETE FROM user WHERE id_user = ?";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id_user);

    if (mysqli_stmt_execute($stmt)) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        return -1; // Jika terjadi kesalahan saat menjalankan kueri
    }
}


function resetPassUser($id_user)
{
    global $koneksi;

    // Periksa apakah password saat ini sudah '12345'
    $cari = mysqli_query($koneksi, "SELECT pass FROM user WHERE id_user = '$id_user'");
    $hasil_cari = mysqli_fetch_array($cari);

    $current_password = $hasil_cari['pass'];
    $init = '12345';
    $reset_pass = md5($init);

    if ($current_password === $reset_pass) {
        echo "<script>alert('Password sudah direset ke 12345 sebelumnya!'); window.history.back();</script>";
        return 0; // Tidak ada perubahan
    } else {
        // Lanjutkan dengan mengubah password
        $sql = "UPDATE user SET pass = ? WHERE id_user = ?";
        $stmt = mysqli_prepare($koneksi, $sql);
        mysqli_stmt_bind_param($stmt, "si", $reset_pass, $id_user);

        if (mysqli_stmt_execute($stmt)) {
            
            return mysqli_stmt_affected_rows($stmt);
        } else {
            return -1; // Jika terjadi kesalahan saat menjalankan kueri
        }
    }
}


function ubahDataPribadi($id_dapri, $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $usia, $email, $no_hp, $foto, $alamat, $agama)
{
    global $koneksi;

    $sql = "UPDATE data_pribadi
            SET nama = ?, jenis_kelamin = ?, tempat_lahir = ?, tanggal_lahir = ?, usia = ?, email = ?, no_hp = ?, foto = ?, alamat = ?, agama = ?
            WHERE id_data_pribadi = ?";

    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "ssssdsssssi", $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $usia, $email, $no_hp, $foto, $alamat, $agama, $id_dapri);

    if (mysqli_stmt_execute($stmt)) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        return -1; // Jika terjadi kesalahan saat menjalankan kueri
    }
}

function ubahDataPribadi1($id_dapri, $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $usia, $email, $no_hp, $alamat, $agama)
{
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


function ubahSK($id_sk, $jenis_sk, $keterangan, $nomor_sk, $tmt_sk, $dokumen_sk)
{
    global $koneksi;

    $sql = "UPDATE riwayat_pangkat
            SET jenis_sk = ?, keterangan = ? ,nomor_sk = ? ,tmt_sk = ?, dokumen_sk = ?
            WHERE id_sk = ?";

    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "sssssi", $jenis_sk, $keterangan ,$nomor_sk, $tmt_sk, $dokumen_sk, $id_sk);

    if (mysqli_stmt_execute($stmt)) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        return -1; // Jika terjadi kesalahan saat menjalankan kueri
    }
}

function ubahSK1($id_sk, $jenis_sk, $keterangan ,$nomor_sk, $tmt_sk)
{
    global $koneksi;

    $sql = "UPDATE riwayat_pangkat
            SET jenis_sk = ?, keterangan = ?, nomor_sk = ? ,tmt_sk = ?
            WHERE id_sk = ?";

    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "ssssi", $jenis_sk, $keterangan ,$nomor_sk, $tmt_sk, $id_sk);

    if (mysqli_stmt_execute($stmt)) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        return -1; // Jika terjadi kesalahan saat menjalankan kueri
    }
}



function ubahDataPegawai($nip, $id_bidang, $id_golongan, $status, $npwp, $tmt_golongan, $nomor_sk_gol, $jabatan, $tmt_jabatan, $nomor_sk_jabatan, $masa_kerja_tahun, $masa_kerja_bulan)
{
    global $koneksi;

    $sql = "UPDATE pegawai
            SET id_bidang = ?, id_golongan = ?, status = ?, npwp = ?, tmt_golongan = ?, nomor_sk_golongan = ? ,jabatan = ?, tmt_jabatan = ?, nomor_sk_jabatan = ? , masa_kerja_tahun = ?, masa_kerja_bulan = ?
            WHERE nip = ?";

    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "iisisssssssi", $id_bidang, $id_golongan, $status, $npwp, $tmt_golongan, $nomor_sk_gol ,$jabatan, $tmt_jabatan, $nomor_sk_jabatan, $masa_kerja_tahun, $masa_kerja_bulan, $nip);

    //  $request = $_REQUEST;



    if (mysqli_stmt_execute($stmt)) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        return -1; // Jika terjadi kesalahan saat menjalankan kueri
    }
}

function ubahDataPegawai1($nip, $id_bidang, $id_golongan, $status, $npwp, $tmt_golongan, $nomor_sk_gol, $sk_pangkat, $jabatan, $tmt_jabatan, $nomor_sk_jabatan, $sk, $masa_kerja_tahun, $masa_kerja_bulan)
{
    global $koneksi;

    $sql = "UPDATE pegawai
            SET id_bidang = ?, id_golongan = ?, status = ?, npwp = ?, tmt_golongan = ?, nomor_sk_golongan = ?, sk_pangkat = ?, jabatan = ?, tmt_jabatan = ?, nomor_sk_jabatan = ?, sk_jabatan = ?, masa_kerja_tahun = ?, masa_kerja_bulan = ?
            WHERE nip = ?";

    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "iisisssssssssi", $id_bidang, $id_golongan, $status, $npwp, $tmt_golongan, $nomor_sk_gol, $sk_pangkat, $jabatan, $tmt_jabatan, $nomor_sk_jabatan, $sk, $masa_kerja_tahun, $masa_kerja_bulan, $nip);

    if (mysqli_stmt_execute($stmt)) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        return -1; // Return -1 if there's an error executing the query
    }
}



function ubahDataPegawai2($nip, $id_bidang, $id_golongan, $status, $npwp, $tmt_golongan, $nomor_sk_gol, $sk_pangkat, $jabatan, $tmt_jabatan, $nomor_sk_jabatan, $masa_kerja_tahun, $masa_kerja_bulan)
{
    global $koneksi;

    $sql = "UPDATE pegawai
            SET id_bidang = ?, id_golongan = ?, status = ?, npwp = ?, tmt_golongan = ?, nomor_sk_golongan = ?, sk_pangkat = ?, jabatan = ?, tmt_jabatan = ?, nomor_sk_jabatan = ?, masa_kerja_tahun = ?, masa_kerja_bulan = ?
            WHERE nip = ?";

    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "iisissssssssi", $id_bidang, $id_golongan, $status, $npwp, $tmt_golongan, $nomor_sk_gol, $sk_pangkat, $jabatan, $tmt_jabatan, $nomor_sk_jabatan,$masa_kerja_tahun, $masa_kerja_bulan, $nip);

    if (mysqli_stmt_execute($stmt)) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        return -1; // Return -1 if there's an error executing the query
    }
}


function ubahDataPegawai3($nip, $id_bidang, $id_golongan, $status, $npwp, $tmt_golongan, $nomor_sk_gol, $jabatan, $tmt_jabatan, $nomor_sk_jabatan, $sk, $masa_kerja_tahun, $masa_kerja_bulan)
{
    global $koneksi;

    $sql = "UPDATE pegawai
            SET id_bidang = ?, id_golongan = ?, status = ?, npwp = ?, tmt_golongan = ?, nomor_sk_golongan = ?, jabatan = ?, tmt_jabatan = ?, nomor_sk_jabatan = ?, sk_jabatan = ?, masa_kerja_tahun = ?, masa_kerja_bulan = ?
            WHERE nip = ?";

    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "iisissssssssi", $id_bidang, $id_golongan, $status, $npwp, $tmt_golongan, $nomor_sk_gol, $jabatan, $tmt_jabatan, $nomor_sk_jabatan, $sk, $masa_kerja_tahun, $masa_kerja_bulan, $nip);

    if (mysqli_stmt_execute($stmt)) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        return -1; // Return -1 if there's an error executing the query
    }
}



function ubahDataRiwayatPendidikan($no_pnd, $strata, $jurusan, $konsentrasi, $nama_kampus, $tahun_lulus, $ijazah)
{
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

function ubahDataRiwayatPendidikan1($no_pnd, $strata, $jurusan, $konsentrasi, $nama_kampus, $tahun_lulus)
{
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

function ubahDataRiwayatDiklat($id_diklat, $jenis_diklat, $nama_diklat, $tahun_diklat, $jmlh_jam, $dokumen_diklat)
{
    global $koneksi;

    $sql = "UPDATE riwayat_diklat
            SET jenis_diklat = ?, nama_diklat = ?, tahun_diklat = ?, jmlh_jam = ?, dokumen_diklat = ?
            WHERE id_diklat = ?";

    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "sssssi", $jenis_diklat, $nama_diklat, $tahun_diklat, $jmlh_jam, $dokumen_diklat, $id_diklat);

    if (mysqli_stmt_execute($stmt)) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        return -1; // Jika terjadi kesalahan saat menjalankan kueri
    }
}

function ubahDataRiwayatDiklat1($id_diklat, $jenis_diklat, $nama_diklat, $tahun_diklat, $jmlh_jam)
{
    global $koneksi;

    $sql = "UPDATE riwayat_diklat
            SET jenis_diklat = ?, nama_diklat = ?, tahun_diklat = ?, jmlh_jam = ? WHERE id_diklat = ?";

    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "ssssi", $jenis_diklat, $nama_diklat, $tahun_diklat, $jmlh_jam, $id_diklat);

    if (mysqli_stmt_execute($stmt)) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        return -1; // Jika terjadi kesalahan saat menjalankan kueri
    }
}

function ubahDataRiwayatMutasi($no_mtsi, $catatan_mutasi, $nomor_sk,$tmt, $dokumen)
{
    global $koneksi;

    $sql = "UPDATE riwayat_mutasi
            SET catatan_mutasi = ?, nomor_sk = ? ,Tmt = ?, dokumen_mutasi = ?
            WHERE no_mtsi = ?";

    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "ssssi", $catatan_mutasi, $nomor_sk, $tmt, $dokumen, $no_mtsi);

    if (mysqli_stmt_execute($stmt)) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        return -1; // Jika terjadi kesalahan saat menjalankan kueri
    }
}

function ubahDataRiwayatMutasi1($no_mtsi, $catatan_mutasi, $nomor_sk , $tmt)
{
    global $koneksi;

    $sql = "UPDATE riwayat_mutasi
            SET catatan_mutasi = ?, nomor_sk = ? ,tmt_mutasi = ?
            WHERE no_mtsi = ?";

    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "sssi", $catatan_mutasi, $nomor_sk ,$tmt, $no_mtsi);

    if (mysqli_stmt_execute($stmt)) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        return -1; // Jika terjadi kesalahan saat menjalankan kueri
    }
}

function proses_edit_sarjana($no_pnd, $strata, $jurusan, $konsentrasi, $nama_kampus, $tahun_lulus, $lokasi_ijazah, $ijazah, $ukuran_ijazah)
{
    global $koneksi;

    if (empty($lokasi_ijazah)) {
        ubahDataRiwayatPendidikan1($no_pnd, $strata, $jurusan, $konsentrasi, $nama_kampus, $tahun_lulus);
    } else {
        // Validasi format file
        $allowed_extensions = array('pdf');
        $file_extension = pathinfo($ijazah, PATHINFO_EXTENSION);

        if (!in_array($file_extension, $allowed_extensions)) {
            echo "<script> alert('Format file tidak valid. Hanya file PDF yang diizinkan.'); window.history.back();</script>";
            exit();
        }

        // Validasi ukuran file
        if ($ukuran_ijazah > 15000000) { // 15 MB dalam bytes
            echo "<script> alert('Ukuran file lebih dari 15 MB, data tidak dapat ditambahkan.'); window.history.back();</script>";
            exit();
        } else {
            // Generate a unique filename to avoid overwriting
            // Pindahkan file yang diunggah
            move_uploaded_file($lokasi_ijazah, '../../Penyimpanan/sertifikat/' . $ijazah);

            // Tambahkan data diklat ke database dengan nama file yang baru
            ubahDataRiwayatPendidikan($no_pnd, $strata, $jurusan, $konsentrasi, $nama_kampus, $tahun_lulus, $ijazah);
        }
    }

    return mysqli_affected_rows($koneksi);
}





// FUNGSI MENAMPILKAN JUMLAH

function jumlah_pegawai()
{
    global $koneksi;

    $sql = "SELECT * FROM pegawai";
    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $jumlah_pegawai = mysqli_stmt_num_rows($stmt);
        mysqli_stmt_close($stmt);

        return $jumlah_pegawai;
    } else {
        return false; // Mengembalikan false jika ada masalah dengan persiapan pernyataan SQL
    }
}

function jumlah_penempatan()
{
    global $koneksi;

    $sql = "SELECT * FROM data_bidang";
    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $jumlah_penempatan = mysqli_stmt_num_rows($stmt);
        mysqli_stmt_close($stmt);

        return $jumlah_penempatan;
    } else {
        return false; // Mengembalikan false jika ada masalah dengan persiapan pernyataan SQL
    }
}


function jumlah_jabatan()
{
    global $koneksi;

    $sql = "SELECT jabatan FROM pegawai";
    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $jumlah_jabatan = mysqli_stmt_num_rows($stmt);
        mysqli_stmt_close($stmt);

        return $jumlah_jabatan;
    } else {
        return false; // Mengembalikan false jika ada masalah dengan persiapan pernyataan SQL
    }
}

function jumlah_bidang()
{
    global $koneksi;

    $sql = "SELECT * FROM data_bidang";
    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $jumlah_penempatan = mysqli_stmt_num_rows($stmt);
        mysqli_stmt_close($stmt);

        return $jumlah_penempatan;
    } else {
        return false; // Mengembalikan false jika ada masalah dengan persiapan pernyataan SQL
    }
}


function jumlah_perempuan(){
    global $koneksi;

    $sql = "SELECT COUNT(*) 
    FROM pegawai 
    JOIN data_pribadi ON pegawai.id_data_pribadi = data_pribadi.id_data_pribadi 
    WHERE data_pribadi.jenis_kelamin = 'Perempuan'";
    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $jumlah_perempuan);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        return $jumlah_perempuan;
    } else {
        return false; // Mengembalikan false jika ada masalah dengan persiapan pernyataan SQL
    }
}

function jumlah_pria(){
    global $koneksi;

    $sql = "SELECT COUNT(*) 
    FROM pegawai 
    JOIN data_pribadi ON pegawai.id_data_pribadi = data_pribadi.id_data_pribadi 
    WHERE data_pribadi.jenis_kelamin = 'Laki-laki'";
    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $jumlah_pria);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        return $jumlah_pria;
    } else {
        return false; // Mengembalikan false jika ada masalah dengan persiapan pernyataan SQL
    }
}

// function jumlah_per_golongan(){
//     global $koneksi;

//     $sql = "SELECT golongan.id_golongan, COUNT(*) AS jumlah_pegawai
//     FROM pegawai
//     JOIN golongan ON pegawai.id_golongan = golongan.id_golongan
//     GROUP BY golongan.id_golongan
//     ";
//     $stmt = mysqli_prepare($koneksi, $sql);

//     if ($stmt) {
//         mysqli_stmt_execute($stmt);
//         mysqli_stmt_bind_result($stmt, $jumlah_per_golongan);
//         mysqli_stmt_fetch($stmt);
//         mysqli_stmt_close($stmt);

//         return $jumlah_per_golongan;
//     } else {
//         return false; // Mengembalikan false jika ada masalah dengan persiapan pernyataan SQL
//     }
// }

function jumlah_gol_1a(){
    global $koneksi;

    $sql = "SELECT id_golongan, COUNT(*) AS jumlah_pegawai
            FROM pegawai
            WHERE id_golongan = '1'";
    
    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id_golongan, $jumlah_pegawai);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        return $jumlah_pegawai;
    } else {
        return false; // Mengembalikan false jika ada masalah dengan persiapan pernyataan SQL
    }
}

function jumlah_gol_1b(){
    global $koneksi;

    $sql = "SELECT id_golongan, COUNT(*) AS jumlah_pegawai
    FROM pegawai WHERE id_golongan = '2'";
    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id_golongan, $jumlah_pegawai);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        return $jumlah_pegawai;
    } else {
        return false; // Mengembalikan false jika ada masalah dengan persiapan pernyataan SQL
    }
}

function jumlah_gol_1c(){
    global $koneksi;

    $sql = "SELECT id_golongan, COUNT(*) AS jumlah_pegawai
    FROM pegawai WHERE id_golongan = '3'";
    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id_golongan, $jumlah_pegawai);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        return $jumlah_pegawai;
    } else {
        return false; // Mengembalikan false jika ada masalah dengan persiapan pernyataan SQL
    }
}

function jumlah_gol_1d(){
    global $koneksi;

    $sql = "SELECT id_golongan, COUNT(*) AS jumlah_pegawai
    FROM pegawai WHERE id_golongan = '4'";
    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id_golongan, $jumlah_pegawai);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        return $jumlah_pegawai;
    } else {
        return false; // Mengembalikan false jika ada masalah dengan persiapan pernyataan SQL
    }
}

function jumlah_gol_2a(){
    global $koneksi;

    $sql = "SELECT id_golongan, COUNT(*) AS jumlah_pegawai
    FROM pegawai WHERE id_golongan = '5'";
    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id_golongan, $jumlah_pegawai);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        return $jumlah_pegawai;
    } else {
        return false; // Mengembalikan false jika ada masalah dengan persiapan pernyataan SQL
    }
}

function jumlah_gol_2b(){
    global $koneksi;

    $sql = "SELECT id_golongan, COUNT(*) AS jumlah_pegawai
    FROM pegawai WHERE id_golongan = '6'";
    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id_golongan, $jumlah_pegawai);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        return $jumlah_pegawai;
    } else {
        return false; // Mengembalikan false jika ada masalah dengan persiapan pernyataan SQL
    }
}

function jumlah_gol_2c(){
    global $koneksi;

    $sql = "SELECT id_golongan, COUNT(*) AS jumlah_pegawai
    FROM pegawai WHERE id_golongan = '7'";
    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id_golongan, $jumlah_pegawai);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        return $jumlah_pegawai;
    } else {
        return false; // Mengembalikan false jika ada masalah dengan persiapan pernyataan SQL
    }
}

function jumlah_gol_2d(){
    global $koneksi;

    $sql = "SELECT id_golongan, COUNT(*) AS jumlah_pegawai
    FROM pegawai WHERE id_golongan = '8'";
    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id_golongan, $jumlah_pegawai);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        return $jumlah_pegawai;
    } else {
        return false; // Mengembalikan false jika ada masalah dengan persiapan pernyataan SQL
    }
}

function jumlah_gol_3a(){
    global $koneksi;

    $sql = "SELECT id_golongan, COUNT(*) AS jumlah_pegawai
    FROM pegawai WHERE id_golongan = '9'";
    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id_golongan, $jumlah_pegawai);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        return $jumlah_pegawai;
    } else {
        return false; // Mengembalikan false jika ada masalah dengan persiapan pernyataan SQL
    }
}

function jumlah_gol_3b(){
    global $koneksi;

    $sql = "SELECT id_golongan, COUNT(*) AS jumlah_pegawai
    FROM pegawai WHERE id_golongan = '10'";
    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id_golongan, $jumlah_pegawai);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        return $jumlah_pegawai;
    } else {
        return false; // Mengembalikan false jika ada masalah dengan persiapan pernyataan SQL
    }
}

function jumlah_gol_3c(){
    global $koneksi;

    $sql = "SELECT id_golongan, COUNT(*) AS jumlah_pegawai
    FROM pegawai WHERE id_golongan = '11'";
    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id_golongan, $jumlah_pegawai);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        return $jumlah_pegawai;
    } else {
        return false; // Mengembalikan false jika ada masalah dengan persiapan pernyataan SQL
    }
}

function jumlah_gol_3d(){
    global $koneksi;

    $sql = "SELECT id_golongan, COUNT(*) AS jumlah_pegawai
    FROM pegawai WHERE id_golongan = '12'";
    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id_golongan, $jumlah_pegawai);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        return $jumlah_pegawai;
    } else {
        return false; // Mengembalikan false jika ada masalah dengan persiapan pernyataan SQL
    }
}

function jumlah_gol_4a(){
    global $koneksi;

    $sql = "SELECT id_golongan, COUNT(*) AS jumlah_pegawai
    FROM pegawai WHERE id_golongan = '13'";
    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id_golongan, $jumlah_pegawai);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        return $jumlah_pegawai;
    } else {
        return false; // Mengembalikan false jika ada masalah dengan persiapan pernyataan SQL
    }
}

function jumlah_gol_4b(){
    global $koneksi;

    $sql = "SELECT id_golongan, COUNT(*) AS jumlah_pegawai
    FROM pegawai WHERE id_golongan = '14'";
    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id_golongan, $jumlah_pegawai);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        return $jumlah_pegawai;
    } else {
        return false; // Mengembalikan false jika ada masalah dengan persiapan pernyataan SQL
    }
}

function jumlah_gol_4c(){
    global $koneksi;

    $sql = "SELECT id_golongan, COUNT(*) AS jumlah_pegawai
    FROM pegawai WHERE id_golongan = '15'";
    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id_golongan, $jumlah_pegawai);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        return $jumlah_pegawai;
    } else {
        return false; // Mengembalikan false jika ada masalah dengan persiapan pernyataan SQL
    }
}

function jumlah_gol_4d(){
    global $koneksi;

    $sql = "SELECT id_golongan, COUNT(*) AS jumlah_pegawai
    FROM pegawai WHERE id_golongan = '16'";
    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id_golongan, $jumlah_pegawai);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        return $jumlah_pegawai;
    } else {
        return false; // Mengembalikan false jika ada masalah dengan persiapan pernyataan SQL
    }
}

function jumlah_gol_4e(){
    global $koneksi;

    $sql = "SELECT id_golongan, COUNT(*) AS jumlah_pegawai
    FROM pegawai WHERE id_golongan = '17'";
    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id_golongan, $jumlah_pegawai);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        return $jumlah_pegawai;
    } else {
        return false; // Mengembalikan false jika ada masalah dengan persiapan pernyataan SQL
    }
}
?>