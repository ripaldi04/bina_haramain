@extends('layouts.admin')

@section('script')
    @vite(['resources/js/admin/partials/sidebar.js'])
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

                <h1 id="pageTitle" class="mb-4">Data Pemesanan</h1>



                <!-- Modal Edit pesanan -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit agen</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="editName" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="editName">
                                </div>
                                <div class="mb-3">
                                    <label for="editEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="editEmail">
                                </div>
                                <div class="mb-3">
                                    <label for="editPhone" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="editPhone">
                                </div>
                                <div class="mb-3">
                                    <label for="editPaket" class="form-label">Paket</label>
                                    <input type="text" class="form-control" id="editPaket">
                                </div>
                                <div class="mb-3">
                                    <label for="editJumlah" class="form-label">Jumlah</label>
                                    <input type="text" class="form-control" id="editJumlah">
                                </div>
                                <div class="mb-3">
                                    <label for="editJemaah" class="form-label">Jemaah</label>
                                    <input type="text" class="form-control" id="editJemaah">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="saveChanges">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-4 shadow rounded">
                    <!-- Search Field -->
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <div class="input-group">
                                <span class="input-group-text" id="searchIcon"><i class="fas fa-search"></i></span>
                                <input type="text" class="form-control" id="searchPaket"
                                    placeholder="Search name, email, or etc">
                            </div>
                        </div>
                    </div>



                    <button id="deleteAll" class="btn btn-danger mb-3">Hapus Semua</button>
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="selectAll"></th>
                                <th>Nama Pemesan</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Paket</th>
                                <th>Jumlah</th>
                                <th>Jemaah</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            <tr data-row-id="1">
                                <td><input type="checkbox" class="rowCheckbox"></td>
                                <td>Muhammad Ripaldi</td>
                                <td>ripaldi@gmail.com</td>
                                <td>+62 8123000000</td>
                                <td>Umrah 19 hari</td>
                                <td>1</td>
                                <td>Muhammad Ripaldi (Ikhwan)</td>
                                <td>
                                    <i class="fas fa-edit text-primary me-2 cursor-pointer"></i>
                                    <i class="fas fa-trash text-danger cursor-pointer"></i>
                                </td>
                            </tr>
                            <tr data-row-id="2">
                                <td><input type="checkbox" class="rowCheckbox"></td>
                                <td>Muhammad Faadihilah</td>
                                <td>fadil@gmail.com</td>
                                <td>+62 8132000000</td>
                                <td>Haji Furodha</td>
                                <td>3</td>
                                <td>Muhammad Faadihilah (Ikhwan) <br>Mayang (Akhwat) <br>Sunandar (Ikhwan)</td>
                                <td>
                                    <i class="fas fa-edit text-primary me-2 cursor-pointer"></i>
                                    <i class="fas fa-trash text-danger cursor-pointer"></i>
                                </td>
                            </tr>
                            <tr data-row-id="3">
                                <td><input type="checkbox" class="rowCheckbox"></td>
                                <td>Muhammad Faadihilah</td>
                                <td>fadil@gmail.com</td>
                                <td>+62 8132000000</td>
                                <td>Haji Furodha</td>
                                <td>2</td>
                                <td>Muhammad Faadihilah (Ikhwan) <br>Mayang (Akhwat)</td>
                                <td>
                                    <i class="fas fa-edit text-primary me-2 cursor-pointer"></i>
                                    <i class="fas fa-trash text-danger cursor-pointer"></i>
                                </td>
                            </tr>
                            <tr data-row-id="4">
                                <td><input type="checkbox" class="rowCheckbox"></td>
                                <td>Muhammad Faadihilah</td>
                                <td>fadil@gmail.com</td>
                                <td>+62 8132000000</td>
                                <td>Haji Furodha</td>
                                <td>2</td>
                                <td>Muhammad Faadihilah (Ikhwan) <br>Mayang (Akhwat)</td>
                                <td>
                                    <i class="fas fa-edit text-primary me-2 cursor-pointer"></i>
                                    <i class="fas fa-trash text-danger cursor-pointer"></i>
                                </td>
                            </tr>
                            <tr data-row-id="5">
                                <td><input type="checkbox" class="rowCheckbox"></td>
                                <td>Muhammad Faadihilah</td>
                                <td>fadil@gmail.com</td>
                                <td>+62 8132000000</td>
                                <td>Haji Furodha</td>
                                <td>2</td>
                                <td>Muhammad Faadihilah (Ikhwan) <br>Mayang (Akhwat)</td>
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
