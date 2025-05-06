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
    
        let formData = new FormData(this); // cukup ambil langsung dari `this`
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
    
        let id = $('#highlightPointId').val(); // pastikan hidden input ada nilainya
    
        $.ajax({
            url: '/admin/highlight-points/update/' + id,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                $('#highlightPointsModal').modal('hide');
                location.reload();
            },
            error: function (xhr) {
                console.error(xhr.responseText);
                alert('Gagal menyimpan data.');
            }
        });
    });
}); 


$(document).ready(function () {
    $('.edit-btn').on('click', function () {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        var daerah = $(this).data('daerah');
        var image_url = $(this).data('image_url');
        var background_image_url = $(this).data('background_image_url');

        $('#muthawifId').val(id);
        $('#nama').val(nama);
        $('#daerah').val(daerah);

        $('#currentImage').attr('src', '/storage/' + image_url);
        $('#currentBackgroundImage').attr('src', '/storage/' + background_image_url);

        $('#editModal').modal('show');
    });

    $('#editMuthawifForm').submit(function(e) {
        e.preventDefault();
    
        var formData = new FormData(this);
        var id = $('#muthawifId').val();
    
        // Tambahkan override method PUT
        formData.append('_method', 'PUT');
    
        $.ajax({
            url: '/admin/muthawif/' + id,
            type: 'POST', // karena _method=PUT
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#editModal').modal('hide');
                alert('Berhasil disimpan!');
                location.reload();
            },
            error: function(xhr) {
                console.log(xhr.responseText);
                alert('Gagal menyimpan. Periksa input atau file.');
            }
        });
    });
});






