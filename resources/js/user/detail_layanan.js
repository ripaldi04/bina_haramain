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
    const totalHargaEl = document.getElementById('totalHarga');
    const mataUang = totalHargaEl.dataset.currency;

    inputs.forEach(input => {
        input.addEventListener('input', hitungTotal);
    });

    function hitungTotal() {
        let total = 0;
        inputs.forEach(input => {
            const jumlah = parseInt(input.value) || 0;
            const harga = parseInt(input.dataset.harga) || 0;
            total += jumlah * harga;
        });

        // Tampilkan total sesuai mata uang
        if (mataUang === 'Rp') {
            totalHargaEl.innerText = `Rp ${total.toLocaleString('id-ID')}`;
        } else {
            totalHargaEl.innerText = `$ ${total.toLocaleString('id-ID')}`;
        }
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('formPesanPaket');

    if (form) {
        form.addEventListener('submit', function (e) {
            let kamarInputs = document.querySelectorAll('.kamar-input');
            let isAnyKamarFilled = false;

            kamarInputs.forEach(input => {
                if (parseInt(input.value) > 0) {
                    isAnyKamarFilled = true;
                }
            });

            if (!isAnyKamarFilled) {
                e.preventDefault(); // Mencegah submit
                Swal.fire({
                    icon: 'warning',
                    title: 'Kamar Belum Diisi',
                    text: 'Silakan pilih minimal 1 tipe kamar untuk melanjutkan pemesanan.',
                    confirmButtonText: 'OK'
                });
            }
        });
    }
});