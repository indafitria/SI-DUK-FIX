<?php


include '../sections/header.php';
include '../../config/koneksi.php';
include '../../function/fungsi.php';


error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

//jika tidak ada login sebelumnya maka diarahkan ke login.php
if (empty($_SESSION['username']) and empty($_SESSION['pass'])) {
  echo "<script> window.location = '../../index.php' </script>";
}
;


$id_admin = $_SESSION['id_user'];
$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id_admin'");
$isi = mysqli_fetch_array($sql);

$nama = $isi['nama'];

?>


<div class="d-flex flex-column mt-5">
  <div class="p-2">
    <!-- <div class="card custom-card1 mx-auto col-md-1"> -->
    <div class="card custom-card1 mx-auto col-md-1">
      <div class="card-body p-4">
        <h1 id="judul1">Sistem Informasi Data Umum Kepegawaian</h1>
        <h2 id="judul2">Dinas Komunikasi Informatika Persandian Dan Statistik</h2>
        <h3 id="judul3">JL. Tjilik Riwut Km.3,5 No. 18A, Palangka Raya - Provinsi Kalimantan Tengah</h3>
      </div>
    </div>
  </div>
  <div class="p-2 ">
    <div class="card custom-card2 mx-auto col-md-1">
      <div class="card-body p-4">
        <h1 id="judul1">Selamat Datang
          <?php echo $nama ?>
        </h1>
        <h2 id="judul2">Anda login sebagai admin. Anda memiliki akses penuh terhadap sistem.</h2>
      </div>
    </div>
  </div>

  <div class="container pt-3">
    <div class="row justify-content-center">

      <div class="col-lg-4 col-md-6 col-sm-4">
        <div class="card text-white bg-success">
          <div class="card-body text-left">
            <h1 class="display-4">
              <i class="bi bi-people-fill">
                <?php echo jumlah_pegawai(); ?>
              </i>
            </h1>
            <p class="card-text">Jumlah Pegawai</p>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card text-white bg-secondary">
          <div class="card-body text-left">
            <h1 class="display-4">
              <i class="bi bi-person-fill">
                <?php echo jumlah_jabatan(); ?>
              </i>
            </h1>
            <p class="card-text">Jumlah Jabatan</p>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card text-white bg-danger">
          <div class="card-body text-left">
            <h1 class="display-4">
              <i class="bi bi-file-earmark-fill">
                <?php echo jumlah_bidang(); ?>
              </i>
            </h1>
            <p class="card-text">Jumlah Penempatan</p>
          </div>
        </div>
      </div>

    </div>

  </div>

  <div class="container pt-4">
    <div class="row justify-content-center">

      <div class="col-lg-3 col-md-6 col-sm-4">
        <div class="card text-white bg-dark" style="width: 280px;">
          <h5 class="card-header"><i class="fas fa-venus-mars"></i> Jenis Kelamin </h5>
          <div class="card-body text-left">
            <canvas id="jenisKelaminChart" width="100" height="140"></canvas>
          </div>
        </div>
      </div>

      <div class="col-lg-9 col-md-6 col-sm-4 ps-4">
        <div class="card text-white bg-warning">
          <h5 class="card-header"><i class="fas fa-id-card"></i> Jumlah Golongan</h5>
          <div class="card-body text-left">
            <canvas id="barChart" height="131"></canvas>
          </div>
        </div>
      </div>
      
    </div>
  </div>

</div>
</div>

<?php
$jumlah_pria = jumlah_pria();
$jumlah_perempuan = jumlah_perempuan();

$jumlah_gol_1a = jumlah_gol_1a();
$jumlah_gol_1b = jumlah_gol_1b();
$jumlah_gol_1c = jumlah_gol_1c();
$jumlah_gol_1d = jumlah_gol_1d();
$jumlah_gol_2a = jumlah_gol_2a();
$jumlah_gol_2b = jumlah_gol_2b();
$jumlah_gol_2c = jumlah_gol_2c();
$jumlah_gol_2d = jumlah_gol_2d();
$jumlah_gol_3a = jumlah_gol_3a();
$jumlah_gol_3b = jumlah_gol_3b();
$jumlah_gol_3c = jumlah_gol_3c();
$jumlah_gol_3d = jumlah_gol_3d();
$jumlah_gol_4a = jumlah_gol_4a();
$jumlah_gol_4b = jumlah_gol_4b();
$jumlah_gol_4c = jumlah_gol_4c();
$jumlah_gol_4d = jumlah_gol_4d();
$jumlah_gol_4e = jumlah_gol_4e();
?>

<script>
  // Data jenis kelamin
  var dataJenisKelamin = {
    labels: ["Laki-Laki", "Perempuan"],
    datasets: [{
      data: [
        <?php echo $jumlah_pria ?> ,  
        <?php echo $jumlah_perempuan ?>
      ], // Ganti dengan data sesuai kebutuhan
      backgroundColor: ["#4E5180", "#7D0552"],
    }]
  };

  // Konfigurasi chart
  var chartConfig = {
    type: 'pie',
    data: dataJenisKelamin
  };

  // Mendapatkan elemen canvas dan menginisialisasi chart
  var ctx = document.getElementById('jenisKelaminChart').getContext('2d');
  var jenisKelaminChart = new Chart(ctx, chartConfig);
</script>

<script>
  // Data untuk diagram batang
  // Data untuk diagram batang
var data = {
  labels: [
    "Juru Muda (I/a)",
    "Juru Muda Tingkat I (I/b)",
    "Juru (I/c)",
    "Juru Tingkat I (I/d)",
    "Pengatur Muda (II/a)",
    "Pengatur Muda Tingkat I (II/b)",
    "Pengatur (II/c)",
    "Pengatur Tingkat I (II/d)",
    "Penata Muda (III/a)",
    "Pengatur Muda Tingkat I (III/b)",
    "Penata (III/c)",
    "Penata Tingkat I (III/d)",
    "Pembina (IV/a)",
    "Pembina Tingkat I (IV/b)",
    "Pembina Utama Muda (IV/c)",
    "Pembina Utama Madya (IV/d)",
    "Pembina Utama (IV/e)"
  ],
  datasets: [{
    label: 'Jumlah Data',
    data: [
      <?php 
       echo $jumlah_gol_1a
      ?>,
      <?php 
        echo $jumlah_gol_1b
       ?>,
       <?php 
        echo $jumlah_gol_1c
       ?>,
       <?php 
       echo $jumlah_gol_1d
       ?>,
       <?php 
       echo $jumlah_gol_2a
       ?>,
       <?php 
       echo $jumlah_gol_2b
       ?>,
       <?php 
       echo $jumlah_gol_2c
       ?>,
       <?php 
       echo $jumlah_gol_2d
       ?>,
       <?php 
       echo $jumlah_gol_3a
       ?>,
       <?php 
       echo $jumlah_gol_3b
       ?>,
       <?php 
       echo $jumlah_gol_3c
       ?>,
       <?php 
       echo $jumlah_gol_3d
       ?>,
       <?php 
       echo $jumlah_gol_4a
       ?>,
       <?php 
       echo $jumlah_gol_4b
       ?>,
       <?php 
       echo $jumlah_gol_4c
       ?>,
       <?php 
       echo $jumlah_gol_4d
       ?>,
       <?php 
       echo $jumlah_gol_4e
       ?>
    ], // Anda dapat mengganti nilai ini sesuai dengan jumlah data yang dimiliki
    backgroundColor: 'black',
  }]
};


  // Konfigurasi opsi diagram batang
  var options = {

    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true,
          fontColor: 'black' // Warna tulisan label pada sumbu y
        }
      }],
      xAxes: [{
        ticks: {
          fontColor: 'black' // Warna tulisan label pada sumbu x
        }
      }]
    }
  };
  // Mendapatkan elemen canvas
  var ctx = document.getElementById('barChart').getContext('2d');

  // Membuat diagram batang
  var barChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: options
  });
</script>


<?php include '../sections/footer.php'; ?>