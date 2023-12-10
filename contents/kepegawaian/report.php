


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

        // Fungsi untuk mencetak ke file PDF
        function printToPDF() {
            const namaPembuat = document.querySelector('.ttd-2 input').value;
            const date = getTanggalIndonesia();

            const content = document.getElementById("content"); // Gantilah "content" dengan ID elemen konten utama Anda

            const opt = {
                margin: 10,
                filename: 'biodata.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
            };

            html2pdf().from(content).set(opt).outputPdf(function (pdf) {
                const blob = pdf.output('blob');
                const url = URL.createObjectURL(blob);

                const a = document.createElement('a');
                a.href = url;
                a.download = 'biodata.pdf';
                a.style.display = 'none';
                document.body.appendChild(a);
                a.click();

                setTimeout(function () {
                    document.body.removeChild(a);
                    URL.revokeObjectURL(url);
                }, 100);
            });
        }

        const saveButton = document.getElementById("saveButton");
        saveButton.addEventListener("click", printToPDF);
    </script>