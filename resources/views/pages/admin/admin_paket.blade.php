@extends('layouts.admin')

@section('script')
    @vite(['resources/js/admin/partials/sidebar.js'])
@endsection

@section('content')
    <div class="bg-light">
        <div class="d-flex">
            <!-- Sidebar -->
            <div class="bg-white shadow p-3 d-flex flex-column min-vh-100 sidebar">
                <div class="text-center pb-3">
                    <img src="https://binaharamain.com/wp-content/uploads/2025/01/Logo-Bina-Haramain-Baru-1024x872.png"
                        alt="Logo" width="80">
                </div>
                <h5 class="text-secondary mt-3 px-3">MAIN MENU</h5>
                <ul class="list-unstyled flex-grow-1">
                    <li id="menuUser" class="p-2 text-dark menu-item active"><i class="fas fa-user me-2"></i> User</li>
                    <li id="menuAgen" class="p-2 text-dark menu-item"><i class="fas fa-users me-2"></i> Agen</li>
                    <li id="menuAffiliate" class="p-2 text-dark menu-item"><i class="fas fa-handshake me-2"></i> Affiliate
                    </li>
                    <li id="menuJamaah" class="p-2 text-dark menu-item"><i class="fas fa-user-shield me-2"></i> Data Pemesan
                    </li>
                    <li id="menuPaket" class="p-2 text-dark menu-item"><i class="fas fa-plane me-2"></i> Paket Umrah & Haji
                    </li>
                </ul>
                <div class="mt-auto">
                    <button class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center">
                        <i class="fas fa-sign-out-alt me-2"></i> Log out
                    </button>
                </div>
            </div>

            <!-- Main Content -->
            <div class="container-fluid p-4">
                <div class="d-flex justify-content-end align-items-center mb-4">
                    <div class="d-flex justify-content-end align-items-center mb-4">
                        @include('pages.admin.partials.profile')
                    </div>
                </div>


                <h1 id="pageTitle" class="mb-4">Paket Umrah & Haji</h1>

                <div class="bg-white p-4 shadow rounded">
                    <!-- Search Field -->
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <div class="input-group">
                                <span class="input-group-text" id="searchIcon"><i class="fas fa-search"></i></span>
                                <input type="text" class="form-control" id="searchPaket"
                                    placeholder="Search paket, harga, or etc">
                            </div>
                        </div>
                    </div>



                    <button id="addPaketBtn" class="btn btn-success mb-3" data-bs-toggle="modal"
                        data-bs-target="#addPaketModal">
                        <i class="fas fa-plus"></i>
                    </button>



                    <!-- Modal Tambah Paket -->
                    <div class="modal fade" id="addPaketModal" tabindex="-1" aria-labelledby="addPaketModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addPaketModalLabel">Tambah Paket Baru</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="paketGambar" class="form-label">Gambar Paket</label>
                                        <input type="file" class="form-control" id="paketGambar" accept="image/*">
                                    </div>
                                    <div class="mb-3">
                                        <label for="paketNama" class="form-label">Nama Paket</label>
                                        <input type="text" class="form-control" id="paketNama" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="paketHotelMakkah" class="form-label">Hotel Makkah</label>
                                        <input class="form-control" id="paketHotelMakkah" required></input>
                                    </div>
                                    <div class="mb-3">
                                        <label for="paketHotelMadinah" class="form-label">Hotel Madinah</label>
                                        <input class="form-control" id="paketHotelMadinah" required></input>
                                    </div>
                                    <div class="mb-3">
                                        <label for="paketMaskapai" class="form-label">Maskapai</label>
                                        <input class="form-control" id="paketMaskapai" required></input>
                                    </div>
                                    <div class="mb-3">
                                        <label for="paketMaktab" class="form-label">Maktab</label>
                                        <input class="form-control" id="paketMaktab" required></input>
                                    </div>
                                    <div class="mb-3">
                                        <label for="paketHandlingBandara" class="form-label">Handling Bandara</label>
                                        <input class="form-control" id="paketHandlingBandara" required></input>
                                    </div>
                                    <div class="mb-3">
                                        <label for="paketMakan" class="form-label">Makan</label>
                                        <input class="form-control" id="paketMakan" required></input>
                                    </div>
                                    <div class="mb-3">
                                        <label for="paketHarga" class="form-label">Harga</label>
                                        <input type="text" class="form-control" id="paketHarga" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-primary" id="savePaket">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Edit paket -->
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit User</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3 text-center">
                                        <img id="previewGambar" src="" class="img-fluid rounded mb-2"
                                            style="max-height: 150px;" alt="Pratinjau Gambar">
                                        <input type="file" class="form-control" id="editGambar" accept="image/*">
                                    </div>
                                    <div class="mb-3">
                                        <label for="editPaket" class="form-label">Paket</label>
                                        <input type="email" class="form-control" id="editPaket">
                                    </div>
                                    <div class="mb-3">
                                        <label for="editFasilitas" class="form-label">Fasilitas</label>
                                        <input type="text" class="form-control" id="editFasilitas">
                                    </div>
                                    <div class="mb-3">
                                        <label for="editHarga" class="form-label">Harga</label>
                                        <input type="text" class="form-control" id="editHarga">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="saveChanges">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- Modal untuk menampilkan gambar -->
                    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="imageModalLabel">Gambar Paket</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <img id="modalImage"
                                        src="https://binaharamain.com/wp-content/uploads/2024/10/Haji-2025-Bintang-4-768x768.jpeg"
                                        class="img-fluid" alt="Gambar Paket">
                                </div>
                            </div>
                        </div>
                    </div>

                    <button id="deleteAll" class="btn btn-danger mb-3">Hapus Semua</button>
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="selectAll"></th>
                                <th>Gambar</th>
                                <th>Paket</th>
                                <th>Fasilitas</th>
                                <th>Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            <tr data-row-id="1">
                                <td><input type="checkbox" class="rowCheckbox"></td>
                                <td>
                                    <img src="https://binaharamain.com/wp-content/uploads/2024/10/Haji-2025-Bintang-4-768x768.jpeg"
                                        alt="gambar" width="100" class="clickable-image" style="cursor: pointer;">
                                </td>
                                <td>Haji Furoda</td>
                                <td style="text-align: left;"> - Hotel Makkah (Nada Deafah/Setaraf)
                                    <br>- Hotel Madinah (Almukhtara Gorbi/Setaraf)
                                    <br>- Hotel Aziziyah Al Hidayah Tower (Fly Nas)
                                    <br>- Pesawat Internasional PP Start Jkt
                                    <br>- aktab Arafah
                                    <br>- Maktab Mina Fly Nas Zona A
                                    <br>- Bus ber-AC selama di Saudi
                                    <br>- Handling Bandara di Indonesia & Saudi
                                    <br>- Bimbingan Secara Intensif
                                    <br>- Makan Pagi, Siang, & Malam
                                    <br>- Sertifikat Haji
                                    <br>- Perlengkapan Haji
                                </td>
                                <td>$27.000</td>
                                <td>
                                    <i class="fas fa-edit text-primary me-2 cursor-pointer"></i>
                                    <i class="fas fa-trash text-danger cursor-pointer"></i>
                                </td>
                            </tr>
                            <tr data-row-id="2">
                                <td><input type="checkbox" class="rowCheckbox"></td>
                                <td>
                                    <img src="https://binaharamain.com/wp-content/uploads/2024/10/Haji-2025-Bintang-4-768x768.jpeg"
                                        alt="gambar" width="100" class="clickable-image" style="cursor: pointer;">
                                </td>
                                <td>Haji Plus</td>
                                <td style="text-align: left;"> - Hotel Makkah (Nada Deafah/Setaraf)
                                    <br>- Hotel Madinah (Almukhtara Gorbi/Setaraf)
                                    <br>- Hotel Aziziyah Al Hidayah Tower (Fly Nas)
                                    <br>- Pesawat Internasional PP Start Jkt
                                    <br>- aktab Arafah
                                    <br>- Maktab Mina Fly Nas Zona A
                                    <br>- Bus ber-AC selama di Saudi
                                    <br>- Handling Bandara di Indonesia & Saudi
                                    <br>- Bimbingan Secara Intensif
                                    <br>- Makan Pagi, Siang, & Malam
                                    <br>- Sertifikat Haji
                                    <br>- Perlengkapan Haji
                                </td>
                                <td>$20.000</td>
                                <td>
                                    <i class="fas fa-edit text-primary me-2 cursor-pointer"></i>
                                    <i class="fas fa-trash text-danger cursor-pointer"></i>
                                </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
