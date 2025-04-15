@extends('layouts.admin')

@section('title', 'Manajemen Paket Umrah & Haji')

@section('script')
    @vite(['resources/js/admin/partials/sidebar.js', 'resources/js/admin/paket.js'])
@endsection

@section('content')
    <div class="bg-light">
        <div class="d-flex">
            <!-- Sidebar otomatis dari layout -->

            <!-- Main Content -->
            <div class="container-fluid p-4">
                <h1 class="mb-4">Paket Umrah & Haji</h1>

                <div class="bg-white p-4 shadow rounded">
                    <button id="addPaketBtn" class="btn btn-success mb-3" data-bs-toggle="modal"
                        data-bs-target="#addPaketModal">
                        <i class="fas fa-plus"></i> Tambah Paket
                    </button>

                    <!-- Modal Tambah Paket -->
                    <div class="modal fade" id="addPaketModal" tabindex="-1" aria-labelledby="addPaketModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addPaketModalLabel">Tambah Paket Baru</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="paketGambar" class="form-label">Gambar Paket</label>
                                            <input type="file" class="form-control" id="paketGambar" accept="image/*">
                                        </div>
                                        <div class="mb-3">
                                            <label for="paketNama" class="form-label">Nama Paket</label>
                                            <input type="text" class="form-control" id="paketNama" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="paketHarga" class="form-label">Harga</label>
                                            <input type="text" class="form-control" id="paketHarga" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="paketHotelMakkah" class="form-label">Hotel Makkah</label>
                                            <input class="form-control" id="paketHotelMakkah" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="paketHotelMadinah" class="form-label">Hotel Madinah</label>
                                            <input class="form-control" id="paketHotelMadinah" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="paketMaskapai" class="form-label">Maskapai</label>
                                            <input class="form-control" id="paketMaskapai" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="paketMaktab" class="form-label">Maktab</label>
                                            <input class="form-control" id="paketMaktab" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="paketHandlingBandara" class="form-label">Handling Bandara</label>
                                            <input class="form-control" id="paketHandlingBandara" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="paketMakan" class="form-label">Makan</label>
                                            <input class="form-control" id="paketMakan" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-primary" id="savePaket">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tabel Data Paket -->
                    <table id="paketTable" class="table table-bordered text-center">
                        <thead class="table-light">
                            <tr>
                                <th><input type="checkbox" id="selectAll"></th>
                                <th>Gambar</th>
                                <th>Nama</th>
                                <th>Fasilitas</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            <!-- Data akan diisi via JS -->
                        </tbody>
                    </table>

                    <button id="deleteAll" class="btn btn-danger mt-2">
                        <i class="fas fa-trash"></i> Hapus Semua
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
