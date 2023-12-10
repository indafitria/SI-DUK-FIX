<?php include '../sections/header.php';
include '../../config/koneksi.php';

?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $_SESSION['pendidikan'] = array();

    // $_SESSION['pendidikan']['strata'] = $_POST['strata'];
    // $_SESSION['pendidikan']['jurusan'] = $_POST['jurusan'];
    // $_SESSION['pendidikan']['konsentrasi'] = $_POST['konsentrasi'];
    // $_SESSION['pendidikan']['nama_kampus'] = $_POST['nama_kampus'];
    // $_SESSION['pendidikan']['tahun_lulus'] = $_POST['tahun_lulus'];

    $jabatan = $_POST['jabatan'];
    $_SESSION['jabatan'] = $jabatan;

    $id_golongan = $_POST['id_golongan'];
    $_SESSION['id_golongan'] = $id_golongan;

    $tmt_golongan = $_POST['tmt_golongan'];
    $_SESSION['tmt_golongan'] = $tmt_golongan;

    $id_bidang = $_POST['id_bidang'];
    $_SESSION['id_bidang'] = $id_bidang;

    $penempatan = $_POST['penempatan'];
    $_SESSION['penempatan'] = $penempatan;

    $tmt_jabatan = $_POST['tmt_jabatan'];
    $_SESSION['tmt_jabatan'] = $tmt_jabatan;

    $masa_kerja_tahun = $_POST['masa_kerja_tahun'];
    $_SESSION['masa_kerja_tahun'] = $masa_kerja_tahun;

    $masa_kerja_bulan = $_POST['masa_kerja_bulan'];
    $_SESSION['masa_kerja_bulan'] = $masa_kerja_bulan;

    // $_SESSION['diklat']= array();
    // $_SESSION['diklat']['jenis_diklat'] = $_POST['jenis_diklat'];
    // $_SESSION['diklat']['nama_diklat'] = $_POST['nama_diklat'];
    // $_SESSION['diklat']['tahun_diklat'] = $_POST['tahun_diklat'];
    // $_SESSION['diklat']['jmlh_jam'] = $_POST['jmlh_jam'];

    $_SESSION['jenis_diklat'] = $_POST['jenis_diklat'];
    $_SESSION['nama_diklat'] = $_POST['nama_diklat'];
    $_SESSION['tahun_diklat'] = $_POST['tahun_diklat'];
    $_SESSION['jmlh_jam'] = $_POST['jmlh_jam'];
    
  
};


?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Data</h4>
                </div>
                <div class="card-body">
                <form class="mb-4 border rounded p-3" action="tambahdata4.php" method="POST">
                        <div class="d-flex flex-column mb-3">
                            <div class="p-2 fw-bold fs-5">Pendidikan</div>
                            <div class="p-3">
                                <div class="d-flex flex-column mb-3">
                                    <div class="p-2 fw-bold fs-6">Pendidikan Menengah</div>
                                    <div class="p-2 mb-4 border rounded p-3">
                                        <div class="row mb-3">
                                            <label for="inputNamasekolah" class="col-sm-2 col-form-label">Nama Sekolah</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="inputNamasekolah" name="nama_kampus[]" placeholder="Masukkan Nama Sekolah">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputJurusan" class="col-sm-2 col-form-label">Jurusan</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="inputJurusan" name="jurusan" placeholder="Masukkan Jurusan">
                                                <input type="text" class="form-control" value="-" name="konsetrasi" placeholder="Masukkan Konsentrasi">
                                            
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputTahunlulus" class="col-sm-2 col-form-label">Tahun Lulus</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="inputTahunlulus" name="tahun_lulus" placeholder="Masukkan Tahun Lulus">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputSKJabatan" class="col-sm-2 col-form-label">Upload Ijazah*</label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control" id="inputIjazah" name="ijazah" accept=".pdf">
                                                <div class="form-text" id="basic-addon4">Jenis file PDF maksimal 15 MB*.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex flex-column mb-3">
                                    <div class="p-2 fw-bold fs-6">Pendidikan Tinggi</div>
                                    <form>
                                        <div class="control-group after-add-more mb-4 border rounded p-3">
                                            <div class="p-2">
                                                <div class="row mb-3">
                                                    <label for="inputStrata" class="col-sm-2 col-form-label">Strata</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="strata[]" class="form-control" id="inputStrata" placeholder="Masukkan Strata">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputJurusan" class="col-sm-2 col-form-label">Jurusan</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="jurusan[]" class="form-control" id="inputJurusan" placeholder="Masukkan Jurusan">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputKonsentrasi" class="col-sm-2 col-form-label">Konsentrasi</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="konsentrasi[]" class="form-control" id="inputKonsentrasi" placeholder="Masukkan Konsentrasi">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputAlumni" class="col-sm-2 col-form-label">Alumni</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="alumni[]" class="form-control" id="inputAllumni" placeholder="Masukkan Alumni">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputTahunlulus" class="col-sm-2 col-form-label">Tahun Lulus</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" name="tahunlulus[]" class="form-control" id="inputTahunlulus" placeholder="Masukkan Tahun Lulus">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputSKJabatan" class="col-sm-2 col-form-label">Upload Ijazah*</label>
                                                    <div class="col-sm-9">
                                                        <input type="file" class="form-control" id="inputIjazah" accept=".pdf">
                                                        <div class="form-text" id="basic-addon4">Jenis file PDF maksimal 15 MB*.
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <button class="btn btn-sm btn-success add-more" type="button">Add</button> -->
                                            </div>
                                        </div>
                                    </form>

                                    <div class="copy hide" style="display: none;">
                                        <div class="control-group mb-4 border rounded p-3">
                                            <div class="p-2">
                                                <div class="row mb-3">
                                                    <label for="inputStrata" class="col-sm-2 col-form-label">Strata</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="strata[]" class="form-control" id="inputStrata" placeholder="Masukkan Strata">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputJurusan" class="col-sm-2 col-form-label">Jurusan</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="jurusan[]" class="form-control" id="inputJurusan" placeholder="Masukkan Jurusan">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputKonsentrasi" class="col-sm-2 col-form-label">Konsentrasi</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="konsentrasi[]" class="form-control" id="inputKonsentrasi" placeholder="Masukkan Konsentrasi">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputAlumni" class="col-sm-2 col-form-label">Alumni</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="alumni[]" class="form-control" id="inputAllumni" placeholder="Masukkan Alumni">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputTahunlulus" class="col-sm-2 col-form-label">Tahun Lulus</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" name="tahunlulus[]" class="form-control" id="inputTahunlulus" placeholder="Masukkan Tahun Lulus">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputSKJabatan" class="col-sm-2 col-form-label">Upload Ijazah*</label>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="d-flex justify-content-end">
                        <div class="p-1">
                        <div class="d-md-flex">
                        <a class="btn btn-primary" onclick="window.history.back();" role="button">
                                    &lt; Previous
                                </a>
                            </div>
                        </div>
                        <div class="p-1">
                            <div class="d-md-flex">
                                <a class="btn btn-primary" href="../kepegawaian/tambahdata4.php" role="button">Next ></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $(".add-more").click(function() {
            var html = $(".copy").html();
            $(".after-add-more").after(html);
        });

        // saat tombol remove dklik control group akan dihapus 
        $("body").on("click", ".remove", function() {
            $(this).parents(".control-group").remove();
        });
    });
</script>

<?php include '../sections/footer.php'; ?>