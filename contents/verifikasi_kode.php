<?php 
session_start();
error_reporting(0);

include '../config/koneksi.php'; 
include '../function/fungsi.php';
include '../assets/PHPMailer-master';
?>

<?php 



if (isset($_POST['submit'])) {
    
    $reset_token = $_POST['reset_token'];

    $cari = verifikasiToken($reset_token);

    if($cari > 0 ){
        echo "<script> alert('Kode Berhasil Di verifikasi! Silahkan Masukan Password Anda yang Terbaru'); window.location='../contents/new_pass.php';</script>";
    } else {
        echo "<script> alert('Kode Salah'); window.history.back();</script>";
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SI-DUK</title>
    <link href="../assets/img/logopemprov.png" rel="icon">

    <!-- Boostrap -->
    <link rel=" stylesheet" href="../assets/vendor/bootstrap-5.3.1/dist/css/bootstrap.min.css">
    <script src="../assets/vendor/bootstrap-5.3.1/dist/js/bootstrap.bundle.min.js"> </script>

    <link rel="stylesheet" href="../assets/css/style1.css">
    
<!-- Sertakan SweetAlert CSS melalui CDN -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">

Sertakan SweetAlert JavaScript melalui CDN -->
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script> --> 
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
</head>

<body class="p-3 mb-2 bglogin">

    <!-- Login -->
    <div class="container m-6 text-center">
        <div class="box-form pt-5">
            <img class="logo " src="../assets/img/logopemprov.png" style="height: 265; width: 200px;">
            <p>
            <h2 class="text-primary text-center">SI - DUK DISKOMINFOSANTIK KALTENG</h2>
            </p>
            </p>
            <form class="form d-flex row justify-content-center" action="verifikasi_kode.php" method="POST" enctype="multipart/form-data">
                <div class="col-4">
                    <label for="email">Silahkan Masukan Kode yang telah dikirimkan ke email anda! </label>
                    <p>
                        <input class="form-control" type="text" id="code_token" name="reset_token" autocomplete="off" placeholder="Kode">
                    </p>
                   
                    <p>
                    <div class="p-2">
                                    <input class="btn btn-info d-grid gap-2 col-12 mx-auto" type="submit" name ="submit" value="Submit">
                                </div>
                </div>
            </form>

        </div>
    </div>
    <!-- Login -->
</body>

</html>