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


$(document).ready(function () {
    $('.btn-warning').click(function () {
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

document.addEventListener('DOMContentLoaded', function() {
    const editButtons = document.querySelectorAll('.edit-highlight2');
    
    editButtons.forEach(button => {
        button.addEventListener('click', function() {
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