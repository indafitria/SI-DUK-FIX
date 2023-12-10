<?php include '../sections/header.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Data</h4>
                </div>
                <div class="card-body">

                    <form class="mb-4 border rounded p-3" onsubmit="return validateForm();" action="../kepegawaian/tambahdata2.php" method="post">
                        <div class="row mb-3">
                            <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputNama" placeholder="Masukkan Nama">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputNip" class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputNip" placeholder="Masukkan NIP">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputTempatLahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="inputTempatLahir">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputTanggalLahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="inputTanggalLahir">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputUsia" class="col-sm-2 col-form-label">Usia</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputUsia" placeholder="Masukkan Usia">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputJenisKelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-9">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected disabled>Pilih Jenis Kelamin</option>
                                    <option value="1">Laki-laki</option>
                                    <option value="2">Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputAgama" class="col-sm-2 col-form-label">Agama</label>
                            <div class="col-sm-9">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected disabled>Pilih Agama</option>
                                    <option value="1">Islam</option>
                                    <option value="2">Kristen</option>
                                    <option value="3">Katolik</option>
                                    <option value="4">Hindu</option>
                                    <option value="5">Buddha</option>
                                    <option value="6">Konghucu</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputAlamat" placeholder="Masukkan Alamat">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputNoHP" class="col-sm-2 col-form-label">Nomor HP</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputNoHP" placeholder="Masukkan Nomor HP">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="inputEmail" placeholder="Masukkan Email">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputNpwp" class="col-sm-2 col-form-label">Nomor NPWP</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputNpwp" placeholder="Masukkan NPWP">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputStatus" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected disabled>Pilih Status</option>
                                    <option value="1">Aktif</option>
                                    <option value="2">Pensiun</option>
                                </select>
                            </div>
                        </div>
                    </form>

                    <div class="d-md-flex justify-content-end">
                        <a class="btn btn-primary" href="../kepegawaian/tambahdata2.php" role="button">Next ></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function validateForm() {
        var inputs = document.getElementsByTagName("input");
        for (var i = 0; i < inputs.length; i++) {
            if (inputs[i].value === "") {
                alert("Harap isi semua kolom form sebelum melanjutkan.");
                return false;
            }
        }

        // Mencegah navigasi ke halaman selanjutnya
        window.location.href = "../kepegawaian/contoh2.php";
        return false;
    }
</script>

<?php include '../sections/footer.php'; ?>