<div class="bg-white shadow p-3 d-flex flex-column min-vh-100 sidebar">
    <div class="text-center pb-3">
        <img src="https://binaharamain.com/wp-content/uploads/2025/01/Logo-Bina-Haramain-Baru-1024x872.png" alt="Logo"
            width="80">
    </div>

    <h5 class="text-secondary mt-3 px-3">MAIN MENU</h5>

    <ul class="list-unstyled flex-grow-1">
        <li class="p-2">
            <a href="{{ url('/admin/users') }}"
                class="text-dark text-decoration-none d-block menu-item{{ request()->is('admin/users') ? 'active' : '' }}">
                <i class="fas fa-user"></i> User
            </a>
        </li>
        <li class="p-2">
            <a href="{{ url('/admin/jamaah') }}"
                class="text-dark text-decoration-none d-block menu-item {{ request()->is('admin/jamaah') ? 'active' : '' }}">
                <i class="fas fa-user-shield"></i> Data Pemesan
            </a>
        </li>
        <li class="p-2">
            <a href="{{ url('/admin/paket') }}"
                class="text-dark text-decoration-none d-block menu-item {{ request()->is('admin/paket') ? 'active' : '' }}">
                <i class="fas fa-plane"></i> Paket Umrah & Haji
            </a>
        </li>
        <li class="p-2">
            <a href="{{ url('/admin/landing-page') }}"
                class="text-dark text-decoration-none d-block menu-item {{ request()->is('admin/landing-page') ? 'active' : '' }}">
                <i class="bi bi-file-earmark-fill"></i> Landing Page
            </a>
        </li>
        <li class="p-2">
            <a href="{{ url('/admin/artikel') }}"
                class="text-dark text-decoration-none d-block menu-item {{ request()->is('admin/artikel') ? 'active' : '' }}">
                <i class="bi bi-file-earmark-fill"></i> Artikel
            </a>
        </li>
    </ul>

    <div class="mt-auto">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center">
                <i class="fas fa-sign-out-alt me-2"></i> Log out
            </button>
        </form>
    </div>
</div>
