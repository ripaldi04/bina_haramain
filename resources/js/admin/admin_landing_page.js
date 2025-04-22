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
