<?php
include '../../config/koneksi.php';


// if (empty($_SESSION['username']) and empty($_SESSION['pass'])) {
//     echo "<script> window.location = '../../index.php' </script>";
// };

require_once __DIR__ . '/../../assets/vendor/mPDF-8/autoload.php';

// Initialize mPDF
$mpdf = new \Mpdf\mpdf(['format' => 'legal-L']);

// Set custom margins (left, top, right, bottom) in millimeters
$mpdf->SetMargins(10, 10, 10, 10);

$tanggalHariIni = date('d') . ' ' . ucwords(bulan(date('n'))) . ' ' . date('Y');

// Fungsi untuk mengambil nama bulan dalam huruf kapital
function bulan($bulan)
{
    $daftarBulan = [
        1 => 'JANUARI',
        2 => 'FEBRUARI',
        3 => 'MARET',
        4 => 'APRIL',
        5 => 'MEI',
        6 => 'JUNI',
        7 => 'JULI',
        8 => 'AGUSTUS',
        9 => 'SEPTEMBER',
        10 => 'OKTOBER',
        11 => 'NOVEMBER',
        12 => 'DESEMBER'
    ];

    return $daftarBulan[$bulan];
}

$tanggalHariIni1 = date('d') . ' ' . ucwords(bulan_(date('n'))) . ' ' . date('Y');

// Fungsi untuk mengambil nama bulan dalam huruf kapital
function bulan_($bulan)
{
    $daftarBulan = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember'
    ];

    return $daftarBulan[$bulan];
}
// Function to get the capitalized month name

// Create HTML content
$html = <<<HTML
<!DOCTYPE html>
<html lang="id">
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
    table {
        width: 100%;
        border-collapse: collapse;
    }

    h3 {
        font-size: 10px;
        text-align: center;
    }
    th,
    td {
        border: 1px solid #000;
        padding: 5px;
        padding-top: 0px;
        padding-bottom: 0px;
        text-align: center;
        font-size: 12px; /* Increase the font size here */
    }
    .tr {
        border: 1px solid #999;
        padding: 8px 20px;
    }

    /* Penyesuaian untuk orientasi lanskap */
    @page {
        size: landscape;
    }

    /* Lebar kolom dan ukuran font yang sesuai */
    td {
        width: 40px; /* Sesuaikan lebar kolom sesuai kebutuhan */
        font-size: 60px; /* Increase the font size here */
    }
    th {
        width: 40px; /* Sesuaikan lebar kolom sesuai kebutuhan */
        font-size: 50x; /* Increase the font size here */
    }

   /* Di dalam file CSS Anda, atur tampilan sel tabel dan baris catatan */
    .catatan-mutasi {
        display: table; /* Mengubah sel menjadi tabel */
        width: 50%; /* Lebar sel 100% */
    }

    .catatan-row {
        display: table-row; /* Setiap baris adalah baris tabel */
    }

    .catatan-row .nomor {
        display: table-cell; /* Setiap elemen span dengan kelas 'nomor' adalah sel dalam baris tabel */
        vertical-align: top; /* Posisi teks di atas dalam sel */
    }

    .catatan-row .catatan {
        display: table-cell; /* Setiap elemen span dengan kelas 'catatan' adalah sel dalam baris tabel */
        text-align: justify; /* Ratakan ke kanan */
        vertical-align: top; /* Posisi teks di atas dalam sel */
    }
    </style>

</head>
<body>
    <center>
        <h3>DATA KEPEGAWAIAN APARATUR SIPIL NEGARA</h3>
        <h3>DINAS KOMUNIKASI, INFORMATIKA, PERSANDIAN, DAN STATISTIK</h3>
        <h3>PEMERINTAH PROVINSI KALIMANTAN TENGAH</h3>
        <h3> PER {$tanggalHariIni}</h3> 
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
HTML;

$query = mysqli_query($koneksi, "SELECT * FROM pegawai JOIN data_pribadi ON pegawai.id_data_pribadi = data_pribadi.id_data_pribadi JOIN golongan ON pegawai.id_golongan = golongan.id_golongan JOIN data_bidang ON pegawai.id_bidang = data_bidang.id_bidang");
$query1 = mysqli_query($koneksi, "SELECT * FROM riwayat_diklat JOIN pegawai ON riwayat_diklat.nip = pegawai.nip WHERE jenis_diklat = 'Teknis' order by pegawai.nip");
$query2 = mysqli_query($koneksi, "SELECT * FROM riwayat_diklat JOIN pegawai ON riwayat_diklat.nip = pegawai.nip WHERE jenis_diklat = 'Jabatan'  order by pegawai.nip");
$query3 = mysqli_query($koneksi, "SELECT * FROM riwayat_pendidikan 
JOIN pegawai ON riwayat_pendidikan.nip = pegawai.nip
ORDER BY riwayat_pendidikan.nip DESC
LIMIT 1");
// ...

$no = 1;
while ($r = mysqli_fetch_array($query)) {
    $html .= <<<HTML
        <tr>
            <td>{$no}</td>
            <td>{$r['nama']}</td> 
            <td>{$r['nip']}</td>
            <td>{$r['jenis_kelamin']}</td> 
            <td>{$r['nama_golongan']}</td>
            <td>{$r['tmt_golongan']}</td>
            <td>{$r['jabatan']}</td>  
            <td>{$r['nama_bidang']}</td>
            <td>{$r['tmt_jabatan']}</td>
            <td>{$r['masa_kerja_tahun']}</td>
            <td>{$r['masa_kerja_bulan']}</td>
HTML;

    // Data diklat teknis
    $queryDiklatTeknis = mysqli_query($koneksi, "SELECT * FROM riwayat_diklat 
    JOIN pegawai ON riwayat_diklat.nip = pegawai.nip
    WHERE jenis_diklat = 'Teknis' AND pegawai.nip = '{$r['nip']}'
    ORDER BY riwayat_diklat.tahun_diklat ASC
    LIMIT 1");
    $diklatTeknis = mysqli_fetch_array($queryDiklatTeknis);

    if (empty($diklatTeknis['nama_diklat'])) {
        $html .= <<<HTML
            <td>-</td>
            <td>-</td>
            <td>-</td>
HTML;
    } else {
        $html .= <<<HTML
            <td>{$diklatTeknis['nama_diklat']}</td>
            <td>{$diklatTeknis['tahun_diklat']}</td>
            <td>{$diklatTeknis['jmlh_jam']}</td>
HTML;
    }

    // Data diklat jabatan
    $queryDiklatJabatan = mysqli_query($koneksi, "SELECT * FROM riwayat_diklat 
    JOIN pegawai ON riwayat_diklat.nip = pegawai.nip
    WHERE jenis_diklat = 'Jabatan' AND pegawai.nip = '{$r['nip']}'
    ORDER BY riwayat_diklat.tahun_diklat ASC
    LIMIT 1");
    $diklatJabatan = mysqli_fetch_array($queryDiklatJabatan);

    if (empty($diklatJabatan['nama_diklat'])) {
        $html .= <<<HTML
            <td>-</td>
            <td>-</td>
            <td>-</td>
HTML;
    } else {
        $html .= <<<HTML
            <td>{$diklatJabatan['nama_diklat']}</td>
            <td>{$diklatJabatan['tahun_diklat']}</td>
            <td>{$diklatJabatan['jmlh_jam']}</td>
HTML;
    }

    // Data pendidikan
    $queryPendidikan = mysqli_query($koneksi, "SELECT * FROM riwayat_pendidikan WHERE nip = '{$r['nip']}' ORDER BY tahun_lulus DESC limit 1");
    $pendidikan = mysqli_fetch_array($queryPendidikan);

    if (empty($pendidikan['strata'])) {
        $html .= <<<HTML
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
HTML;
    } else {
        $html .= <<<HTML
            <td>{$pendidikan['strata']}</td>
            <td>{$pendidikan['jurusan']}</td>
            <td>{$pendidikan['konsentrasi']}</td>
            <td>{$pendidikan['nama_kampus']}</td>
            <td>{$pendidikan['tahun_lulus']}</td>
HTML;
    }

    // Data tempat tanggal lahir dan usia
    $queryDataPribadi = mysqli_query($koneksi, "SELECT usia, tempat_lahir, tanggal_lahir FROM data_pribadi WHERE id_data_pribadi = '{$r['id_data_pribadi']}'");
    $dataPribadi = mysqli_fetch_array($queryDataPribadi);

    if (empty($dataPribadi['tempat_lahir']) || empty($dataPribadi['tanggal_lahir']) || empty($dataPribadi['usia'])) {
        $html .= <<<HTML
            <td>-</td>
            <td>-</td>
        </tr>
HTML;
    } else {
        $html .= <<<HTML
            <td>{$dataPribadi['tempat_lahir']}, {$dataPribadi['tanggal_lahir']}</td>
            <td>{$dataPribadi['usia']}</td>
        </tr>
HTML;
    }

    $no++; // Update the number

    // Menambahkan catatan mutasi kepegawaian
    $queryCatatanMutasi = mysqli_query($koneksi, "SELECT catatan_mutasi FROM riwayat_mutasi WHERE nip = '{$r['nip']}' AND tmt_mutasi < (SELECT MAX(tmt_mutasi) FROM riwayat_mutasi) ");
    $nomer = 1; // Initialize the number
    $catatan_mutasi = ''; // Initialize the variable catatan_mutasi

    while ($mutasi = mysqli_fetch_array($queryCatatanMutasi)) {
        $catatan_mutasi .= "<div class='catatan-row'><span>{$nomer}.</span> <span>{$mutasi['catatan_mutasi']}</span></div>";
        $nomer++; // Add 1 to the number each time the loop runs
    }

    // Add catatan mutasi to the table
    $html .= <<<HTML
        <td class="catatan-mutasi" style="text-align: left;">{$catatan_mutasi}</td>
    </tr>
    HTML;
    // ...
}



// Tambahkan penutup HTML
$html .= <<<HTML
            </tbody>
            
        </table>
        
    </center>
    <p></p>
    <div style="float: right; width: 20%;">
    <div style="font-size: 9px; font-weight: bold; padding: 10px;">    
    <p style="text-align: left;">
            Palangka Raya, {$tanggalHariIni1}
        </p>
        <p style="text-align: left;">
            Kepala Dinas,
        </p>
        <div>
            <br>
        </div>
        <div>
            <br>
        </div>
        <div>
            <br>
        </div>
        <div>
            <br>
        </div>
        <p style="text-align: left;">
            AGUS SISWADI, S.Pd., M.Pd        
        </p>
        <p style="text-align: left;">
            NIP. 19680204 199903 1 007
        </p>
    </div>
</div>

</body>
</html>
HTML;

// Fetch data from the database
$query = mysqli_query($koneksi, "SELECT * FROM pegawai JOIN data_pribadi ON pegawai.id_data_pribadi = data_pribadi.id_data_pribadi JOIN golongan ON pegawai.id_golongan = golongan.id_golongan JOIN data_bidang ON pegawai.id_bidang = data_bidang.id_bidang");

// Iterate through the data
while ($r = mysqli_fetch_array($query)) {
    // Add data to the HTML content
    $html .= <<<HTML
        <!-- Add your HTML structure here for each data row -->
    HTML;
}

// Add any other sections or data to the HTML content as needed

// Close the HTML structure
$html .= '</body></html>';

// Write the HTML content to a file (optional)
file_put_contents('temp_pdf_content.html', $html);

// Generate the PDF
$mpdf->WriteHTML($html);

// Output the PDF to the browser
$mpdf->Output('dokumen.pdf', \Mpdf\Output\Destination::INLINE);


exit;
