$(document).ready(function () {
    // Setup CSRF Token untuk semua request AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Inisialisasi DataTable
    const table = $('#paketTable').DataTable({
        ajax: {
            url: '/admin/paket/data',
            dataSrc: ''
        },
        columns: [
            {
                data: 'id',
                render: function (data) {
                    return `<input type="checkbox" class="rowCheckbox" value="${data}">`;
                },
                orderable: false
            },
            {
                data: 'gambar',
                render: function (data) {
                    let src = data ? `/storage/${data}` : '/uploads/default.jpg';
                    return `<img src="${src}" width="100" alt="Gambar Paket">`;
                }
            },
            { data: 'nama' },
            {
                data: 'hotel_makkah', // kolom acuan
                render: function (data, type, row) {
                    return ` 
                        <ul class="text-start">
                            <li><strong>Hotel Makkah:</strong> ${row.hotel_makkah}</li>
                            <li><strong>Hotel Madinah:</strong> ${row.hotel_madinah}</li>
                            <li><strong>Maskapai:</strong> ${row.maskapai}</li>
                            <li><strong>Maktab:</strong> ${row.maktab}</li>
                            <li><strong>Handling:</strong> ${row.handling_bandara}</li>
                            <li><strong>Makan:</strong> ${row.makan}</li>
                        </ul>`;
                }
            },
            { data: 'harga' },
            {
                data: 'id',
                render: function (data) {
                    return `
                        <i class="fas fa-edit text-primary me-2 editBtn" data-id="${data}" style="cursor:pointer;"></i>
                        <i class="fas fa-trash text-danger deleteBtn" data-id="${data}" style="cursor:pointer;"></i>
                    `;
                }
            }
        ]
    });

    // Submit data paket baru
    $('#savePaket').on('click', function () {
        let formData = new FormData();
        let gambar = $('#paketGambar')[0].files[0];
        if (gambar) formData.append('gambar', gambar);

        let requiredFields = ['#paketNama', '#paketHotelMakkah', '#paketHotelMadinah', '#paketMaskapai', '#paketMaktab', '#paketHandlingBandara', '#paketMakan', '#paketHarga'];
        let isValid = true;
        requiredFields.forEach(selector => {
            if (!$(selector).val()) {
                isValid = false;
                $(selector).addClass('is-invalid');
            } else {
                $(selector).removeClass('is-invalid');
            }
        });
        if (!isValid) return;

        formData.append('nama', $('#paketNama').val());
        formData.append('hotel_makkah', $('#paketHotelMakkah').val());
        formData.append('hotel_madinah', $('#paketHotelMadinah').val());
        formData.append('maskapai', $('#paketMaskapai').val());
        formData.append('maktab', $('#paketMaktab').val());
        formData.append('handling_bandara', $('#paketHandlingBandara').val());
        formData.append('makan', $('#paketMakan').val());
        formData.append('harga', $('#paketHarga').val());

        $.ajax({
            url: '/admin/paket/store',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function () {
                $('#addPaketModal').modal('hide');
                $('#addPaketModal input').val('');
                table.ajax.reload();
            },
            error: function (xhr) {
                alert('Gagal menyimpan data. Silakan coba lagi.');
                console.error(xhr.responseText);
            }
        });
    });

    // Hapus satu paket
    $(document).on('click', '.deleteBtn', function () {
        if (!confirm("Yakin ingin menghapus data ini?")) return;
        let id = $(this).data('id');

        $.ajax({
            url: `/admin/paket/delete/${id}`,
            method: 'DELETE',
            success: function () {
                table.ajax.reload();
            },
            error: function () {
                alert('Gagal menghapus data.');
            }
        });
    });

    // Checkbox: Pilih Semua
    $('#selectAll').on('click', function () {
        $('.rowCheckbox').prop('checked', this.checked);
    });

    // Hapus banyak paket
    $('#deleteAll').on('click', function () {
        let ids = $('.rowCheckbox:checked').map(function () {
            return $(this).val();
        }).get();

        if (ids.length === 0) return alert('Pilih setidaknya satu data untuk dihapus.');
        if (!confirm("Yakin ingin menghapus semua data terpilih?")) return;

        $.post('/admin/paket/delete-multiple', {
            _token: $('meta[name="csrf-token"]').attr('content'),
            ids: ids
        }, function () {
        });
    });
});