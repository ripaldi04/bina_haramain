    $(document).ready(function () {
        $('#formTambahPaket').on('submit', function (e) {
            e.preventDefault();

            let formData = new FormData(this);
            let url = $('#paketStoreUrl').val(); // Ambil URL dari elemen hidden

            

            $.ajax({
                url:url , // Ganti dengan route penyimpanan paket kamu
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
