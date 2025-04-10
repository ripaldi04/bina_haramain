import Swal from 'sweetalert2';

document.addEventListener('DOMContentLoaded', () => {
    // Cek jika ada pesan sukses
    const successMessage = document.querySelector('meta[name="success-message"]')?.content;
    if (successMessage) {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: successMessage,
            confirmButtonColor: '#28a745'
        });
    }

    // Cek jika ada pesan error
    const errorMessage = document.querySelector('meta[name="error-message"]')?.content;
    if (errorMessage) {
        Swal.fire({
            icon: 'error',
            title: 'Oops!',
            text: errorMessage,
            confirmButtonColor: '#dc3545'
        });
    }

    // Cek jika ada error validasi multiple
    const errorList = document.querySelectorAll('meta[name="error-list"]');
    if (errorList.length > 0) {
        let message = '';
        errorList.forEach(meta => {
            message += `• ${meta.content}\n`;
        });

        Swal.fire({
            icon: 'error',
            title: 'Gagal Login',
            text: message,
            confirmButtonColor: '#dc3545'
        });
    }
});

// Konfirmasi logout
const logoutBtn = document.getElementById('logout-confirm');
if (logoutBtn) {
    logoutBtn.addEventListener('click', (e) => {
        e.preventDefault();

        Swal.fire({
            title: 'Keluar dari akun?',
            text: 'Anda yakin ingin logout?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, keluar',
            cancelButtonText: 'Batal',
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    });
}

