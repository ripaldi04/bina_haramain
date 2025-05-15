const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

document.querySelectorAll('.delete-order').forEach(button => {
    button.addEventListener('click', function () {
        const orderId = this.getAttribute('data-id');
        const row = this.closest('tr');

        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: 'Data yang dihapus tidak bisa dikembalikan!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/order/${orderId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    }
                })
                    .then(response => {
                        if (response.ok) {
                            // Optional: tampilkan alert sukses
                            Swal.fire({
                                title: 'Terhapus!',
                                text: 'Data berhasil dihapus.',
                                icon: 'success',
                                timer: 1500,
                                showConfirmButton: true
                            });

                            // Hapus baris dari tabel tanpa reload
                            row.remove();
                        } else {
                            Swal.fire('Gagal', 'Gagal menghapus data.', 'error');
                        }
                    });
            }
        });
    });
});


document.querySelectorAll('form[id^="editOrderModal"]').forEach(form => {
    form.addEventListener('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(this);

        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: data.message,
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: true
                    }).then(() => {
                        // Reload halaman setelah alert tertutup
                        location.reload();
                    });;
                } else {
                    Swal.fire({
                        title: 'Gagal!',
                        text: data.message || 'Terjadi kesalahan',
                        icon: 'error',
                        showConfirmButton: true
                    });
                }
            })
            .catch(() => {
                Swal.fire({
                    title: 'Gagal!',
                    text: 'Terjadi kesalahan pada server',
                    icon: 'error',
                    showConfirmButton: true
                });
            });
    });
});
