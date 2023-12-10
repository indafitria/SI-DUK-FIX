<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SI-DUK DISKOMINFOSANTIK KALTENG</title>
    <link href="../../assets/img/logopemprov.png" rel="icon">

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="../../assets/vendor/bootstrap-5.3.1/dist/css/bootstrap.min.css">
    <script src="../../assets/vendor/bootstrap-5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="../../assets/vendor/bootstrap-5.3.1/dist/js/bootstrap.min.js"></script>

    <!-- FontAwesome -->
    <link rel="stylesheet" href="../../assets/vendor/fontawesome/css/all.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="../../assets/vendor/DataTables/datatables.min.css">
    <script src="../../assets/vendor/DataTables/datatables.min.js"></script>
    <script src="../../assets/vendor/jquery-3.7.1/jquery-3.7.1.js"></script>
    <script src="../../assets/vendor/DataTables/DataTables-1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="../../assets/vendor/DataTables/DataTables-1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="../../assets/vendor/DataTables/Bootstrap-5-5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/vendor/DataTables/DataTables-1.13.6/css/dataTables.bootstrap5.min.css">

    <!-- Assets -->
    <script src="../../assets/js/main.js"></script>
    <link rel="stylesheet" href="../../assets/css/style.css">

    <!-- CSS -->
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        h3 {
            text-transform: uppercase;
        }
    </style>
</head>

<?php 

// $tanggal_hari_ini = date("d F Y");
// setlocale(LC_TIME, 'id_ID.utf8');
// $tanggal_hari_ini = strftime("%d %B %Y");

include '../../config/koneksi.php';
$sql = mysqli_query($koneksi, "SELECT * FROM pegawai JOIN data_pribadi ON pegawai.id_data_pribadi = data_pribadi.id_data_pribadi
JOIN golongan ON pegawai.id_golongan = golongan.id_golongan
JOIN data_bidang ON pegawai.id_bidang = data_bidang.id_bidang");

$sql1= mysqli_query($koneksi,"SELECT * FROM ")
?>
<body>
    <center>
        <h3>DATA KEPEGAWAIAN APARATUR SIPIL NEGARA</h3>
        <h3>PEMERINTAH PROVINSI KALIMANTAN TENGAH</h3>
        <h3> PER <span id="tanggalHariIni"></span></h3>
    </center>

    <table>
        <thead>
            <tr>
                <th rowspan="2">NO</th>
                <th rowspan="2">NAMA</th>
                <th rowspan="2">NIP</th>
                <th rowspan="2">JENIS KELAMIN</th>
                <th colspan="2">PANGKAT</th>
                <th colspan="3">JABATAN</th>
                <th colspan="2">MASA KERJA</th>
                <th colspan="3">DIKLAT TEKNIS</th>
                <th colspan="3">DIKLAT JABATAN</th>
                <th colspan="5">PENDIDIKAN</th>
                <th rowspan="2">TEMPAT TANGGAL LAHIR</th>
                <th rowspan="2">USIA</th>
                <th rowspan="2">CATATAN MUTASI KEPEGAWAIAN</th>
            </tr>
            <tr>
                <th>GOL</th>
                <th>TMT</th>
                <th>NAMA JABATAN</th>
                <th>PENEMPATAN</th>
                <th>TMT</th>
                <th>THN</th>
                <th>BLN</th>
                <th>NAMA</th>
                <th>BLN/THN</th>
                <th>JMH JAM</th>
                <th>NAMA</th>
                <th>BLN/THN</th>
                <th>JMH JAM</th>
                <th>STRATA</th>
                <th>JURUSAN</th>
                <th>KONSENTRASI</th>
                <th>ALUMNI</th>
                <th>THN LULUS</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="1">1</td>
                <td colspan="1">2</td>
                <td colspan="1">3</td>
                <td colspan="1">4</td>
                <td colspan="1">5</td>
                <td colspan="1">6</td>
                <td colspan="1">7</td>
                <td colspan="1">8</td>
                <td colspan="1">9</td>
                <td colspan="1">10</td>
                <td colspan="1">11</td>
                <td colspan="1">12</td>
                <td colspan="1">13</td>
                <td colspan="1">14</td>
                <td colspan="1">15</td>
                <td colspan="1">16</td>
                <td colspan="1">17</td>
                <td colspan="1">18</td>
                <td colspan="1">19</td>
                <td colspan="1">20</td>
                <td colspan="1">21</td>
                <td colspan="1">22</td>
                <td colspan="1">23</td>
                <td colspan="1">24</td>
                <td colspan="1">25</td>
            </tr>
            <tr>
            
                <td colspan="1" class="er">1</td>
                <td colspan="1">Dina Meiliana</td>
                <td colspan="1"></td>
                <td colspan="1">4</td>
                <td colspan="1">5</td>
                <td colspan="1">6</td>
                <td colspan="1">7</td>
                <td colspan="1">8</td>
                <td colspan="1">9</td>
                <td colspan="1">10</td>
                <td colspan="1">11</td>
                <td colspan="1">12</td>
                <td colspan="1">13</td>
                <td colspan="1">14</td>
                <td colspan="1">15</td>
                <td colspan="1">16</td>
                <td colspan="1">17</td>
                <td colspan="1">18</td>
                <td colspan="1">19</td>
                <td colspan="1">20</td>
                <td colspan="1">21</td>
                <td colspan="1">22</td>
                <td colspan="1">23</td>
                <td colspan="1">24</td>
                <td colspan="1">25</td>
            </tr>
        </tbody>
    </table>
</body>

</html>

<script>
        // Mendapatkan tanggal hari ini dalam JavaScript
        var tanggalHariIni = new Date();
        var options = { year: 'numeric', month: 'long', day: '2-digit' };
        var tanggalFormat = tanggalHariIni.toLocaleDateString('id-ID', options).toUpperCase();

        // Menampilkan tanggal dalam elemen HTML
        document.getElementById("tanggalHariIni").innerHTML = tanggalFormat;
    </script>