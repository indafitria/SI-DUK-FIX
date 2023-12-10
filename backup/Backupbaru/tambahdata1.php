<?php include '../sections/header.php';
include '../../config/koneksi.php';

?>

<?php

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $nama = $_POST['nama'];
//     $_SESSION['nama'] = $nama;
//     $nip = $_POST['nip'];
//     $_SESSION['nip'] = $nip;
//     $tl = $_POST['tempat_lahir'];
//     $_SESSION['tempat_lahir'] = $tl;
//     $ttl = $_POST['tanggal_lahir'];
//     $_SESSION['tanggal_lahir'] = $ttl;
//     $usia = $_POST['usia'];
//     $_SESSION['usia'] = $usia;
//     $jk = $_POST['jenis_kelamin'];
//     $_SESSION['jenis_kelamin'] = $jk;
//     $agama = $_POST['agama'];
//     $_SESSION['agama'] = $agama;
//     $alamat = $_POST['alamat'];
//     $_SESSION['alamat'] = $alamat;
//     $no_hp = $_POST['no_hp'];
//     $_SESSION['no_hp'] = $no_hp;
//     $email = $_POST['email'];
//     $_SESSION['email'] = $email;
//     $npwp = $_POST['npwp'];
//     $_SESSION['npwp'] = $npwp;
//     $status = $_POST['status'];
//     $_SESSION['status'] = $status;

   
// };


?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Data</h4>
                </div>
                <div class="card-body">

                    <form class="mb-4 border rounded p-3" action="tambahdata2.php" method="POST">
                        <div class="row mb-3">
                            <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputNama" name="nama" placeholder="Masukkan Nama" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputNip" class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="inputNip" name="nip" placeholder="Masukkan NIP" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputTempatLahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputTempatLahir" name="tempat_lahir" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" oninput="hitungUsia()" required="required" placeholder="Masukkan Tanggal Lahir">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="usia" class="col-sm-2 col-form-label">Usia</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="usia" id="input_usia" required="required" readonly>
                                <span id="hasil_usia"></span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputJenisKelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-9">
                                <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                                    <option selected disabled>Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputAgama" class="col-sm-2 col-form-label">Agama</label>
                            <div class="col-sm-9">
                                <select class="form-select" aria-label="Default select example" name="agama">
                                    <option selected disabled>Pilih Agama</option>
                                    <option value="islam">Islam</option>
                                    <option value="kristen-protestan">Kristen</option>
                                    <option value="kristen-katholik">Katolik</option>
                                    <option value="hindu">Hindu</option>
                                    <option value="buddha">Buddha</option>
                                    <option value="konghucu">Konghucu</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputAlamat" name="alamat" placeholder="Masukkan Alamat">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputNoHP" class="col-sm-2 col-form-label">Nomor HP</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputNoHP" name="no_hp" placeholder="Masukkan Nomor HP">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Masukkan Email">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputNpwp" class="col-sm-2 col-form-label">Nomor NPWP</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputNpwp" name="npwp" placeholder="Masukkan NPWP">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputStatus" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select class="form-select" aria-label="Default select example" name="status">
                                    <option selected disabled>Pilih Status</option>
                                    <option value="Pegawai_Aktif">Pegawai Aktif</option>
                                    <option value="Pensiun">Pensiun</option>
                                </select>
                            </div>
                        </div>


                        <div class="d-md-flex justify-content-end">
                            <!-- <a class="btn btn-primary" type="submit" name="tambah_1" role="button">Next ></a> -->
                            <button type="submit" name="next1" class="btn btn-primary">Next ></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../sections/footer.php'; ?>
<!-- <script>
    function hitungUsia() {
        var tanggalLahir = document.getElementById("tanggal_lahir").value;
        var tanggalLahirObj = new Date(tanggalLahir);
        var tanggalSekarang = new Date();
        var selisihUsia = tanggalSekarang - tanggalLahirObj;

        var usiaTahun = Math.floor(selisihUsia / 31536000000); // 1 tahun = 31.536.000.000 milidetik
        var usiaBulan = Math.floor((selisihUsia % 31536000000) / 2628000000); // 1 bulan = 2.628.000.000 milidetik

        // var hasilUsia = "Usia Anda adalah " + usiaTahun + " tahun " + usiaBulan + " bulan.";
        // document.getElementById("hasil_usia").textContent = hasilUsia;

        // Mengisi input usia dengan hasil usia
        document.getElementById("input_usia").value = usiaTahun + " tahun " + usiaBulan + " bulan";
    }

    // Memanggil fungsi hitungUsia saat halaman dimuat untuk mengisi input usia dengan format yang benar
    document.addEventListener('DOMContentLoaded', function() {
        hitungUsia();
    });
</script> -->

<script>
function hitungUsia() {
    var tanggalLahir = document.getElementById("tanggal_lahir").value;
    var tanggalLahirObj = new Date(tanggalLahir);

    // Check if the input is a valid date
    if (isNaN(tanggalLahirObj.getTime())) {
        document.getElementById("input_usia").value = "";
        return;
    }

    var tanggalSekarang = new Date();
    var selisihUsia = tanggalSekarang - tanggalLahirObj;
    var usiaTahun = Math.floor(selisihUsia / 31536000000); // 1 tahun = 31.536.000.000 milidetik
    var usiaBulan = Math.floor((selisihUsia % 31536000000) / 2628000000); // 1 bulan = 2.628.000.000 milidetik

    // Set the input field value
    document.getElementById("input_usia").value = usiaTahun + " tahun " + usiaBulan + " bulan";
}

// Memanggil fungsi hitungUsia saat halaman dimuat untuk mengisi input usia dengan format yang benar
document.addEventListener('DOMContentLoaded', function() {
    hitungUsia();
});

</script>
