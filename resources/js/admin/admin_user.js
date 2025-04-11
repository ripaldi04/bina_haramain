// search kolom
document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchPaket");
    const tableBody = document.getElementById("tableBody");

    if (searchInput && tableBody) {
        searchInput.addEventListener("keyup", function () {
            const searchTerm = searchInput.value.toLowerCase();
            const rows = tableBody.getElementsByTagName("tr");

            for (let row of rows) {
                const columns = row.getElementsByTagName("td");
                let matchFound = false;

                for (let col of columns) {
                    if (col.textContent.toLowerCase().includes(searchTerm)) {
                        matchFound = true;
                        break;
                    }
                }

                row.style.display = matchFound ? "" : "none";
            }
        });
    }
});

document.getElementById('createUserBtn').addEventListener('click', function () {
    const name = document.getElementById('createName').value;
    const email = document.getElementById('createEmail').value;
    const password = document.getElementById('createPassword').value;
    const password_confirmation = document.getElementById('createPasswordConfirmation').value;

    fetch('/admin/users', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ name, email, password, password_confirmation })
    })
        .then(res => res.json())
        .then(data => {
            console.log('Respon', data);

            // Tutup modal
            const createModal = bootstrap.Modal.getInstance(document.getElementById('createModal'));
            createModal.hide();

            // Reset form
            document.getElementById('createName').value = '';
            document.getElementById('createEmail').value = '';
            document.getElementById('createPassword').value = '';
            document.getElementById('createPasswordConfirmation').value = '';

            // Tampilkan SweetAlert
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'User berhasil dibuat.',
                confirmButtonColor: '#3085d6'
            }).then(() => {
                // Refresh page atau reload table
                location.reload(); // atau panggil function renderTable() jika dinamis
            });
        })
        .catch(err => {
            console.error('Error:', err);
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Terjadi kesalahan saat membuat user.',
            });
        });
});














// //checkbox
// document.addEventListener("DOMContentLoaded", function () {
//     const selectAllCheckbox = document.getElementById("selectAll");
//     const rowCheckboxes = document.querySelectorAll(".rowCheckbox");
//     const deleteAllButton = document.getElementById("deleteAll");
//     const tableBody = document.getElementById("tableBody");

//     // Fungsi untuk mengupdate status Select All
//     function updateSelectAllStatus() {
//         const allChecked = [...rowCheckboxes].every(checkbox => checkbox.checked);
//         selectAllCheckbox.checked = allChecked;
//     }

//     // Event listener untuk Select All
//     if (selectAllCheckbox) {
//         selectAllCheckbox.addEventListener("change", function () {
//             rowCheckboxes.forEach(checkbox => {
//                 checkbox.checked = selectAllCheckbox.checked;
//             });
//         });
//     }

//     // Event listener untuk checkbox individu
//     rowCheckboxes.forEach(checkbox => {
//         checkbox.addEventListener("change", updateSelectAllStatus);
//     });

//     // Event listener untuk tombol hapus semua
//     if (deleteAllButton) {
//         deleteAllButton.addEventListener("click", function () {
//             const checkedRows = document.querySelectorAll(".rowCheckbox:checked");

//             if (checkedRows.length === 0) {
//                 Swal.fire("Peringatan", "Pilih setidaknya satu data untuk dihapus!", "warning");
//                 return;
//             }

//             Swal.fire({
//                 title: "Apakah Anda yakin?",
//                 text: "Data yang dihapus tidak dapat dikembalikan!",
//                 icon: "warning",
//                 showCancelButton: true,
//                 confirmButtonColor: "#d33",
//                 cancelButtonColor: "#3085d6",
//                 confirmButtonText: "Ya, hapus!"
//             }).then((result) => {
//                 if (result.isConfirmed) {
//                     checkedRows.forEach(checkbox => {
//                         checkbox.closest("tr").remove();
//                     });
//                     Swal.fire("Dihapus!", "Data telah berhasil dihapus.", "success");
//                 }
//             });
//         });
//     }
//     setupTable("userTable");
//     setupTable("agenTable");
//     setupTable("affiliateTable");
//     setupTable("pesananTable");
//     setupTable("paketTable");
// });











// //tombol tambah paket
// document.addEventListener("DOMContentLoaded", function () {
//     const savePaketBtn = document.getElementById("savePaket");
//     const paketGambarInput = document.getElementById("paketGambar");
//     const paketNamaInput = document.getElementById("paketNama");
//     const paketHotelMakkahInput = document.getElementById("paketHotelMakkah");
//     const paketHotelMadinahInput = document.getElementById("paketHotelMadinah");
//     const paketMaskapaiInput = document.getElementById("paketMaskapai");
//     const paketMaktabInput = document.getElementById("paketMaktab");
//     const paketHandlingBandaraInput = document.getElementById("paketHandlingBandara");
//     const paketMakanInput = document.getElementById("paketMakan");
//     const paketHargaInput = document.getElementById("paketHarga");
//     const tableBody = document.getElementById("tableBody");

//     savePaketBtn.addEventListener("click", function () {
//         const paketNama = paketNamaInput.value.trim();
//         const paketHotelMakkah = paketHotelMakkahInput.value.trim();
//         const paketHotelMadinah = paketHotelMadinahInput.value.trim();
//         const paketMaskapai = paketMaskapaiInput.value.trim();
//         const paketMaktab = paketMaktabInput.value.trim();
//         const paketHandlingBandara = paketHandlingBandaraInput.value.trim();
//         const paketMakan = paketMakanInput.value.trim();
//         const paketHarga = paketHargaInput.value.trim();
//         let paketGambarSrc = "https://via.placeholder.com/100"; // Default gambar

//         if (!paketNama || !paketHotelMakkah || !paketHotelMadinah || !paketMaskapai || !paketMaktab || !paketHandlingBandara || !paketMakan || !paketHarga) {
//             Swal.fire({
//                 icon: "error",
//                 title: "Gagal!",
//                 text: "Semua kolom harus diisi!",
//             });
//             return;
//         }

//         // Jika ada gambar yang diunggah, gunakan gambar tersebut
//         if (paketGambarInput.files.length > 0) {
//             const file = paketGambarInput.files[0];
//             const reader = new FileReader();
//             reader.onload = function (e) {
//                 paketGambarSrc = e.target.result;
//                 addRow(paketNama, paketHotelMakkah, paketHotelMadinah, paketMaskapai, paketMaktab, paketHandlingBandara, paketMakan, paketHarga, paketGambarSrc);
//             };
//             reader.readAsDataURL(file);
//         } else {
//             addRow(paketNama, paketHotelMakkah, paketHotelMadinah, paketMaskapai, paketMaktab, paketHandlingBandara, paketMakan, paketHarga, paketGambarSrc);
//         }

//         // Reset input
//         paketNamaInput.value = "";
//         paketHotelMakkahInput.value = "";
//         paketHotelMadinahInput.value = "";
//         paketMaskapaiInput.value = "";
//         paketMaktabInput.value = "";
//         paketHandlingBandaraInput.value = "";
//         paketMakanInput.value = "";
//         paketHargaInput.value = "";
//         paketGambarInput.value = "";

//         // Tutup modal setelah menambah paket
//         let addPaketModal = bootstrap.Modal.getInstance(document.getElementById("addPaketModal"));
//         addPaketModal.hide();
//     });

//     function addRow(nama, fasilitas, harga, gambarSrc) {
//         const row = document.createElement("tr");
//         row.innerHTML = `
//             <td><input type="checkbox" class="rowCheckbox"></td>
//             <td><img src="${gambarSrc}" alt="gambar" width="100" class="clickable-image" style="cursor: pointer;"></td>
//             <td>${nama}</td>
//             <td style="text-align: left;">${fasilitas.replace(/\n/g, "<br>")}</td>
//             <td>${harga}</td>
//             <td>
//                 <i class="fas fa-edit text-primary me-2 cursor-pointer edit-btn"></i>
//                 <i class="fas fa-trash text-danger cursor-pointer delete-btn"></i>
//             </td>
//         `;
//         tableBody.appendChild(row);
//     }
// });











// edit profile
document.addEventListener("DOMContentLoaded", function () {
    const profilePicInput = document.getElementById("profilePicInput");
    const previewProfileImage = document.getElementById("previewProfileImage");
    const headerProfileImage = document.getElementById("headerProfileImage");
    const editUsername = document.getElementById("editUsername");
    const headerUsername = document.getElementById("headerUsername");
    const saveProfileChanges = document.getElementById("saveProfileChanges");

    const newPassword = document.getElementById("newPassword");
    const confirmPassword = document.getElementById("confirmPassword");

    // Pratinjau gambar profil yang diunggah
    profilePicInput.addEventListener("change", function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                previewProfileImage.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    // Simpan perubahan profil
    saveProfileChanges.addEventListener("click", function () {
        // Validasi perubahan password
        if (newPassword.value || confirmPassword.value) {
            if (newPassword.value !== confirmPassword.value) {
                Swal.fire({
                    icon: "error",
                    title: "Gagal!",
                    text: "Konfirmasi password tidak cocok.",
                });
                return;
            }
        }

        // Update username di navbar
        headerUsername.textContent = editUsername.value;

        // Update gambar profil di navbar jika ada perubahan
        if (profilePicInput.files.length > 0) {
            headerProfileImage.src = previewProfileImage.src;
        }

        // Tampilkan notifikasi sukses
        Swal.fire({
            icon: "success",
            title: "Perubahan Disimpan!",
            text: "Profil dan password berhasil diperbarui.",
            timer: 1500,
            showConfirmButton: false
        });

        // Tutup modal setelah menyimpan perubahan
        setTimeout(() => {
            let profileModal = bootstrap.Modal.getInstance(document.getElementById("profileModal"));
            profileModal.hide();
        }, 1600);
    });
});











// edit user dan agen
document.addEventListener("DOMContentLoaded", function () {
    const tableBody = document.getElementById("tableBody");
    const editModal = new bootstrap.Modal(document.getElementById("editModal"));
    const closeModalButtons = document.querySelectorAll(".close-modal, .modal .btn-close");
    const editName = document.getElementById("editName");
    const editEmail = document.getElementById("editEmail");
    const editReferral = document.getElementById("editReferral");
    const saveChanges = document.getElementById("saveChanges");

    let currentRow = null; // Untuk menyimpan referensi baris yang sedang diedit

    // Event listener untuk ikon edit
    tableBody.addEventListener("click", function (event) {
        if (event.target.classList.contains("fa-edit")) {
            const row = event.target.closest("tr");
            currentRow = row; // Simpan referensi baris

            // Ambil data dari baris yang dipilih
            const name = row.cells[1].textContent;
            const email = row.cells[2].textContent;
            const referral = row.cells[3].textContent;

            editName.value = name;
            editEmail.value = email; // Email
            editReferral.value = referral;

            // Tampilkan modal edit
            editModal.show();
        }
    });

    closeModalButtons.forEach(button => {
        button.addEventListener("click", function () {
            editModal.hide();  // Menutup modal menggunakan instance yang sudah didefinisikan
        });
    });

    // Simpan perubahan setelah edit
    saveChanges.addEventListener("click", function () {
        if (currentRow) {
            // Ambil id row yang sedang diedit
            const rowId = currentRow.dataset.rowId; // Pastikan Anda memberikan data-row-id pada <tr>

            // Ambil data baru dari form
            const newName = editName.value;
            const newEmail = editEmail.value;

            // Update data pada baris tabel
            currentRow.cells[1].textContent = newName;
            currentRow.cells[2].textContent = newEmail;

            // Kirim data perubahan menggunakan AJAX
            fetch('/admin/users/${rowId}', {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // CSRF token
                },
                body: JSON.stringify({
                    id: rowId,           // ID pengguna yang diedit
                    name: newName,       // Nama baru
                    email: newEmail,      // Email baru
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        // Update data di baris tabel setelah berhasil
                        currentRow.cells[1].textContent = newName;
                        currentRow.cells[2].textContent = newEmail;

                        // Tutup modal setelah berhasil
                        editModal.hide();

                        // SweetAlert sukses
                        Swal.fire({
                            title: 'Berhasil!',
                            text: 'user berhasil di update!',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                    } else {
                        Swal.fire({
                            title: 'Gagal!',
                            text: 'user gagal di update.',
                            icon: 'error',
                            confirmButtonText: 'Try Again'
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        title: 'Error!',
                        text: 'Something went wrong.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                });
        }
    });


    // Event listener untuk ikon hapus
    tableBody.addEventListener("click", function (event) {
        if (event.target.classList.contains("fa-trash")) {
            const row = event.target.closest("tr");

            // Ambil id pengguna yang akan dihapus (misalnya menggunakan data-row-id)
            const rowId = row.dataset.rowId;

            Swal.fire({
                title: "Apakah Anda yakin?",
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Ya, hapus!"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kirim permintaan untuk menghapus data
                    fetch(`/admin/users/${rowId}`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // CSRF token
                        },
                    })
                        .then(response => response.json())
                        .then(data => {
                            console.log(data);  // Untuk memastikan respons yang dikirimkan
                            if (data.status === 'success') {
                                // Hapus baris dari tabel setelah berhasil dihapus
                                row.remove();

                                // Tampilkan SweetAlert sukses
                                Swal.fire("Dihapus!", "Data telah berhasil dihapus.", "success");
                            } else {
                                Swal.fire({
                                    title: 'Gagal!',
                                    text: 'Gagal menghapus data.',
                                    icon: 'error',
                                    confirmButtonText: 'Coba Lagi'
                                });
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire({
                                title: 'Error!',
                                text: 'Terjadi kesalahan saat menghapus data.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        });
                }
            });
        }
    });
});





// //edit affiliate
// document.addEventListener("DOMContentLoaded", function () {
//     const tableBody = document.getElementById("tableBody");
//     const editModal = new bootstrap.Modal(document.getElementById("editModal"));
//     const editName = document.getElementById("editName");
//     const editEmail = document.getElementById("editEmail");
//     const editPhone = document.getElementById("editPhone");
//     const editLink = document.getElementById("editLink");
//     const editKomisi = document.getElementById("editKomisi");
//     const saveChanges = document.getElementById("saveChanges");

//     let currentRow = null; // Untuk menyimpan referensi baris yang sedang diedit

//     // Event listener untuk ikon edit
//     tableBody.addEventListener("click", function (event) {
//         if (event.target.classList.contains("fa-edit")) {
//             const row = event.target.closest("tr");
//             currentRow = row; // Simpan referensi baris

//             // Ambil data dari baris yang dipilih
//             const name = row.cells[1].textContent;
//             const email = row.cells[2].textContent; // Pisahkan email & phone
//             const phone = row.cells[3].textContent;
//             const link = row.cells[4].textContent;
//             const komisi = row.cells[5].textContent;

//             editName.value = name;
//             editEmail.value = email; // Email
//             editPhone.value = phone; // Phone (jika ada)
//             editLink.value = link;
//             editKomisi.value = komisi;

//             // Tampilkan modal edit
//             editModal.show();
//         }
//     });

//     closeModalButtons.forEach(button => {
//         button.addEventListener("click", function () {
//             const modalElement = this.closest(".modal");
//             const modalInstance = bootstrap.Modal.getInstance(modalElement);
//             if (modalInstance) {
//                 modalInstance.hide(); // Tutup modal
//             }
//         });
//     });

//     // Simpan perubahan setelah edit
//     saveChanges.addEventListener("click", function () {
//         if (currentRow) {
//             currentRow.cells[1].textContent = editName.value;
//             currentRow.cells[2].textContent = editEmail.value;
//             currentRow.cells[3].textContent = editPhone.value;
//             currentRow.cells[4].textContent = editLink.value;
//             currentRow.cells[5].textContent = editKomisi.value;

//             // Tutup modal setelah menyimpan
//             editModal.hide();
//         }
//     });

//     // Event listener untuk ikon hapus
//     tableBody.addEventListener("click", function (event) {
//         if (event.target.classList.contains("fa-trash")) {
//             const row = event.target.closest("tr");

//             Swal.fire({
//                 title: "Apakah Anda yakin?",
//                 text: "Data yang dihapus tidak dapat dikembalikan!",
//                 icon: "warning",
//                 showCancelButton: true,
//                 confirmButtonColor: "#d33",
//                 cancelButtonColor: "#3085d6",
//                 confirmButtonText: "Ya, hapus!"
//             }).then((result) => {
//                 if (result.isConfirmed) {
//                     row.remove();
//                     Swal.fire("Dihapus!", "Data telah berhasil dihapus.", "success");
//                 }
//             });
//         }
//     });
// });





// //edit pesanan
// document.addEventListener("DOMContentLoaded", function () {
//     const tableBody = document.getElementById("tableBody");
//     const editModalElement = document.getElementById("editModal");
//     const editModal = new bootstrap.Modal(editModalElement);
//     const editName = document.getElementById("editName");
//     const editEmail = document.getElementById("editEmail");
//     const editPhone = document.getElementById("editPhone");
//     const editPaket = document.getElementById("editPaket");
//     const editJumlah = document.getElementById("editJumlah");
//     const editJemaah = document.getElementById("editJemaah");
//     const saveChanges = document.getElementById("saveChanges");

//     let currentRow = null; // Untuk menyimpan referensi baris yang sedang diedit

//     // Event listener untuk ikon edit
//     tableBody.addEventListener("click", function (event) {
//         if (event.target.classList.contains("fa-edit")) {
//             const row = event.target.closest("tr");
//             currentRow = row; // Simpan referensi baris

//             // Ambil data dari baris yang dipilih
//             editName.value = row.cells[1].textContent;
//             editEmail.value = row.cells[2].textContent;
//             editPhone.value = row.cells[3].textContent;
//             editPaket.value = row.cells[4].textContent;
//             editJumlah.value = row.cells[5].textContent;
//             editJemaah.value = row.cells[6].textContent;

//             // Tampilkan modal edit
//             editModal.show();
//         }
//     });

//     // Simpan perubahan setelah edit
//     saveChanges.addEventListener("click", function () {
//         if (currentRow) {
//             currentRow.cells[1].textContent = editName.value;
//             currentRow.cells[2].textContent = editEmail.value;
//             currentRow.cells[3].textContent = editPhone.value;
//             currentRow.cells[4].textContent = editPaket.value;
//             currentRow.cells[5].textContent = editJumlah.value;
//             currentRow.cells[6].textContent = editJemaah.value;

//             // Tutup modal dengan metode Bootstrap 5
//             const editModalInstance = bootstrap.Modal.getInstance(document.getElementById("editModal"));
//             editModalInstance.hide();
//         }
//     });


//     // Pastikan tombol close & silang bisa menutup modal
//     document.querySelectorAll(".close-modal, .btn-close").forEach(button => {
//         button.addEventListener("click", function () {
//             const modalInstance = bootstrap.Modal.getInstance(editModalElement);
//             if (modalInstance) {
//                 modalInstance.hide();
//             }
//         });
//     });

//     // Event listener untuk ikon hapus
//     tableBody.addEventListener("click", function (event) {
//         if (event.target.classList.contains("fa-trash")) {
//             const row = event.target.closest("tr");

//             Swal.fire({
//                 title: "Apakah Anda yakin?",
//                 text: "Data yang dihapus tidak dapat dikembalikan!",
//                 icon: "warning",
//                 showCancelButton: true,
//                 confirmButtonColor: "#d33",
//                 cancelButtonColor: "#3085d6",
//                 confirmButtonText: "Ya, hapus!"
//             }).then((result) => {
//                 if (result.isConfirmed) {
//                     row.remove();
//                     Swal.fire("Dihapus!", "Data telah berhasil dihapus.", "success");
//                 }
//             });
//         }
//     });
// });





// //edit paket
// document.addEventListener("DOMContentLoaded", function () {
//     const editModal = new bootstrap.Modal(document.getElementById("editModal"));
//     const imageModal = new bootstrap.Modal(document.getElementById("imageModal"));
//     const tableBody = document.getElementById("tableBody");
//     const editPaketInput = document.getElementById("editPaket");
//     const editFasilitasInput = document.getElementById("editFasilitas");
//     const editHargaInput = document.getElementById("editHarga");
//     const editGambarInput = document.getElementById("editGambar");
//     const previewGambar = document.getElementById("previewGambar");
//     const saveChangesButton = document.getElementById("saveChanges");
//     let currentEditingRow = null;

//     // Event listener untuk tombol edit
//     tableBody.addEventListener("click", function (event) {
//         if (event.target.classList.contains("fa-edit")) {
//             const row = event.target.closest("tr");
//             currentEditingRow = row;

//             const gambarSrc = row.children[1].querySelector("img").src;
//             const paket = row.children[2].innerText;
//             const fasilitas = row.children[3].innerText;
//             const harga = row.children[4].innerText;

//             editPaketInput.value = paket;
//             editFasilitasInput.value = fasilitas;
//             editHargaInput.value = harga;
//             previewGambar.src = gambarSrc; // Set preview gambar

//             editModal.show();
//         }
//     });

//     // Fungsi untuk menampilkan gambar pada modal
//     document.querySelectorAll(".clickable-image").forEach(img => {
//         img.addEventListener("click", function () {
//             document.getElementById("modalImage").src = this.src;
//             imageModal.show();
//         });
//     });

//     // Update gambar preview saat memilih file baru
//     editGambarInput.addEventListener("change", function () {
//         const file = this.files[0];
//         if (file) {
//             const reader = new FileReader();
//             reader.onload = function (e) {
//                 previewGambar.src = e.target.result;
//             };
//             reader.readAsDataURL(file);
//         }
//     });

//     // Simpan perubahan
//     saveChangesButton.addEventListener("click", function () {
//         if (currentEditingRow) {
//             currentEditingRow.children[2].innerText = editPaketInput.value;
//             currentEditingRow.children[3].innerText = editFasilitasInput.value;
//             currentEditingRow.children[4].innerText = editHargaInput.value;
//             currentEditingRow.children[1].querySelector("img").src = previewGambar.src; // Update gambar

//             // Tutup modal dengan metode Bootstrap 5
//             const editModalInstance = bootstrap.Modal.getInstance(document.getElementById("editModal"));
//             editModalInstance.hide();
//         }
//     });

//     // Hapus paket
//     tableBody.addEventListener("click", function (event) {
//         if (event.target.classList.contains("fa-trash")) {
//             const row = event.target.closest("tr");

//             Swal.fire({
//                 title: "Apakah Anda yakin?",
//                 text: "Data yang dihapus tidak dapat dikembalikan!",
//                 icon: "warning",
//                 showCancelButton: true,
//                 confirmButtonColor: "#d33",
//                 cancelButtonColor: "#3085d6",
//                 confirmButtonText: "Ya, hapus!"
//             }).then((result) => {
//                 if (result.isConfirmed) {
//                     row.remove();
//                     Swal.fire("Dihapus!", "Data telah berhasil dihapus.", "success");
//                 }
//             });
//         }
//     });
// });











// document.addEventListener("DOMContentLoaded", function () {
//     const menuItems = document.querySelectorAll(".menu-item");
//     const searchInput = document.getElementById("search");
//     const userRows = document.querySelectorAll(".user-row");
//     const profilePicture = document.getElementById("profile-picture");
//     const profileUpload = document.getElementById("profile-upload");
//     const closeModalButtons = document.querySelectorAll(".close-modal");

//     // Highlight menu item
//     menuItems.forEach(item => {
//         item.addEventListener("click", function () {
//             menuItems.forEach(i => i.classList.remove("active"));
//             this.classList.add("active");
//         });
//     });

//     // Search functionality
//     searchInput.addEventListener("input", function () {
//         const query = this.value.toLowerCase();
//         userRows.forEach(row => {
//             const name = row.querySelector(".user-name").textContent.toLowerCase();
//             row.style.display = name.includes(query) ? "table-row" : "none";
//         });
//     });

//     // Edit user
//     document.querySelectorAll(".edit-user").forEach(button => {
//         button.addEventListener("click", function () {
//             const userId = this.dataset.userId;
//             document.getElementById("edit-modal").style.display = "block";
//             document.getElementById("edit-user-id").value = userId;
//         });
//     });

//     // Delete user
//     document.querySelectorAll(".delete-user").forEach(button => {
//         button.addEventListener("click", function () {
//             if (confirm("Are you sure you want to delete this user?")) {
//                 const userId = this.dataset.userId;
//                 document.getElementById("user-row-" + userId).remove();
//             }
//         });
//     });

//     // Profile picture upload
//     profileUpload.addEventListener("change", function () {
//         const file = this.files[0];
//         if (file) {
//             const reader = new FileReader();
//             reader.onload = function (e) {
//                 profilePicture.src = e.target.result;
//             };
//             reader.readAsDataURL(file);
//         }
//     });

//     // Close modals
//     closeModalButtons.forEach(button => {
//         button.addEventListener("click", function () {
//             this.closest(".modal").style.display = "none";
//         });
//     });
// });