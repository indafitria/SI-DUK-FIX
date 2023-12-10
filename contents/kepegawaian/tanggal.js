
        // Mendapatkan tanggal hari ini dalam JavaScript
        var tanggalHariIni = new Date();
        var options = { year: 'numeric', month: 'long', day: '2-digit' };
        var tanggalFormat = tanggalHariIni.toLocaleDateString('id-ID', options).toUpperCase();

        // Menampilkan tanggal dalam elemen HTML
        document.getElementById("tanggalHariIni").innerHTML = tanggalFormat;
