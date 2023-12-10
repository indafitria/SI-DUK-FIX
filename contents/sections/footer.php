<!-- Footer -->
  <!-- <div class="card text-center bg-primary mt-5"  style="border-radius: 0px;"> -->
  <div class="card text-center mt-5" style="background-color: #2A31D3; border-radius: 0px; color: white;">
    <div class="card-body text-light">
      <h5 class="card-title fw-normal" style="font-size: 15px;">Dinas Komunikasi Informatika Persandian dan Statistik
      </h5>
      <h5 class="card-title fw-normal mb-3" style="font-size: 15px;">Provinsi Kalimantan Tengah</h5>
    <div class="card-footer text-body-secondary" style="font-size: 12px;">
      <p class="card-text text-light ">Copyright ©2023 Magang Mandiri Universitas Palangka Raya</p>
    </div>
  </div>
<!-- Footer -->
</body>

</html>


<!-- <script>
        function hitungUsia() {
            var tanggalLahir = document.getElementById("tanggal_lahir").value;
            var tanggalLahirObj = new Date(tanggalLahir);
            var tanggalSekarang = new Date();
            var selisihUsia = tanggalSekarang - tanggalLahirObj;

            var usiaTahun = Math.floor(selisihUsia / 31536000000); // 1 tahun = 31.536.000.000 milidetik
            var usiaBulan = Math.floor((selisihUsia % 31536000000) / 2628000000); // 1 bulan = 2.628.000.000 milidetik

            var hasilUsia = "Usia Anda adalah " + usiaTahun + " tahun " + usiaBulan + " bulan.";
            // document.getElementById("hasil_usia").textContent = hasilUsia;

            // Mengisi input usia dengan hasil usia
            document.getElementById("input_usia").value = usiaTahun + " tahun " + usiaBulan + " bulan";
        }
    </script> -->

<!-- <script>
    function hitungUsia() {
        var tanggalLahir = document.getElementById("tanggal_lahir").value;
        
        if (tanggalLahir) { // Memeriksa apakah tanggal lahir sudah diisi
            var tanggalLahirObj = new Date(tanggalLahir);
            var tanggalSekarang = new Date();
            var selisihUsia = tanggalSekarang - tanggalLahirObj;

            var usiaTahun = Math.floor(selisihUsia / 31536000000); // 1 tahun = 31.536.000.000 milidetik
            var usiaBulan = Math.floor((selisihUsia % 31536000000) / 2628000000); // 1 bulan = 2.628.000.000 milidetik

            // Mengisi input usia dengan hasil usia
            document.getElementById("input_usia").value = usiaTahun + " tahun " + usiaBulan + " bulan";
        } else {
            // Jika tanggal lahir kosong, kosongkan input usia juga
            document.getElementById("input_usia").value = "";
        }
    }

    // Memanggil fungsi hitungUsia saat halaman dimuat untuk mengisi input usia dengan format yang benar
    document.addEventListener('DOMContentLoaded', function() {
        hitungUsia();
    });
</script> -->


<!-- input penempatan hidden -->
<script>
    // Ambil elemen select dan input teks
    var selectBidang = document.getElementById('id_bidang');
    var inputNamaBidang = document.getElementById('nama_bidang_text');

    // Tambahkan event listener untuk mengubah nilai input teks
    selectBidang.addEventListener('change', function() {
        // Dapatkan nama bidang yang sesuai dengan ID yang dipilih
        var selectedOption = selectBidang.options[selectBidang.selectedIndex];
        var namaBidang = selectedOption.textContent;

        // Setel nilai input teks dengan nama bidang yang dipilih
        inputNamaBidang.value = namaBidang;
    });
</script>

<script>
    // Ambil elemen select dan input teks
    var selectGolongan = document.getElementById('id_golongan');
    var inputNamaGolongan = document.getElementById('nama_golongan_text');

    // Tambahkan event listener untuk mengubah nilai input teks
    selectGolongan.addEventListener('change', function() {
        // Dapatkan nama golongan yang sesuai dengan ID yang dipilih
        var selectedOption = selectGolongan.options[selectGolongan.selectedIndex];
        var namaGolongan = selectedOption.textContent;

        // Setel nilai input teks dengan nama golongan yang dipilih
        inputNamaGolongan.value = namaGolongan;
    });
</script>

<!-- <script>
function resetData(){
  alert('Data Telah di Reset');
}
</script> -->

<script>
function resetData(){
  window.alert('Yakin ingin reset data?');
}


</script>
<script>
// Ketika pengguna menggulir ke bawah 20px dari bagian atas halaman, tampilkan tombol
window.onscroll = function() {
  scrollFunction();
};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("myBtn").style.display = "block";
  } else {
    document.getElementById("myBtn").style.display = "none";
  }
}

// Ketika tombol diklik, gulir ke bagian atas halaman
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

</script>