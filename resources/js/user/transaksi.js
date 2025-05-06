document.addEventListener('DOMContentLoaded', function () {
    const jenisPembayaran = document.getElementById('jenis_pembayaran');
    const totalHarga = parseFloat(jenisPembayaran.dataset.totalHarga); // Ambil dari data-attribute
    const totalBayarBox = document.getElementById('totalBayarBox');
    const totalBayarValue = document.getElementById('totalBayarValue');

    function hitungBayar() {
        const value = jenisPembayaran.value;
        let totalBayar = 0;

        if (value === 'booking') {
            totalBayar = totalHarga * 0.5;
        } else if (value === 'dp') {
            totalBayar = totalHarga * 0.12;
        } else if (value === 'cash') {
            totalBayar = totalHarga;
        }

        if (value) {
            totalBayarBox.style.display = 'block';
            totalBayarValue.textContent = totalBayar.toLocaleString('en-US', {
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            });
        } else {
            totalBayarBox.style.display = 'none';
        }
    }

    jenisPembayaran.addEventListener('change', hitungBayar);
});
