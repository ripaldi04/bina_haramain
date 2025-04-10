@extends('layouts.admin')

@section('script')
    @vite(['resources/js/admin/admin.js'])
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

                    <!-- Dropdown Profile -->
                    <div class="ms-auto dropdown profile-dropdown">
                        <button class="btn btn-light dropdown-toggle d-flex align-items-center" type="button"
                            id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <img id="headerProfileImage"
                                src=https://inspektorat.serangkota.go.id/po-content/uploads/userlogo.png alt="Foto Profil"
                                class="rounded-circle me-2" width="60" height="60">
                            <span id="headerUsername">Admin</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                    data-bs-target="#profileModal">Edit Profile</a></li>
                            <li><a class="dropdown-item text-danger" href="#">Logout</a></li>
                        </ul>
                    </div>
                </div>

                <h1 id="pageTitle" class="mb-4">Agen</h1>



                <!-- Modal Edit agen -->
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
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="saveChanges">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- Modal untuk Profil Admin -->
                <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="profileModalLabel">Edit Profil</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center">
                                    <img id="previewProfileImage"
                                        src=https://inspektorat.serangkota.go.id/po-content/uploads/userlogo.png
                                        class="rounded-circle mb-3" width="120" height="120">
                                    <input type="file" class="form-control" id="profilePicInput" accept="image/*">
                                </div>
                                <div class="mb-3">
                                    <label for="editUsername" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="editUsername" value="Admin">
                                </div>

                                <!-- Tombol Ubah Password -->
                                <button class="btn btn-warning w-100" data-bs-toggle="collapse" href="#changePassword"
                                    role="button" aria-expanded="false" aria-controls="changePassword">
                                    Ubah Password
                                </button>
                                <div class="collapse mt-3" id="changePassword">
                                    <div class="mb-3">
                                        <label for="newPassword" class="form-label">Password Baru</label>
                                        <input type="password" class="form-control" id="newPassword">
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirmPassword" class="form-label">Konfirmasi Password</label>
                                        <input type="password" class="form-control" id="confirmPassword">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-primary" id="saveProfileChanges">Simpan
                                    Perubahan</button>
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
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            <tr data-row-id="1">
                                <td><input type="checkbox" class="rowCheckbox"></td>
                                <td>Albert Vincent</td>
                                <td>albert@gmail.com</td>
                                <td>+62 8123000000</td>
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
