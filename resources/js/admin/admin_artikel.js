// search kolom
document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchPaket");
    const tableBody = document.getElementById("tableBody");

    if (searchInput && tableBody) {
        searchInput.addEventListener("keyup", function () {
            const searchTerm = searchInput.value.toLowerCase();
            const rows = tableBody.getElementsByTagName("tr");

            for (let row of rows) {
                const columns = row.getElementsByTagName("td");
                let matchFound = false;

                for (let col of columns) {
                    if (col.textContent.toLowerCase().includes(searchTerm)) {
                        matchFound = true;
                        break;
                    }
                }

                row.style.display = matchFound ? "" : "none";
            }
        });
    }
});

document.addEventListener('DOMContentLoaded', () => {
    const successEl = document.getElementById('artikelSuccess');
    if (successEl) {
        const message = successEl.dataset.message;
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: message,
            confirmButtonColor: '#3085d6',
        });
    }
});

// Ambil semua tombol edit
const editButtons = document.querySelectorAll('i.fa-edit');

const editModal = new bootstrap.Modal(document.getElementById('editModal'));
const editTitle = document.getElementById('editTitle');
const editSubJudul = document.getElementById('editSubJudul');
const editContent = document.getElementById('editContent');
const editImage = document.getElementById('editImage');
const saveChangesBtn = document.getElementById('saveChanges');

let currentArtikelId = null;

// Event klik tombol edit: isi modal dengan data dari row
editButtons.forEach(btn => {
    btn.addEventListener('click', (e) => {
        const tr = e.target.closest('tr');
        currentArtikelId = tr.dataset.id;

        editTitle.value = tr.dataset.judul;
        editSubJudul.value = tr.dataset.subjudul;
        editContent.value = tr.dataset.isi;

        editImage.value = null;

        editModal.show();
    });
});

// Event simpan perubahan
saveChangesBtn.addEventListener('click', () => {
    if (!currentArtikelId) return;

    const formData = new FormData();
    formData.append('judul', editTitle.value);
    formData.append('subjudul', editSubJudul.value);
    formData.append('isi', editContent.value);
    if (editImage.files[0]) {
        formData.append('gambar', editImage.files[0]);
    }

    fetch(`/admin/artikel/${currentArtikelId}/update`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: formData,
    })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: data.success,
                    confirmButtonColor: '#3085d6',
                }).then(() => {
                    // Reload halaman supaya update tampilan
                    window.location.reload();
                });
            } else {
                Swal.fire('Error', 'Terjadi kesalahan saat memperbarui artikel.', 'error');
            }
        })
        .catch(() => {
            Swal.fire('Error', 'Terjadi kesalahan saat memperbarui artikel.', 'error');
        });
});

document.querySelectorAll('.delete-artikel').forEach(btn => {
    btn.addEventListener('click', (e) => {
        const tr = e.target.closest('tr');
        const artikelId = tr.dataset.id;

        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Artikel akan dihapus secara permanen.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#aaa',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/admin/artikel/${artikelId}/delete`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    }
                })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire('Terhapus!', data.success, 'success')
                                .then(() => window.location.reload());
                        } else {
                            Swal.fire('Error', 'Gagal menghapus artikel.', 'error');
                        }
                    })
                    .catch(() => {
                        Swal.fire('Error', 'Terjadi kesalahan saat menghapus artikel.', 'error');
                    });
            }
        });
    });
});

