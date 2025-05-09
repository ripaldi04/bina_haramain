@extends('layouts.admin')

@section('script')
    @vite(['resources/js/admin/admin_user.js', 'resources/js/admin/partials/sidebar.js'])
@endsection

@section('content')
    <div class="bg-light">
        <div class="d-flex">
            <!-- Main Content -->
            <div class="container-fluid p-4">
                {{-- <div class="d-flex justify-content-end align-items-center mb-4">
                    @include('pages.admin.partials.profile')
                </div> --}}
                <h1 id="pageTitle" class="mb-4">User</h1>
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




                    <!-- Modal Edit User -->
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
                                    <div class="mb-3">
                                        <label for="editName" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="editName">
                                    </div>
                                    <div class="mb-3">
                                        <label for="editEmail" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="editEmail">
                                    </div>
                                    <div class="mb-3">
                                        <label for="editReferral" class="form-label">Kode Referral</label>
                                        <input type="text" class="form-control" id="editReferral" readonly>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary close-modal"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="saveChanges">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Create User -->
                    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Create New User</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="createName" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="createName">
                                    </div>
                                    <div class="mb-3">
                                        <label for="createEmail" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="createEmail">
                                    </div>
                                    <div class="mb-3">
                                        <label for="createPassword" class="form-label">Sandi</label>
                                        <input type="password" class="form-control" id="createPassword">
                                    </div>
                                    <div class="mb-3">
                                        <label for="createPasswordConfirmation" class="form-label">Ulangi Sandi</label>
                                        <input type="password" class="form-control" id="createPasswordConfirmation">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary close-modal"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="createUserBtn">Create</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <button id="deleteAll" class="btn btn-danger">Hapus Semua</button>
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>

                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="selectAll"></th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Kode Referral</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @foreach ($users as $user)
                                <!-- Loop untuk menampilkan setiap user -->
                                <tr data-row-id="{{ $user->id }}">
                                    <td><input type="checkbox" class="rowCheckbox"></td>
                                    <td>{{ $user->name }}</td> <!-- Menampilkan nama user -->
                                    <td>{{ $user->email }}</td> <!-- Menampilkan email user -->
                                    <td>{{ $user->kode_referral }}</td>
                                    <td>
                                        <i class="fas fa-edit text-primary me-2 cursor-pointer"></i>
                                        <i class="fas fa-trash text-danger cursor-pointer"></i>
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
