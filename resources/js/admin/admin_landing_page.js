import Swal from 'sweetalert2';


$('#editButton').on('click', function (event) {
    var button = $(this);
    var id = button.data('id');
    var header1 = button.data('header1');
    var header2 = button.data('header2');
    var deskripsi = button.data('deskripsi');
    var image_url = button.data('image_url');

    var modal = $('#editBannerModal'); // Referensi modal
    modal.find('.modal-body #banner_id').val(id);
    modal.find('.modal-body #header1').val(header1);
    modal.find('.modal-body #header2').val(header2);
    modal.find('.modal-body #deskripsi').val(deskripsi);
    modal.find('.modal-body #currentImage').attr('src', image_url);

    // Gunakan modal API untuk menampilkan modal
    var modalInstance = new bootstrap.Modal(modal[0]);
    modalInstance.show();
});

window.openKeunggulanModal = function (id = null, title = '', image = '') {
    document.getElementById('keunggulan_id').value = id || '';
    document.getElementById('title').value = title || '';
    document.getElementById('image_url').value = ''; // Reset file input

    const preview = document.getElementById('previewImage');
    if (image) {
        preview.innerHTML = `<img src="${image}" width="100" class="img-fluid" />`;
    } else {
        preview.innerHTML = '';
    }

    const modal = new bootstrap.Modal(document.getElementById('keunggulanModal'));
    modal.show();
}

document.addEventListener("DOMContentLoaded", function () {
    const success = document.body.dataset.success;
    const error = document.body.dataset.error;
    const deleteMessage = document.body.dataset.delete;

    if (success) {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: success,
            timer: 2000,
            showConfirmButton: true
        });
    }

    if (error) {
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: error,
            timer: 2000,
            showConfirmButton: true
        });
    }

    if (deleteMessage) {
        Swal.fire({
            icon: 'success',
            title: 'Hapus Berhasil',
            text: deleteMessage,
            timer: 2000,
            showConfirmButton: true
        });
    }
});

// ✅ Ekspor fungsi ke global (agar bisa diakses dari HTML onclick)
window.confirmDelete = function (id, event) {
    event.preventDefault();

    Swal.fire({
        title: 'Apakah kamu yakin?',
        text: "Data akan dihapus permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById(`delete-form-${id}`).submit();
        }
    });
}

window.openFasilitasModal = function (id = null, title = '', deskripsi = '', image = '') {
    const form = document.getElementById('fasilitasForm');
    const modalTitle = document.getElementById('fasilitasModalLabel');
    const inputId = document.getElementById('fasilitas_id');

    // Reset form
    form.reset();
    document.getElementById('previewImage').innerHTML = ''; // Reset preview image

    if (id) {
        // Edit mode
        form.action = `/admin/fasilitas/${id}`;
        document.querySelector('input[name="_method"]')?.remove();
        const method = document.createElement('input');
        method.type = 'hidden';
        method.name = '_method';
        method.value = 'PUT';
        form.appendChild(method);

        modalTitle.innerText = 'Edit Fasilitas';
        inputId.value = id;
        document.getElementById('title').value = title;
        document.getElementById('deskripsi').value = deskripsi;

        if (image) {
            document.getElementById('previewImage').innerHTML =
                `<img src="/storage/${image}" width="100" class="img-fluid" />`;
        }
    } else {
        // Add mode
        form.action = `/admin/fasilitas`; // Ganti dengan route URL statis
        document.querySelector('input[name="_method"]')?.remove();
        modalTitle.innerText = 'Tambah Fasilitas';
        inputId.value = '';
    }

    const fasilitasModal = new bootstrap.Modal(document.getElementById('fasilitasModal'));
    fasilitasModal.show();
}

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function (e) {
            const id = this.dataset.id;

            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kirim form secara manual
                    const form = this.closest('form');
                    form.submit();
                }
            });
        });
    });
});
