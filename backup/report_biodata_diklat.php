<?php
include '../../config/koneksi.php';
// if (empty($_SESSION['username']) and empty($_SESSION['pass'])) {
//     echo "<script> window.location = '../../index.php' </script>";
// };
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Biodata</title>

    <style>
        @page {
            size: Legal;
            margin: 20mm 10mm;
            /* Atur margin sesuai kebutuhan */
        }

        @media print {
            #saveButton {
                display: none;
            }
        }

        .table,
        .input,
        .input1 {
            font-family: 'Times New Roman';
            color: #232323;
            border-collapse: collapse;
        }

        .table,
        .th,
        .tr {
            border: 1px solid #999;
            padding: 8px 20px;
        }

        img {
            width: 100%;
        }

        .table-head {
            background-color: #f0f0f0;
            /* Warna latar belakang kepala tabel */
        }

        .save-button {
            text-align: center;
        }

        /* CSS untuk tampilan cetak */
        @media print {
            #kembali, .save-button {
                display: none;
            }
        }

        /* Gaya dasar untuk tombol */
        button {
            padding: 10px 20px;
            background-color: #007BFF;
            /* Warna latar belakang tombol */
            color: #fff;
            /* Warna teks tombol */
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        /* Gaya saat mengarahkan kursor ke tombol */
        button:hover {
            background-color: #0056b3;
            /* Warna latar belakang tombol saat dihover */
        }

        /* Gaya untuk tombol "Kembali" */
        #kembali {
            margin-right: 10px;
            /* Jarak dari tombol "Cetak" */
        }
    </style>
</head>

<body>
    <div style="text-align: center;">
        <img src="../../assets/img/kop.jpg" alt="Kop Surat">
    </div>
    <!-- <div class="kop-surat"> -->

    </div>
    <center>
        <h4>BIODATA PESERTA <br>
            UJIAN DIKLAT TAHUN 2023 <br>
            PROVINSI KALIMANTAN TENGAH</h4>
    </center>

    <?php
    $nip = $_GET['nip'];
    $query = mysqli_query($koneksi, "SELECT * From riwayat_mutasi JOIN Pegawai ON riwayat_mutasi.nip = pegawai.nip JOIN data_pribadi ON pegawai.id_data_pribadi = data_pribadi.id_data_pribadi JOIN golongan ON pegawai.id_golongan = golongan.id_golongan JOIN data_bidang ON pegawai.id_bidang = data_bidang.id_bidang WHERE pegawai.nip = '$nip'");
    $s = mysqli_fetch_array($query);
    ?>

    <center>
        <table class="table">
            <tbody>
                <tr class="tr">
                    <td class="th">1</td>
                    <td class="th">NAMA LENGKAP (SESUAI DENGAN<br> SK PANGKAT TERAKHIR)</td>
                    <td class="th" colspan="2"><?php echo $s['nama']; ?></td>
                </tr>

                <tr class="tr">
                    <td class="th">2</td>
                    <td class="th">TEMPAT DAN TANGGAL LAHIR</td>
                    <td class="th" colspan="2">
                        <?php
                        // Data nama bulan dalam bahasa Indonesia
                        $bulanIndonesia = [
                            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                        ];

                        // Mengambil tanggal lahir dari database
                        $tanggal_lahir = new DateTime($s['tanggal_lahir']);

                        // Mengambil angka bulan
                        $angkaBulan = $tanggal_lahir->format('n');

                        // Mengambil nama bulan dari array
                        $namaBulan = $bulanIndonesia[$angkaBulan - 1];

                        // Format tanggal lahir dalam bahasa Indonesia
                        $tanggal_lahir_format = $tanggal_lahir->format('d') . ' ' . $namaBulan . ' ' . $tanggal_lahir->format('Y');

                        echo $s['tempat_lahir'] . ', ' . $tanggal_lahir_format;
                        ?>
                    </td>
                </tr>


                <tr class="tr">
                    <td class="th">3</td>
                    <td class="th">NIP</td>
                    <td class="th" colspan="2"><?php echo $nip ?></td>
                </tr>

                <tr class="tr">
                    <td class="th">4</td>
                    <td class="th">PANGKAT/GOLONGAN RUANG</td>
                    <td class="th" colspan="2"><?php echo $s['nama_golongan']; ?></td>
                </tr>

                <tr class="tr">
                    <td class="th">5</td>
                    <td class="th">NOMOR SK PANGKAT TERAKHIR<br> TANGGAL SK PANGKAT TERAKHIR</td>
                    <td class="th" colspan="2">NOMOR : <?php echo $s['nomor_sk']; ?> </br>TANGGAL :  <?php
                        $tgl_sk = new DateTime($s['tmt_mutasi']);
                        echo $tgl_sk->format('d-m-Y');
                        ?></td>
                </tr>

                <tr class="tr">
                    <td class="th">6</td>
                    <td class="th">JABATAN</td>
                    <td class="th" colspan="2"> <?php echo $s['jabatan']; ?></br><?php echo $s['nama_bidang']; ?></td>
                </tr>

                <tr class="tr">
                    <td class="th">7</td>
                    <td class="th">UNIT KERJA SAAT INI</td>
                    <td class="th" colspan="2">DINAS KOMUNIKASI, INFORMATIKA, PERSANDIAN, DAN STATISTIK</td>
                </tr>

                <tr class="tr">
                    <td class="th">8</td>
                    <td class="th">ALAMAT KANTOR</td>
                    <td class="th" colspan="2">JL. CILIK RIWUT Km. 3,5 PALANGKA RAYA</td>
                </tr>

                <tr class="tr">
                    <td class="th">9</td>
                    <td class="th">NOMOR TELP/HP PESERTA</td>
                    <td class="th" colspan="2"><?php echo $s['no_hp']; ?></td>
                </tr>

                <tr class="tr">
                    <td class="th">10</td>
                    <td class="th">EMAIL PESERTA</td>
                    <td class="th" colspan="2"><?php echo $s['email']; ?></td>
                </tr>

                </tr>

                <tr class="tr">
                    <td class="th" rowspan="3">11</td>
                    <td class="th" rowspan="3">UJIAN DIKLAT YANG DIIKUTI <br> KET : BERI TANDA</td>
                    <td class="th">Diklat Struktural</td>
                    <td class="th">
                        <input type="checkbox">
                        <input class="input" style="border: none;" type="text" placeholder="Ubah Tingkat Dinas">
                    </td>
                </tr>

                <tr class="tr">
                    <td class="th">Diklat Fungsional</td>
                    <td class="th">
                        <input type="checkbox">
                        <input class="input" style="border: none;" type="text" placeholder="Ubah Tingkat Dinas">
                    </td>
                </tr>

                <tr class="tr">
                    <td class="th">Diklat Teknis</td>
                    <td class="th">
                        <input type="checkbox">
                        <input class="input" style="border: none;" type="text" placeholder="Ubah Tingkat Dinas">
                    </td>
                </tr>

                <!-- Tambahkan baris data lainnya di sini -->
            </tbody>
        </table>
    </center>
    </br></br></br></br>
    <table style="border-collapse: collapse; width: 40%; float: right;">
        <tr>
            <td>Palangka Raya, <span id="tanggal"></span></td>
        </tr>
        <tr>
            <td>Yang membuat,</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>
                <?php echo $s['nama']; ?>
            </td>
        </tr>
        <tr>
            <td>
                NIP. <?php echo $nip; ?>
            </td>
        </tr>
    </table>

    <br><br><br><br><br><br><br><br><br><br><br><br>
    <center>
        <div class="d-flex justify-content-center" style="margin-top: 20px;">
            <button id="kembali" onclick="kembali()">Kembali</button>
            <button id="saveButton" onclick="printPage()">Cetak</button>
        </div>
    </center>

    <script>
        // Fungsi untuk mendapatkan tanggal dalam format bahasa Indonesia
        function getTanggalIndonesia() {
            const options = {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            const date = new Date().toLocaleDateString('id-ID', options);
            return date;
        }

        // Set tanggal dalam bahasa Indonesia ke elemen dengan id "tanggal"
        document.getElementById("tanggal").textContent = getTanggalIndonesia();

        function printPage() {
            // Fungsi untuk mencetak halaman
            window.print();
        }

        function kembali() {
            // Ganti URL sesuai dengan halaman tujuan
            window.location.href = "../kepegawaian/detail_pegawai.php?nip=<?php echo $nip ?>";
        }
    </script>
</body>

</html>