<?php include '../sections/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $_SESSION['nama'] = $nama;

    $nip = $_POST['nip'];
    $_SESSION['nip'] = $nip;

    $tl = $_POST['tempat_lahir'];
    $_SESSION['tempat_lahir'] = $tl;

    $ttl = $_POST['tanggal_lahir'];
    $_SESSION['tanggal_lahir'] = $ttl;

    $usia = $_POST['usia'];
    $_SESSION['usia'] = $usia;
    
    $jk = $_POST['jenis_kelamin'];
    $_SESSION['jenis_kelamin'] = $jk;
    $agama = $_POST['agama'];
    $_SESSION['agama'] = $agama;
    $alamat = $_POST['alamat'];
    $_SESSION['alamat'] = $alamat;
    $no_hp = $_POST['no_hp'];
    $_SESSION['no_hp'] = $no_hp;
    $email = $_POST['email'];
    $_SESSION['email'] = $email;
    $npwp = $_POST['npwp'];
    $_SESSION['npwp'] = $npwp;
    $status = $_POST['status'];
    $_SESSION['status'] = $status;

   
}; ?>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Data</h4>
                </div>
                <div class="card-body">
                    <form>
                        <div class="d-flex flex-column mb-3">
                            <div class="p-2 fw-bold fs-5">Catatan Mutasi Kepegawaian</div>

                            <div class="d-flex flex-column mb-3 ">
                                <div class="control-group after-add-more p-2">
                                    <table id="diklat1" class="table table-bordered text-center">
                                        <thead>
                                            <tr>
                                                <th>Catatan Mutasi Kepegawaian</th>
                                                <th>Upload SK</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><textarea type="text" name="catatan[]" style="width: 550px; border: 1px solid #ccc;"></textarea></td>
                                                <td><input type="file" name="file[]" accept=".pdf" /></td>
                                                <td>
                                                    <button class="btn btn-success btn-sm add-more" type="button" onclick="tambahBaris1()">
                                                        <i class="bi bi-plus-lg"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- <form>
                                <div class="control-group after-add-more mb-4 border rounded p-3">
                                    <div class="p-2">
                                        <div class="row mb-3">
                                            <label for="inputMutasi" class="col-sm-2 col-form-label">Catatan Mutasi</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="inputMutasi" placeholder="Masukkan Mutasi">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputSKJabatan" class="col-sm-2 col-form-label">Upload SK*</label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control" id="inputSK" accept=".pdf">
                                                <div class="form-text" id="basic-addon4">Jenis file PDF maksimal 15 MB*.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="copy hide" style="display: none;">
                                <div class="control-group mb-4 border rounded p-3">
                                    <div class="p-2">
                                        <div class="row mb-3">
                                            <label for="inputMutasi" class="col-sm-2 col-form-label">Catatan Mutasi</label>
                                            <div class="col-sm-9">
                                                <input type="textarea" name="tahunlulus[]" class="form-control" id="inputMutasi" placeholder="Masukkan Mutasi">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputSKJabatan" class="col-sm-2 col-form-label">Upload SK*</label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control" id="inputIjazah" accept=".pdf">
                                                <div class="form-text" id="basic-addon4">Jenis file PDF maksimal 15 MB*.
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-sm btn-danger remove" type="button">Hapus</button>
                                    </div>
                                </div>
                            </div>
                            <div class="justify-content-end">
                                <button class="btn btn-sm btn-success add-more" type="button">Tambah</button>
                            </div> -->

                            <div class="mt-5 mb-4 border rounded p-3">
                                <div class="row mb-3">
                                    <label for=" inputSKJabatan" class="col-sm-2 col-form-label">Upload Pas Foto*</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" id="inputIjazah" accept=".pdf">
                                        <div class="form-text" id="basic-addon4">Jenis file PDF maksimal 15 MB*.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="p-2 ">
                        <div class="d-flex flex-row mb-3 justify-content-center">
                            <div class="p-2">
                                <input class="btn btn-danger d-grid gap-2 col-12 mx-auto" type="submit" value="Reset">
                            </div>
                            <div class="p-2">
                                <input class="btn btn-success d-grid gap-2 col-12 mx-auto" type="submit" value="Simpan">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-start">
                        <div class="p-1">
                            <div class="d-md-flex">
                                <a class="btn btn-primary" href="../kepegawaian/tambahdata3.php" role="button">
                                    < Previous</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function tambahBaris1() {
        // Mendapatkan referensi ke tabel dengan ID "diklat"
        var table = document.getElementById("diklat1").getElementsByTagName('tbody')[0];

        // Menambahkan baris baru ke dalam tabel
        var row = table.insertRow(table.rows.length);

        // Menambahkan sel-sel ke dalam baris baru
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);

        // Menambahkan elemen input (teks) ke dalam sel-sel pertama, kedua, dan ketiga
        cell1.innerHTML = '<textarea type="text" name="catatan[]" style="width: 550px; border: 1px solid #ccc;"></textarea>';

        // Menambahkan elemen input (file) ke dalam sel keempat
        cell2.innerHTML = '<input type="file" name="file[]" accept=".pdf" />';

        // Menambahkan tombol "Remove" ke dalam sel kelima
        cell3.innerHTML = '<button class="btn btn-danger btn-sm remove" type="button" onclick="hapusBaris1(this)"><i class="bi bi-x-lg"></i></button>';
    }

    function hapusBaris1(button) {
        // Mendapatkan baris yang mengandung tombol "Remove" yang ditekan
        var row = button.parentNode.parentNode;

        // Menghapus baris tersebut dari tabel
        row.parentNode.removeChild(row);
    }
</script>

<?php include '../sections/footer.php'; ?>