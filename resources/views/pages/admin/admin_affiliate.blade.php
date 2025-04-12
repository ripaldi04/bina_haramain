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

                <h1 id="pageTitle" class="mb-4">Affiliate</h1>



                <!-- Modal Edit affiliate -->
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
                                    <label for="editLink" class="form-label">Link</label>
                                    <input type="text" class="form-control" id="editLink">
                                </div>
                                <div class="mb-3">
                                    <label for="editKomisi" class="form-label">Komisi</label>
                                    <input type="text" class="form-control" id="editKomisi">
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Link</th>
                                <th>Komisi</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            <tr data-row-id="1">
                                <td><input type="checkbox" class="rowCheckbox"></td>
                                <td>Albert Vincent</td>
                                <td>albert@gmail.com</td>
                                <td>+62 8123000000</td>
                                <td style="padding: 20px; border-radius: 30px;"><span
                                        style="padding: 10px;">albereinsten.com</span></td>
                                <td style="padding: 20px; border-radius: 30px;"><span style="padding: 10px;">Success : 5
                                        <br> total pendapatan : $1000</span></td>
                                <td>
                                    <i class="fas fa-edit text-primary me-2 cursor-pointer"></i>
                                    <i class="fas fa-trash text-danger cursor-pointer"></i>
                                </td>
                            </tr>
                            <tr data-row-id="2">
                                <td><input type="checkbox" class="rowCheckbox"></td>
                                <td>Budi Santoso</td>
                                <td>budi@gmail.com</td>
                                <td>+62 8132000000</td>
                                <td style="padding: 20px; border-radius: 30px;"><span
                                        style="padding: 10px;">budieinsten.com</span></td>
                                <td style="padding: 20px; border-radius: 30px;"><span style="padding: 10px;">Success : 5
                                        <br> total pendapatan : $1000</span></td>
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
