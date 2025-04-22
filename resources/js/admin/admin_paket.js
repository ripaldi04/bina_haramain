$(document).ready(function () {
    $('#formTambahPaket').on('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);
        let url = $('#paketStoreUrl').val(); // Ambil URL dari elemen hidden



        $.ajax({
            url: url, // Ganti dengan route penyimpanan paket kamu
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            },
            beforeSend: function () {
                $('#savePaket').prop('disabled', true).text('Menyimpan...');
            },
            success: function (response) {
                $('#savePaket').prop('disabled', false).text('Simpan');
                $('#formTambahPaket')[0].reset();
                $('#addPaketModal').modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Paket berhasil ditambahkan!',
                    icon: 'success',
                    showConfirmButton: true
                }).then(() => {
                    location.reload();
                });
            },
            error: function (xhr) {
                $('#savePaket').prop('disabled', false).text('Simpan');
                let errors = xhr.responseJSON?.errors;
                if (errors) {
                    let pesan = Object.values(errors).map(e => `- ${e[0]}`).join("\n");
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal menyimpan paket!',
                        html: pesan
                    });
                } else {
                    Swal.fire('Error!', 'Terjadi kesalahan. Coba lagi.', 'error');
                }
            }
        });
    });
});

$(document).ready(function () {
    // Saat tombol edit diklik
    $(document).on('click', '.btn-edit', function () {
        const data = $(this).data();

        // Set preview gambar
        $('#previewGambar').attr('src', `/storage/${data.gambar}`);

        // Isi input-edit dengan data paket
        $('#editPaket').val(data.nama);
        $('#editJenis').val(data.jenis);
        $('#editProgramHari').val(data.programHari);
        $('#editHotelMakkah').val(data.hotelMekkah);
        $('#editHotelMadinah').val(data.hotelMadinah);
        $('#editMaskapai').val(data.maskapai);
        $('#editBandara').val(data.bandara);
        $('#editHarga').val(data.harga);

        // Simpan ID ke button saveChanges
        $('#saveChanges').data('id', data.id);

        $.ajax({
            url: `/admin/paket/${data.id}/detail-paket`,
            method: 'GET',
            success: function (detailData) {
                const container = $('#jadwalContainer');
                container.empty();

                if (!detailData || detailData.length === 0) {
                    container.append(`<div class="text-muted">Tidak ada jadwal keberangkatan.</div>`);
                } else {
                    detailData.forEach(item => {
                        const html = `
                            <div class="jadwal-item mb-3 row">
        <div class="col-md-6">
            <label class="form-label">Tanggal Keberangkatan</label>
            <input type="date" class="form-control" name="tanggal_keberangkatan[]" value="${item.tanggal_keberangkatan}" readonly>
        </div>

        <div class="col-md-6">
            <label class="form-label">Jumlah Seat</label>
            <input type="number" class="form-control" name="jumlah_seat[]" value="${item.jumlah_seat}" readonly>
        </div>
    </div>
                        `;
                        container.append(html);
                    });
                }
            },
            error: function (xhr) {
                console.error('Gagal mengambil data detail_paket:', xhr.responseText);
                $('#jadwalContainer').html(`<div class="text-danger">Gagal mengambil data jadwal.</div>`);
            }
        });

        // Tampilkan modal edit
        $('#editModal').modal('show');
    });

    // Simpan perubahan (contoh implementasi AJAX)
    $('#saveChanges').on('click', function () {
        const id = $(this).data('id');
        const formData = new FormData();
        formData.append('_method', 'PUT');
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
        formData.append('nama_paket', $('#editPaket').val());
        formData.append('jenis', $('#editJenis').val());
        formData.append('program_hari', $('#editProgramHari').val());
        formData.append('hotel_mekkah', $('#editHotelMakkah').val());
        formData.append('hotel_madinah', $('#editHotelMadinah').val());
        formData.append('maskapai', $('#editMaskapai').val());
        formData.append('bandara', $('#editBandara').val());
        formData.append('harga', $('#editHarga').val());

        // Cek jika gambar diubah
        const newImage = $('#editGambar')[0].files[0];
        if (newImage) {
            formData.append('gambar', newImage);
        }

        $.ajax({
            url: `/admin/paket/${id}`, // Pastikan route update sesuai
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Paket berhasil diperbarui.',
                    icon: 'success',
                    showConfirmButton: true
                }).then(() => {
                    location.reload();
                });
            },
            error: function (xhr) {
                Swal.fire('Gagal!', 'Terjadi kesalahan saat menyimpan perubahan.', 'error');
                console.error(xhr.responseText);
            }
        });
    });
});

$(document).ready(function () {
    // Event listener untuk klik tombol delete
    $('.delete-paket').on('click', function () {
        var paketId = $(this).data('id'); // Ambil ID dari atribut data-id

        // Konfirmasi hapus
        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Data akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/admin/paket/' + paketId,  // URL ke route destroy
                    method: 'DELETE',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'), // Kirim token CSRF
                    },
                    success: function (response) {
                        // Hapus baris tabel
                        $('tr[data-row-id="' + paketId + '"]').remove();
                        Swal.fire('Terhapus!', 'Paket berhasil dihapus.', 'success');
                    },
                    error: function (error) {
                        Swal.fire('Gagal!', 'Gagal menghapus paket.', 'error');
                    }
                });
            }
        });
    });
})

document.getElementById('tambah-jadwal').addEventListener('click', function () {
    const container = document.getElementById('jadwal-container');
    const item = document.createElement('div');
    item.classList.add('jadwal-item', 'mb-2');
    item.innerHTML = `
        <input type="date" name="tanggal_keberangkatan[]" class="form-control mb-1" required>
        <input type="number" name="jumlah_seat[]" class="form-control" placeholder="Jumlah Seat" required>
    `;
    container.appendChild(item);
});
