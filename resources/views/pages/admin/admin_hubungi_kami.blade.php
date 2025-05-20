@extends('layouts.admin')

@section('script')
    @vite(['resources/js/admin/partials/sidebar.js', 'resources/js/admin/admin_hubungi_kami.js'])
@endsection

@section('content')
    <div class="bg-light">
        <div class="d-flex">
            <!-- Main Content -->
            <div class="container-fluid p-4">
                <h1 id="pageTitle" class="mb-4">Manajemen Hubungi Kami</h1>
                <div class="bg-white p-4 shadow rounded">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                <input type="text" class="form-control" id="searchPaket"
                                    placeholder="Search name, email, or etc">
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered text-center align-middle">
                        <thead>
                            <tr>
                                <th>Layanan</th>
                                <th>Deskripsi</th>
                                <th>Alamat</th>
                                <th>No CS 1</th>
                                <th>No CS 2</th>
                                <th>Email 1</th>
                                <th>Email 2</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            <tr>
                                <td>{{ $data->layanan }}</td>
                                <td>{{ $data->deskripsi }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td>{{ $data->no_cs_1 }}</td>
                                <td>{{ $data->no_cs_2 }}</td>
                                <td>{{ $data->email_1 }}</td>
                                <td>{{ $data->email_2 }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editModal">
                                        Edit
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Edit -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('hubungi-kami.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Hubungi Kami</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body row">
                        <div class="col-md-6 mb-3">
                            <label for="layanan" class="form-label">Layanan</label>
                            <input type="text" class="form-control" name="layanan" value="{{ $data->layanan }}">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" rows="2">{{ $data->deskripsi }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="{{ $data->alamat }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="no_cs_1" class="form-label">No CS 1</label>
                            <input type="text" class="form-control" name="no_cs_1" value="{{ $data->no_cs_1 }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="no_cs_2" class="form-label">No CS 2</label>
                            <input type="text" class="form-control" name="no_cs_2" value="{{ $data->no_cs_2 }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email_1" class="form-label">Email 1</label>
                            <input type="email" class="form-control" name="email_1" value="{{ $data->email_1 }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email_2" class="form-label">Email 2</label>
                            <input type="email" class="form-control" name="email_2" value="{{ $data->email_2 }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if (session('success'))
        <div id="flash-message" data-success="{{ session('success') }}"></div>
    @endif
@endsection
