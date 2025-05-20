window.showVerifyAlert = function () {
    Swal.fire({
        icon: 'warning',
        title: 'Akses Ditolak',
        text: 'Silakan login dan verifikasi email terlebih dahulu untuk memesan paket!',
        confirmButtonText: 'Login Sekarang',
        showCancelButton: true,
        cancelButtonText: 'Batal',
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '/login'; // atau gunakan route() jika ingin inject dari Blade
        }
    });
}

   document.addEventListener('DOMContentLoaded', function () {
        const inputs = document.querySelectorAll('.kamar-input');
        const totalEl = document.getElementById('totalHarga');
        const layanan = document.getElementById('layanan').value;

        function formatCurrency(value) {
            if (layanan === 'umrah') {
                return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
            } else {
                return 'USD ' + new Intl.NumberFormat('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }).format(value);
            }
        }

        function updateTotal() {
            let total = 0;
            inputs.forEach(input => {
                const jumlah = parseInt(input.value) || 0;
                const harga = parseFloat(input.dataset.harga) || 0;
                total += jumlah * harga;
            });
            totalEl.textContent = formatCurrency(total);
        }

        inputs.forEach(input => {
            input.addEventListener('input', updateTotal);
        });
    });