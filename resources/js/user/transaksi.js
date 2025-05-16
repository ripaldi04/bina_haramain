document.addEventListener('DOMContentLoaded', function () {
    const jenisPembayaran = document.getElementById('jenis_pembayaran');
    const totalHarga = parseFloat(jenisPembayaran.dataset.totalHarga); // Ambil dari data-attribute
    const totalBayarBox = document.getElementById('totalBayarBox');
    const totalBayarValue = document.getElementById('totalBayarValue');

    function hitungBayar() {
        const value = jenisPembayaran.value;
        let totalBayar = 0;

        if (value === 'booking') {
            totalBayar = totalHarga * 0.2;
        } else if (value === 'dp') {
            totalBayar = totalHarga * 0.5;
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

// const jenisPembayaranEl = document.getElementById('jenis_pembayaran');
// const totalHarga = parseFloat(jenisPembayaranEl.dataset.totalHarga);
// const previewEl = document.getElementById('preview-total');
// const hasilEl = document.getElementById('totalSetelahDiskon');
// const kodeReferralEl = document.getElementById('kode_referral');

// const referralDiskon = 100; // nilai diskon tetap, bisa juga kamu fetch via AJAX

// function updateTotal() {
//     const jenis = jenisPembayaranEl.value;
//     let diskon = kodeReferralEl.value.trim() !== '' ? referralDiskon : 0;
//     let bayar = totalHarga;

//     if (jenis === 'booking') bayar = totalHarga * 0.2;
//     else if (jenis === 'dp') bayar = totalHarga * 0.5;

//     bayar -= diskon;

//     hasilEl.innerText = 'Rp ' + bayar.toLocaleString('id-ID');
//     previewEl.classList.remove('d-none');
// }

// jenisPembayaranEl.addEventListener('change', updateTotal);
// kodeReferralEl.addEventListener('input', updateTotal);