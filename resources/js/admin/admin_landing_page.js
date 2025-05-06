$(document).on('click', '.editBannerBtn', function () {
    const id = $(this).data('id');
    const header1 = $(this).data('header1');
    const header2 = $(this).data('header2');
    const deskripsi = $(this).data('deskripsi');
    const image_url = $(this).data('image_url');

    $('#banner_id').val(id);
    $('#header1').val(header1);
    $('#header2').val(header2);
    $('#deskripsi').val(deskripsi);
    $('#editBannerForm').attr('action', '/admin/update-banner/' + id);
    $('#editBannerModal').modal('show');
});


$(document).ready(function () {
    $('.editBannerBtn').click(function () {
        const id = $(this).data('id');
        $('#banner_id').val(id);
        $('#header1').val($(this).data('header1'));
        $('#header2').val($(this).data('header2'));
        $('#deskripsi').val($(this).data('deskripsi'));

        // Set form action dengan ID yang benar
        $('#editBannerForm').attr('action', '/admin/update-banner/' + id);

        $('#editBannerModal').modal('show');
    });
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
            e.preventDefault(); // Mencegah form langsung disubmit
            // const id = this.dataset.id;

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

// edit-galeri.js
window.openEditGaleri = function (id, title, deskripsi, images) {
    document.getElementById('edit_id').value = id;
    document.getElementById('edit_title').value = title;
    document.getElementById('edit_deskripsi').value = deskripsi;
    document.getElementById('editGaleriForm').action = '/admin/galeri/' + id;

    for (let i = 1; i <= 8; i++) {
        let previewDiv = document.getElementById('preview_image' + i);
        previewDiv.innerHTML = ''; // Clear previous previews

        // Jika ada gambar
        if (images[i - 1]) {
            previewDiv.innerHTML = `<img src="/storage/${images[i - 1]}" style="width: 100px; height: 100px; object-fit: cover;" class="img-fluid">`;
        }

        // Reset input file jika tidak ada gambar
        document.getElementsByName('image' + i)[0].value = '';
    }
};


document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.edit-highlight2');

    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Ambil data dari button dan masukkan ke dalam form modal
            document.getElementById('highlight2-id').value = this.getAttribute('data-id');
            document.getElementById('header').value = this.getAttribute('data-header');
            document.getElementById('deskripsi').value = this.getAttribute('data-deskripsi');
            // Jika diperlukan menampilkan gambar yang lama, bisa ditambahkan di sini
            // document.getElementById('image_url').value = this.getAttribute('data-image_url');
        });
    });
});

document.querySelectorAll('.edit-highlight2').forEach(button => {
    button.addEventListener('click', function () {
        const id = this.getAttribute('data-id');
        const header = this.getAttribute('data-header');
        const deskripsi = this.getAttribute('data-deskripsi');

        // Isi form dengan data yang diklik
        document.getElementById('highlight2-id').value = id;
        document.getElementById('header').value = header;
        document.getElementById('deskripsi').value = deskripsi;

        // Update action form agar menyertakan ID
        const form = document.getElementById('highlight2-edit-form');
        form.action = `/admin/highlight2/${id}`;

        // Tampilkan modal
        const modal = new bootstrap.Modal(document.getElementById('editHighlight2Modal'));
        modal.show();
    });
});

$(document).ready(function () {
    $('.edit-highlight-point').on('click', function () {
        let id = $(this).data('id');

        $.get(`/admin/landing/highlightpoint/${id}/edit`, function (data) {
            $('#highlightPointId').val(data.id);
            $('#highlightPointTitle').val(data.title);
            $('#highlightPointDeskripsi').val(data.deskripsi);
            $('#previewGambar').attr('src', '/images/' + data.gambar);

        });
    });

    $('#highlightPointsForm').on('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

        let id = $('#highlightPointId').val();

        $.ajax({
            url: '/admin/highlight-points/update/' + id,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                $('#highlightPointsModal').modal('hide');
                // location.reload();

                // SweetAlert notification
                Swal.fire({
                    icon: 'success',
                    title: 'Data berhasil diperbarui',
                    text: 'Highlight point telah berhasil diupdate!',
                    timer: 2000,
                    showConfirmButton: true
                });
            },
            error: function (xhr) {
                console.error(xhr.responseText);
                alert('Gagal menyimpan data.');
            }
        });
    });
});

$(document).ready(function () {
    $('.edit-btn-muthawif').on('click', function () {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        var daerah = $(this).data('daerah');
        var image_url = $(this).data('image_url');

        $('#muthawifId').val(id);
        $('#nama').val(nama);
        $('#daerah').val(daerah);

        $('#currentImage').attr('src', '/storage/' + image_url);

        $('#editModal').modal('show');
    });

    $('#editMuthawifForm').submit(function (e) {
        e.preventDefault();

        var formData = new FormData(this);
        var id = $('#muthawifId').val();

        // Tambahkan override method PUT
        formData.append('_method', 'PUT');

        $.ajax({
            url: '/muthawif/' + id,
            type: 'POST', // karena _method=PUT
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                $('#editModal').modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Muthawif berhasil disimpan.',
                    confirmButtonColor: '#3085d6'
                }).then(() => {
                    location.reload();
                });
            },
            error: function (xhr) {
                console.log(xhr.responseText);
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Periksa input atau file.',
                    confirmButtonColor: '#d33'
                });
            }
        });
    });
});
