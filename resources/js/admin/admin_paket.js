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
                alert("Paket berhasil ditambahkan!");
                // Tambahkan aksi reload tabel atau refresh daftar paket jika ada
            },
            error: function (xhr) {
                $('#savePaket').prop('disabled', false).text('Simpan');
                let errors = xhr.responseJSON?.errors;
                if (errors) {
                    let pesan = Object.values(errors).map(e => `- ${e[0]}`).join("\n");
                    alert("Gagal menyimpan paket:\n" + pesan);
                } else {
                    alert("Terjadi kesalahan. Coba lagi.");
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
        $('#editKeberangkatan').val(data.keberangkatan);
        $('#editHotelMakkah').val(data.hotelMekkah);
        $('#editHotelMadinah').val(data.hotelMadinah);
        $('#editMaskapai').val(data.maskapai);
        $('#editBandara').val(data.bandara);
        $('#editHarga').val(data.harga);

        // Simpan ID ke button saveChanges
        $('#saveChanges').data('id', data.id);

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
        formData.append('keberangkatan', $('#editKeberangkatan').val());
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
                // Reload atau update row tertentu
                location.reload();
            },
            error: function (xhr) {
                console.error(xhr.responseText);
            }
        });
    });
});
