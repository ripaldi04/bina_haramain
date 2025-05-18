@extends('layouts.admin')

@section('script')
    @vite(['resources/js/admin/partials/sidebar.js', 'resources/js/admin/admin_artikel.js'])
@endsection

@section('content')
    <div class="bg-light">
        <div class="d-flex">
            <!-- Main Content -->
            <div class="container-fluid p-4">
                <h1 id="pageTitle" class="mb-4">Manajemen Artikel</h1>
                @if (session('success'))
                    <div id="artikelSuccess" data-message="{{ session('success') }}" style="display:none;"></div>
                @endif

                <!-- Modal Tambah -->
                <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Artikel</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Tutup"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="judul" class="form-label">Judul</label>
                                        <input type="text" name="judul" id="judul" class="form-control" required>
                                    </div>
                                    <!-- Tambahkan pada bagian form Tambah Artikel -->
                                    <div class="mb-3">
                                        <label for="subjudul" class="form-label">Subjudul (opsional)</label>
                                        <input type="text" name="subjudul" id="subjudul" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="isi" class="form-label">Isi</label>
                                        <textarea name="isi" id="isi" class="form-control" rows="5" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="gambar" class="form-label">Gambar (opsional)</label>
                                        <input type="file" name="gambar" id="gambar" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Modal Edit Artikel -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Artikel</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="editTitle" class="form-label">Judul</label>
                                    <input type="text" class="form-control" id="editTitle">
                                </div>
                                <!-- Tambahkan pada bagian form Edit Artikel -->
                                <div class="mb-3">
                                    <label for="editSubJudul" class="form-label">Subjudul</label>
                                    <input type="text" class="form-control" id="editSubJudul">
                                </div>

                                <div class="mb-3">
                                    <label for="editContent" class="form-label">Isi</label>
                                    <textarea class="form-control" id="editContent" rows="5"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="editImage" class="fo    rm-label">Gambar</label>
                                    <input type="file" class="form-control" id="editImage">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-primary" id="saveChanges">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Konten Artikel -->
                <div class="bg-white p-4 shadow rounded">
                    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
                        <i class="fas fa-plus"></i> Tambah Artikel
                    </button>


                    <table class="table table-bordered text-center align-middle">
                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>Judul</th>
                                <th>Subjudul</th>
                                <th>Isi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($artikels as $artikel)
                                <tr data-id="{{ $artikel->id }}" data-judul="{{ $artikel->judul }}"
                                    data-subjudul="{{ $artikel->subjudul }}" data-isi="{{ $artikel->isi }}">
                                    <td>
                                        <img src="{{ asset('storage/' . $artikel->gambar) . '?' . time() }}"
                                            width="100">
                                    </td>
                                    <td>{{ $artikel->judul }}</td>
                                    <td>{{ $artikel->subjudul }}</td> <!-- Isi subjudul -->
                                    <td> {{ \Illuminate\Support\Str::limit($artikel->isi, 200, '...') }} </td>
                                    <td>
                                        <i class="fas fa-edit text-primary me-2 cursor-pointer" data-bs-toggle="modal"
                                            data-bs-target="#editModal"></i>
                                        <i class="fas fa-trash text-danger cursor-pointer delete-artikel"></i>
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
