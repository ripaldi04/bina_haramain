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
