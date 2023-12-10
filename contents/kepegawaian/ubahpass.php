<?php
include '../sections/header.php';
include '../../config/koneksi.php';
include '../../function/fungsi.php';

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

// Jika tidak ada login sebelumnya maka diarahkan ke login.php
if (empty($_SESSION['username']) and empty($_SESSION['pass'])) {
  echo "<script> window.location = '.././index.php' </script>";
}

// Proses ubah password
if (isset($_POST['ubah'])) {
  $id = $_SESSION['id_user'];
  $username = $_SESSION['username'];
  $password_lama = md5($_POST['pass_lama']); // Menggunakan md5 untuk password lama

  $sql = mysqli_query($koneksi, "SELECT pass from user WHERE id_user = '$id'");
  $isi = mysqli_fetch_array($sql);

  if ($isi) {
    $pass_baru = $_POST['pass_baru'];
    $konfirmasi_pass = $_POST['konfirmasi_pass'];

    // Periksa apakah password lama sesuai dengan yang ada di database
    if ($password_lama === $isi['pass']) {
      // Periksa apakah password baru dan konfirmasi password sama
      if ($pass_baru === $konfirmasi_pass) {
        $pass_fix = md5($konfirmasi_pass); // Menggunakan md5 untuk password baru
        $hasil = ubahPassword($id, $pass_fix);
        if ($hasil > 0) {
          echo "<script> alert('Password Berhasil Diubah'); window.location = '#'; </script>";
        } else {
          echo "<script> alert('Terjadi kesalahan saat mengubah password'); window.history.back(); </script>";
        }
      } else {
        echo "<script> alert('Password Baru dan Konfirmasi Password Tidak Sama, Silahkan cek kembali'); window.history.back(); </script>";
      }
    } else {
      echo "<script> alert('Password Lama Anda Salah'); window.history.back(); </script>";
    }
  }
}
?>

<div class="d-flex flex-column mt-1 mb-4">
  <div class="p-2">
    <div class="card card-ubahpass mx-auto col-md-6">
      <div class="card-header text-center">
        <h1 id="judul-pass1">Ubah Password</h1>

      </div>
      <form role="form" action="ubahpass.php" method="POST" enctype="multipart/form-data">
        <div class="body-ubahpass text-center">
          <div class="m-3 p-2" id="judul-pass2">
            <div class="row g-2 align-items-center mt-2">
              <div class="col-6 col-md-4">
                <label for="inputPassword6" class="col-form-label" id="judul-pass2">Password Lama</label>
              </div>
              <div class="col-sm-6 col-md-7">
                <input class="form-control" type="password" name="pass_lama" placeholder="Masukkan Password Lama" required>
              </div>
            </div>

            <div class="row g-2 align-items-center mt-2">
              <div class="col-6 col-md-4">
                <label for="inputPassword6" class="col-form-label">Password Baru</label>
              </div>
              <div class="col-sm-6 col-md-7">
                <input class="form-control" type="password" required pattern="[A-Za-z.0-9 ]{8,12}" title="Minimal 8 Karakter dan Maksimal 12 Karakter" name="pass_baru" oninput="this.reportValidity()" placeholder="Masukkan Password Baru" required>
              </div>
            </div>

            <div class="row g-2 align-items-center mt-2">
              <div class="col-6 col-md-4">
                <label for="inputPassword6" class="col-form-label">Ulangi Password</label>
              </div>
              <div class="col-sm-6 col-md-7">
                <input class="form-control" type="password" required pattern="[A-Za-z.0-9 ]{8,12}" title="Masukan Kembali Password Baru" name="konfirmasi_pass" oninput="this.reportValidity()" placeholder="Masukkan Ulang Password Baru" required>
              </div>
            </div>
          </div>
        </div>

  <div class="p-2">
    <div class="d-flex flex-row mb-3 justify-content-center">
      <div class="p-2">
        <input class="btn btn-danger d-grid gap-2 col-12 mx-auto" type="reset" value="Reset" onclick="resetData()">
      </div>
      <div class="p-2">
        <input class="btn btn-success d-grid gap-2 col-12 mx-auto" type="submit" name="ubah" value="Simpan">
      </div>
    </div>
  </div>
  </form>
</div>
</div>
</div>

<?php include '../sections/footer.php'; ?>