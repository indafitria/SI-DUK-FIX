<?php 
session_start();
error_reporting(0);

include '../config/koneksi.php'; 
include '../function/fungsi.php';
?>

<?php 


// if (isset($_POST['submit'])) {
//     if (isset($_POST['submit'])) {
//         $username = $_POST['username'];
//         $pass = $_POST['pass'];
    
//         // Hindari penggunaan fungsi global, lebih baik kirimkan koneksi sebagai parameter
//         $check = checkLogin($username, $pass);
    
//         // Mengecek pengguna
//         if ($check) {
//             $row = proses_login($username, $pass);
    
//             if ($row) {
//                 // Membuat session
//                 $_SESSION['id_user'] = $row['id_user'];
    
//                 echo "
//                     <script>
//                         alert('Berhasil login');
//                         window.location.href = '../contents/kepegawaian/home';
//                     </script>
//                 ";
//             } else {
//                 echo "
//                     <script>
//                         alert('Gagal login');
//                         window.location.href = '#';
//                     </script>
//                 ";
//             }
//         } else {
//             echo "
//                 <script>
//                     alert('Gagal login');
//                     window.location.href = '#';
//                 </script>
//             ";
//         }
//     }
    
// }


//file ini merupakan file login untuk admin


if (isset($_POST['submit'])) {
// //mendapatkan input dari pengguna
// $username = $_POST['username'];
// $password = md5($_POST['pass']); // Mengenkripsi password menggunakan MD5

// // Mencari pengguna berdasarkan username
// $login = "SELECT * FROM user WHERE username = '$username'";
// $cek = mysqli_query($koneksi, $login);
// $ketemu = mysqli_num_rows($cek);

// // Mencari pengguna berdasarkan password
// $login2 = "SELECT * FROM user WHERE pass = '$password'";
// $cek2 = mysqli_query($koneksi, $login2);
// $ketemu2 = mysqli_num_rows($cek2);

// // Mencari pengguna berdasarkan username dan password
// $login3 = "SELECT * FROM user WHERE username = '$username' AND pass = '$password'";
// $cek3 = mysqli_query($koneksi, $login3);
// $ketemu3 = mysqli_num_rows($cek3);
// $r = mysqli_fetch_assoc($cek3);

// if ($ketemu3 == 1) {
//     // Detail sesi loginnya
//     $_SESSION['id_user'] = $r['id_user'];
//     $_SESSION['nama'] = $r['nama_user'];
//     $_SESSION['username'] = $r['username'];
//     $_SESSION['pass'] = $r['pass'];
    
//     // Login berhasil
//     echo "<script>alert('Selamat Datang Admin " . $_SESSION['nama'] . "'); 
//     window.location = '../contents/kepegawaian/home.php';</script>";
// } else if ($ketemu3 != 1 && $ketemu == 0 && $ketemu2 == 0) {
//     // Menampilkan pesan gagal jika belum memasukkan username dan password
//     echo "<script>alert('Username dan Password anda tidak valid ! Mohon periksa kembali.');
//     window.history.back();</script>";
// } else if ($ketemu3 != 1 && $ketemu == 0) {
//     // Menampilkan pesan gagal jika username salah
//     echo "<script>alert('Username anda tidak valid ! Mohon periksa kembali.');
//     window.history.back();</script>";
// } else if ($ketemu3 != 1 && $ketemu2 == 0) {
//     // Menampilkan pesan gagal jika password salah
//     echo "<script>alert('Password anda tidak valid ! Mohon periksa kembali.');
//     window.history.back();</script>";
// } else {
//     // Menampilkan pesan gagal jika login gagal
//     echo "<script>alert('LOGIN GAGAL! Mohon Periksa kembali Username dan Password Anda.');
//     window.location = 'index.php';</script>";
// }

    $username = $_POST['username'];
    $password = $_POST['pass'];
    login($username, $password, $koneksi);

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
            <form class="form d-flex row justify-content-center" action="login.php" method="POST" enctype="multipart/form-data">
                <div class="col-4">
                    <p>
                        <input class="form-control" type="text" id="username" name="username" autocomplete="off" placeholder="Username">
                    </p>
                    <p>
                        <input class="form-control" type="password" id="password" name="pass"
                            placeholder="Password" autocomplete="off">
                    <div class="input-group-addon">
                    </div>
                    </p>
                    <p>
                    <div class="p-2">
                                    <input class="btn btn-info d-grid gap-2 col-12 mx-auto" type="submit" name ="submit" value="Login">
                                </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Login -->
</body>

</html>