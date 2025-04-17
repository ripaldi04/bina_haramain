document.addEventListener("DOMContentLoaded", function () {
    let jamaahCount = 1;

    document.getElementById('btnTambahJamaah').addEventListener('click', function () {
        jamaahCount++;
        const container = document.getElementById('jamaahContainer');

        const col = document.createElement('div');
        col.className = 'col-md-6 mb-4';
        col.innerHTML = `
            <div class="jamaah-box">
                <div class="jamaah-header">Jamaah ${jamaahCount} (Kamar Quad)</div>
                <div class="form-group mt-4">
                    <label for="jenisJamaah${jamaahCount}">Jenis Jamaah</label>
                    <select id="jenisJamaah${jamaahCount}">
                        <option selected>Jamaah Baru</option>
                        <option>Sesuai Pemesan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="namaJamaah${jamaahCount}">Nama Lengkap Jamaah</label>
                    <input type="text" id="namaJamaah${jamaahCount}" placeholder="Nama Lengkap Jamaah" />
                </div>
                <div class="form-group">
                    <label for="jenisKelamin${jamaahCount}">Jenis Kelamin</label>
                    <select id="jenisKelamin${jamaahCount}">
                        <option selected>Laki - Laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>
            </div>
        `;
        container.appendChild(col);
    });
});