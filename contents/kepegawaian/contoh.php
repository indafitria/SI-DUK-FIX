<?php include '../sections/header.php'; ?>

<!-- <div class="container mt-5">
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

                           <form method="post" enctype="multipart/form-data">
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
                            
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div> -->

<!DOCTYPE html>
<html>

<head>
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
</head>

<body>

    <form onsubmit="return validateForm();" action="halaman-berikutnya.html" method="post">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama"><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br>

        <!-- Tambahkan input lainnya di sini -->

        <input type="submit" value="Lanjut">
    </form>

</body>

</html>