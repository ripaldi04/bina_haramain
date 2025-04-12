document.addEventListener("DOMContentLoaded", function () {
    const menuItems = document.querySelectorAll(".menu-item");

    // Ambil menu aktif dari localStorage
    const activeMenu = localStorage.getItem("activeMenu");

    if (activeMenu) {
        // Hapus kelas active dari semua menu
        menuItems.forEach((item) => item.classList.remove("active"));

        // Tambahkan kelas active ke menu yang tersimpan di localStorage
        const activeElement = document.getElementById(activeMenu);
        if (activeElement) {
            activeElement.classList.add("active");
        } else {
            // Jika tidak ada menu aktif di localStorage, set menu pertama (misalnya "menuUser") sebagai aktif
            menuItems[0].classList.add("active");
            localStorage.setItem("activeMenu", menuItems[0].id);
        }
    }

    menuItems.forEach((menu) => {
        menu.addEventListener("click", function () {
            // Hapus kelas 'active' dari semua menu
            menuItems.forEach((item) => item.classList.remove("active"));

            // Tambahkan kelas 'active' ke menu yang diklik
            this.classList.add("active");

            // Simpan menu aktif ke localStorage
            localStorage.setItem("activeMenu", this.id);

            // Navigasi ke halaman yang sesuai
            let route = "";
            switch (this.id) {
                case "menuUser":
                    route = "/admin/users";
                    break;
                case "menuAgen":
                    route = "/admin/agen";
                    break;
                case "menuAffiliate":
                    route = "/admin/affiliate";
                    break;
                case "menuJamaah":
                    route = "/admin/jamaah";
                    break;
                case "menuPaket":
                    route = "/admin/paket";
                    break;
            }

            if (route) {
                window.location.href = route; // Pindah ke halaman sesuai menu yang diklik
            }
        });
    });
});