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

document.addEventListener('DOMContentLoaded', function () {
    const createForm = document.getElementById('createForm');
    const createModal = new bootstrap.Modal(document.getElementById('createModal'));
    const tableBody = document.getElementById('tableBody');

    createForm.addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(createForm);
        const data = Object.fromEntries(formData.entries());

        fetch('/admin/agen', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(data),
        })
            .then(res => {
                if (!res.ok) throw res;
                return res.json();
            })
            .then(response => {
                createModal.hide();
                createForm.reset();
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses!',
                    text: 'Agen berhasil ditambahkan.',
                    confirmButtonColor: '#3085d6',
                }).then(() => {
                    window.location.reload(); // reload tabel setelah notifikasi ditutup
                });
            })
            .catch(async err => {
                if (err.json) {
                    const errorData = await err.json();
                    let errorMessages = Object.values(errorData.errors).flat().join('<br>');

                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal menyimpan!',
                        html: errorMessages,
                        confirmButtonColor: '#d33',
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi kesalahan server.',
                        text: 'Silakan coba lagi nanti.',
                        confirmButtonColor: '#d33',
                    });
                }
            })
    })
});

document.addEventListener('click', function (e) {
    if (e.target.classList.contains('fa-edit')) {
        const row = e.target.closest('tr');
        const id = row.getAttribute('data-row-id');
        const name = row.children[1].textContent.trim();
        const email = row.children[2].textContent.trim();
        const phone = row.children[3].textContent.trim();
        const kode = row.children[4].textContent.trim();

        // Set ke form edit
        document.getElementById('editId').value = id;
        document.getElementById('editName').value = name;
        document.getElementById('editEmail').value = email;
        document.getElementById('editPhone').value = phone;
        document.getElementById('editKode').value = kode;

        // Tampilkan modal
        const editModal = new bootstrap.Modal(document.getElementById('editModal'));
        editModal.show();
    }
});

document.getElementById('saveChanges').addEventListener('click', function () {
    const id = document.getElementById('editId').value;
    const name = document.getElementById('editName').value;
    const email = document.getElementById('editEmail').value;
    const phone = document.getElementById('editPhone').value;
    const kode = document.getElementById('editKode').value;

    fetch(`/admin/agen/${id}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ name, email, phone, kode })
    })
        .then(res => {
            if (!res.ok) throw res;
            return res.json();
        })
        .then(response => {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Data agen berhasil diperbarui.',
                confirmButtonColor: '#3085d6',
            }).then(() => window.location.reload());
        })
        .catch(async err => {
            if (err.json) {
                const errorData = await err.json();
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal update!',
                    html: Object.values(errorData.errors).flat().join('<br>'),
                    confirmButtonColor: '#d33',
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi kesalahan.',
                    text: 'Silakan coba lagi nanti.',
                });
            }
        });
});

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.btn-delete').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const id = this.getAttribute('data-id');

            Swal.fire({
                title: 'Yakin ingin menghapus agen ini?',
                text: "Data tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/admin/agen/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                        .then(res => {
                            if (!res.ok) throw res;
                            return res.json();
                        })
                        .then(response => {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Data agen berhasil dihapus.',
                                confirmButtonColor: '#3085d6',
                            }).then(() => window.location.reload());
                        })
                        .catch(async err => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal menghapus!',
                                text: 'Terjadi kesalahan. Silakan coba lagi.',
                                confirmButtonColor: '#d33',
                            });
                        });
                }
            });
        });
    });
});