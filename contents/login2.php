<?php
session_start();
error_reporting(0);

include '../config/koneksi.php';
include '../function/fungsi.php';
?>

<?php

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['pass'];

    login($username, $password);
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SI-DUK</title>
    <link href="../assets/img/logopemprov.png" rel="icon">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap-5.3.1/dist/css/bootstrap.min.css">
    <script src="../assets/vendor/bootstrap-5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        @media (min-width: 768px) {
            .h-md-100 {
                height: 100vh;
            }
        }

        .bg-left {
            background: url('../assets/img/batik.jpg') center/cover no-repeat;
        }

        .bg-right {
            background: white;
        }

        img.zoom {
            width: 350px;
            height: 200px;
            -webkit-transition: all .2s ease-in-out;
            -moz-transition: all .2s ease-in-out;
            -o-transition: all .2s ease-in-out;
            -ms-transition: all .2s ease-in-out;
        }

        .transisi {
            -webkit-transform: scale(1.2);
            -moz-transform: scale(1.2);
            -o-transform: scale(1.2);
            transform: scale(1.2);
        }
    </style>
</head>

<body>

    <div class="d-md-flex h-md-100 align-items-center">

        <!-- KIRI -->
        <div class="col-md-6 p-0 bg-left h-md-100">
            <div class="d-md-flex align-items-center h-100 p-5 text-center justify-content-center">
                <div class="logoarea pt-5 pb-5">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <div class="text-center">
                            <img class="logo zoom" src="../assets/img/logopemprov.png"
                                style="height: 399; width: 300px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- KANAN -->
        <div class="col-md-6 p-0 bg-right h-md-100">
            <div class="d-md-flex align-items-center h-md-100 p-5 justify-content-center">
                <div class="d-flex align-items-center justify-content-center h-100">
                    <div class="text-center">
                        <h2 class="text-primary text-center">SI - DUK</h2>
                        <h2 class="text-primary text-center">DISKOMINFOSANTIK KALTENG</h2>

                        <form class="form" action="login2.php" method="POST" enctype="multipart/form-data">
                            <div class="col">
                                <p>
                                    <input class="form-control" type="text" id="username" name="username"
                                        autocomplete="off" placeholder="Username">
                                </p>
                                <p>
                                    <input class="form-control" type="password" id="password" name="pass"
                                        placeholder="Password" autocomplete="off">
                                </p>
                                <p>
                                <div class="d-grid gap-2">
                                    <input class="btn btn-primary d-grid gap-2 col-12 mx-auto" type="submit"
                                        name="submit" value="Login">
                                </div>
                                </p>
                            </div>
                        </form>
                        <!-- <a href="../contents/lupa_pass.php"> Lupa Password? </a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('.zoom').hover(function () {
            $(this).addClass('transisi');
        }, function () {
            $(this).removeClass('transisi');
        });
    });  
</script> -->

</html>