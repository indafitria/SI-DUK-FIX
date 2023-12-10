<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tampilkan PDF</title>
    <link href="../../assets/img/logopemprov.png" rel="icon">

    <!-- Assets -->
    <script src="../../assets/js/main.js"></script>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- CSS -->

    <style>
        body {
            margin: 30px;
        }

        table {
            margin-right: 10px;
            width: 100%;
            border-collapse: collapse;
        }

        h3 {
            font-size: 10px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 5px;
            padding-top: 0px;
            padding-bottom: 0px;
            text-align: center;
            font-size: 9px;
        }

        /* Penyesuaian untuk orientasi lanskap */
        @page {
            size: landscape;
        }

        /* Lebar kolom dan ukuran font yang sesuai */
        th, td {
            width: 60px; /* Sesuaikan lebar kolom sesuai kebutuhan */
            font-size: 8px; /* Sesuaikan ukuran font sesuai kebutuhan */
        }
    </style>
</head>

<body>
    <center>
        <h3>DATA KEPEGAWAIAN APARATUR SIPIL NEGARA</h3>
        <h3>PEMERINTAH PROVINSI KALIMANTAN TENGAH</h3>
        <h3> PER <span id="tanggalHariIni"></span></h3>
        
    </center>

    <center>
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
            </tbody>
            <tbody>
                <tr>
                    <td colspan="1">1</td>
                    <td colspan="1">James Bond Perdana</td>
                    <td colspan="1">123456789012345678</td>
                    <td colspan="1">L</td>
                    <td colspan="1">Pembina Tk. I (IV/b)</td>
                    <td colspan="1">01-01-2023</td>
                    <td colspan="1">Kepala Bidang</td>
                    <td colspan="1">Persandian</td>
                    <td colspan="1">01-01-2023</td>
                    <td colspan="1">2</td>
                    <td colspan="1">3</td>
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
    </center>
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