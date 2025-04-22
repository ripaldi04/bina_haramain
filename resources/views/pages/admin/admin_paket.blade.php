@extends('layouts.admin')

@section('script')
    @vite(['resources/js/admin/partials/sidebar.js', 'resources/js/admin/admin_paket.js'])
@endsection

@section('content')
    <div class="bg-light">
        <div class="d-flex">
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
                            <form id="formTambahPaket" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" id="paketStoreUrl" value="{{ route('paket.store') }}">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addPaketModalLabel">Tambah Paket Baru</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="paketGambar" class="form-label">Gambar Paket</label>
                                            <input type="file" class="form-control" id="paketGambar" name="gambar"
                                                accept="image/*" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="paketNama" class="form-label">Nama Paket</label>
                                            <input type="text" class="form-control" id="paketNama" name="nama_paket"
                                                required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="paketJenis" class="form-label">Jenis Paket</label>
                                            <select class="form-control" id="paketJenis" name="jenis" required>
                                                <option value="haji">Haji</option>
                                                <option value="umrah">Umrah</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="paketProgramHari" class="form-label">Program Hari</label>
                                            <input type="number" class="form-control" id="paketProgramHari"
                                                name="program_hari" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="paketHotelMakkah" class="form-label">Hotel Makkah</label>
                                            <input class="form-control" id="paketHotelMakkah" name="hotel_mekkah" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="paketHotelMadinah" class="form-label">Hotel Madinah</label>
                                            <input class="form-control" id="paketHotelMadinah" name="hotel_madinah"
                                                required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="paketMaskapai" class="form-label">Maskapai</label>
                                            <input class="form-control" id="paketMaskapai" name="maskapai" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="paketBandara" class="form-label">Bandara</label>
                                            <input class="form-control" id="paketBandara" name="bandara" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="paketHarga" class="form-label">Harga</label>
                                            <input type="text" class="form-control" id="paketHarga" name="harga"
                                                required>
                                        </div>
                                        <div id="jadwal-container">
                                            <div class="jadwal-item mb-2">
                                                <label for="tanggal" class="form-label">Tanggal Keberangkatan</label>
                                                <input type="date" name="tanggal_keberangkatan[]"
                                                    class="form-control mb-1" required>
                                                <input type="number" name="jumlah_seat[]" class="form-control"
                                                    placeholder="Jumlah Seat" required>
                                            </div>
                                        </div>

                                        <button type="button" id="tambah-jadwal" class="btn btn-sm btn-secondary mt-2">+
                                            Tambah Jadwal</button>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary" id="savePaket">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Modal Edit paket -->
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit Paket</h5>
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
                                        <label for="editPaket" class="form-label">Nama Paket</label>
                                        <input type="text" class="form-control" id="editPaket">
                                    </div>

                                    <div class="mb-3">
                                        <label for="editJenis" class="form-label">Jenis Paket</label>
                                        <select class="form-control" id="editJenis">
                                            <option value="haji">Haji</option>
                                            <option value="umrah">Umrah</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="editProgramHari" class="form-label">Program Hari</label>
                                        <input type="number" class="form-control" id="editProgramHari">
                                    </div>

                                    <div class="mb-3">
                                        <label for="editHotelMakkah" class="form-label">Hotel Makkah</label>
                                        <input class="form-control" id="editHotelMakkah">
                                    </div>

                                    <div class="mb-3">
                                        <label for="editHotelMadinah" class="form-label">Hotel Madinah</label>
                                        <input class="form-control" id="editHotelMadinah">
                                    </div>

                                    <div class="mb-3">
                                        <label for="editMaskapai" class="form-label">Maskapai</label>
                                        <input class="form-control" id="editMaskapai">
                                    </div>

                                    <div class="mb-3">
                                        <label for="editBandara" class="form-label">Bandara</label>
                                        <input class="form-control" id="editBandara">
                                    </div>

                                    <div class="mb-3">
                                        <label for="editHarga" class="form-label">Harga</label>
                                        <input type="text" class="form-control" id="editHarga">
                                    </div>
                                    <div class="mb-3">
                                        <div>
                                            <label class="form-label">Jadwal Keberangkatan & Jumlah Seat</label>
                                        </div>
                                        <div id="jadwalContainer"></div>
                                        <button type="button" id="tambah-jadwal" class="btn btn-secondary mt-3">Tambah
                                            Jadwal</button>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-primary" id="saveChanges">Simpan
                                        Perubahan</button>
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
                            @foreach ($paket as $paket)
                                <tr data-row-id="{{ $paket->id }}">
                                    <td><input type="checkbox" class="rowCheckbox"></td>
                                    <td>
                                        <img src="{{ asset('storage/' . $paket->gambar) }}" alt="gambar" width="100"
                                            class="clickable-image" style="cursor: pointer;">
                                    </td>
                                    <td>{{ $paket->nama_paket }}</td>
                                    <td style="text-align: left;">
                                        - Hotel Makkah: {{ $paket->hotel_mekkah }}<br>
                                        - Hotel Madinah: {{ $paket->hotel_madinah }}<br>
                                        - Maskapai: {{ $paket->maskapai }}<br>
                                        - Program Hari: {{ $paket->program_hari }}<br>
                                        - Bandara: {{ $paket->bandara }}<br>
                                    </td>
                                    <td>${{ $paket->harga }}</td>
                                    <td>
                                        <i class="fas fa-edit text-primary me-2 cursor-pointer btn-edit"
                                            data-id="{{ $paket->id }}" data-nama="{{ $paket->nama_paket }}"
                                            data-jenis="{{ $paket->jenis }}"
                                            data-program-hari="{{ $paket->program_hari }}"
                                            data-hotel-mekkah="{{ $paket->hotel_mekkah }}"
                                            data-hotel-madinah="{{ $paket->hotel_madinah }}"
                                            data-maskapai="{{ $paket->maskapai }}" data-bandara="{{ $paket->bandara }}"
                                            data-harga="{{ $paket->harga }}" data-gambar="{{ $paket->gambar }}"></i>
                                        <i class="fas fa-trash text-danger cursor-pointer delete-paket"
                                            data-id="{{ $paket->id }}"></i>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
