<?php session_start();
include '../../config/koneksi.php';


$id_admin = $_SESSION['id_user'];
$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id_admin'");
$isi = mysqli_fetch_array($sql);

$nama = $isi['nama'];
$level = $isi['level'];


?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SI-DUK DISKOMINFOSANTIK KALTENG</title>
  <link href="../../assets/img/logopemprov.png" rel="icon">

  <!-- Assets -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script> -->

  <!-- Boostrap 5 -->
  <link rel="stylesheet" href="../../assets/vendor/bootstrap-5.3.1/dist/css/bootstrap.min.css">
  <script src="../../assets/vendor/bootstrap-5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="../../assets/vendor/bootstrap-5.3.1/dist/js/bootstrap.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <!-- Sertakan SweetAlert CSS melalui CDN -->
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css"> -->

  <!-- Sertakan SweetAlert JavaScript melalui CDN -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script> -->

  <!-- FontAwesome -->
  <link rel="stylesheet" href="../../assets/vendor/fontawesome/css/all.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="../../assets/vendor/DataTables/datatables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">

  <script src="../../assets/vendor/DataTables/datatables.min.js"></script>
  <script src="../../assets/vendor/jquery-3.7.1/jquery-3.7.1.js"></script>
  <script src="../../assets/vendor/DataTables/DataTables-1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="../../assets/vendor/DataTables/DataTables-1.13.6/js/dataTables.bootstrap5.min.js"></script>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="../../assets/vendor/DataTables/Bootstrap-5-5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../assets/vendor/DataTables/DataTables-1.13.6/css/dataTables.bootstrap5.min.css">


  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

  <!-- Assets -->
  <script src="../../assets/js/main.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
  <link rel="stylesheet" href="../../assets/css/style.css">
  <link rel="stylesheet" href="../../assets/css/font.css">

  
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-md bg-body-secondary sticky-top font">
    <div class="container-fluid">
      <a class="navbar-brand" href="../kepegawaian/home.php">
        <img class="ms-5 me-2" src="../../assets/img/logopemprov.png" width="30" height="38" alt="logopemprov">
        <!-- Sistem Informasi Kepegawaian -->
        SISTEM INFORMASI KEPEGAWAIAN
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link navklik" aria-current="page" href="../kepegawaian/home.php">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link navklik" aria-current="page" href="../kepegawaian/data_pegawai.php">DATA KEPEGAWAIAN</a>
          </li>
          <li class="nav-item dropdown">
            <?php if($level == 1){?>
            <a class="nav-link dropdown-toggle navklik" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             SUPER ADMIN
            </a>
            <?php } ?>
            <?php if($level == 2){?>
            <a class="nav-link dropdown-toggle navklik" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              ADMIN
            </a>
            <?php } else ?>
            <?php if($level == 3){?>
            <a class="nav-link dropdown-toggle navklik" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              USER
            </a>
            <?php } ?>
            <ul class="dropdown-menu dropdown-menu-end backg">
              <li class="custom-header"><?php echo $nama ?></li>
              <li><a class="dropdown-item ubah" href="../kepegawaian/ubahpass.php"><i class="bi bi-gear-fill"></i> Ubah Password</a></li>
            
              <?php if ($level == 1) {?>
              <li><a class="dropdown-item ubah" href="../kepegawaian/kelola-user.php"><i class="bi bi-person-fill-lock"></i>Kelola User</a></li>
                <?php }?>
              <li><a class="dropdown-item logout" href="../logout.php"><i class="bi bi-box-arrow-left"></i> Log Out</a>
                <style>
                  .custom-header {
                    background-color: red;
                    font-size: 17px;
                    color: white;
                    padding: 7px;
                    text-align: center;
                    border-bottom: 2px solid #ccc;
                  }
                </style>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar -->

  <!-- <script>
    document.addEventListener("DOMContentLoaded", function () {
      var currentUrl = window.location.href;
      var navLinks = document.querySelectorAll("navklik");
      navLinks.forEach(function (navLink) {
        if (currentUrl.includes(navLink.getAttribute("href"))) {
          navLink.classList.add("active");
        }
      });
    });
  </script> -->