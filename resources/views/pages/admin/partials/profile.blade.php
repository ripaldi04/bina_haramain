        <!-- Dropdown Profile -->
        <div class="ms-auto dropdown profile-dropdown">
            <button class="btn btn-light dropdown-toggle d-flex align-items-center" type="button" id="profileDropdown"
                data-bs-toggle="dropdown" aria-expanded="false">
                <img id="headerProfileImage" src=https://inspektorat.serangkota.go.id/po-content/uploads/userlogo.png
                    alt="Foto Profil" class="rounded-circle me-2" width="60" height="60">
                <span id="headerUsername">Admin</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#profileModal">Edit
                        Profile</a></li>
                <li><a class="dropdown-item text-danger" href="#">Logout</a></li>
            </ul>
        </div>
        </div>
        <!-- Modal untuk Profil Admin -->
        <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="profileModalLabel">Edit Profil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
