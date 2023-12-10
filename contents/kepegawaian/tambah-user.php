<?php
include '../sections/header.php';
include '../../config/koneksi.php';
include '../../function/fungsi.php';
?>

<?php

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));


//jika tidak ada login sebelumnya maka diarahkan ke login.php
if (empty($_SESSION['username']) and empty($_SESSION['pass'])) {
    echo "<script> window.location = '../../index.php' </script>";
};
?>

<?php
if (isset($_POST['tambah_user'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $level = $_POST['level'];


    // Tambahkan data diklat ke database
    $hasil_tambah_user = tambah_user($nama,$email,$username,$pass,$level) ;

    if ($hasil_tambah_user > 0) {
        echo "<script> alert('Proses Tambah Data  Berhasil'); window.location='kelola-user.php';</script>";
    } else {
        echo "<script> alert('Proses Tambah Data Gagal'); window.location='#';</script>";
    }
}
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Data User</h4>
                </div>
                <div class="card-body">

                    <form action="tambah-user.php" method="POST" enctype="multipart/form-data">

                        <div class="d-flex flex-row mb-3">
                            <div class="p-2 ml-cm">
                                <div class="card mb-3">
                                    <select class="form-select" id="aksiSelect" name="level">
                                        <option selected disabled>Pilih Jenis User</option>
                                        <option value="1">Super Admin</option>
                                        <option value="2">Admin</option>
                                        <option value="3">User</option>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputNoSK" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama" placeholder="Masukkan Minimal Sebanyak 4 Karakter dan Maksimal 50 Karakter" oninput="this.reportValidity()" autocomplete="off">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputNoSK" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="email" placeholder="Masukkan Minimal Sebanyak 4 Karakter dan Maksimal 50 Karakter" oninput="this.reportValidity()" autocomplete="off">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputNoSK" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="username" placeholder="Masukkan Minimal Sebanyak 4 Karakter dan Maksimal 50 Karakter" oninput="this.reportValidity()" autocomplete="off">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputNoSK" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="password" placeholder="Masukkan Minimal Sebanyak 4 Karakter dan Maksimal 50 Karakter" oninput="this.reportValidity()" autocomplete="off">
                            </div>
                        </div>
                       

                        <div class="p-2">
                            <div class="d-flex flex-row mb-3 justify-content-center">
                                <div class="p-2">
                                    <input class="btn btn-danger d-grid gap-2 col-12 mx-auto" type="reset" value="Reset" onclick="resetData()">
                                </div>
                                <div class="p-2">
                                    <input class="btn btn-success d-grid gap-2 col-12 mx-auto" type="submit" name="tambah_user" value="Simpan">
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="d-md-flex justify-content-start">
                        <a class="btn btn-primary" href="../kepegawaian/kelola-user.php" role="button">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../sections/footer.php'; ?>