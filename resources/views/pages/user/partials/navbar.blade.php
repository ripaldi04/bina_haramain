@section('script')
    @vite(['resources/js/alert.js'])
@endsection

<nav class="navbar navbar-expand-lg bg-white">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/Logo Bina Haramain Baru.png') }}" alt="Bina Haramain" class="logo-shadow">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Beranda</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="layananDropdown" role="button"
                        data-bs-toggle="dropdown">
                        Layanan
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="layananDropdown">
                        <li><a class="dropdown-item" href="{{ route('layanan_haji') }}">Layanan Haji</a></li>
                        <li><a class="dropdown-item" href="{{ route('layanan_umrah') }}">Layanan Umrah</a></li>
                        <li><a class="dropdown-item" href="{{ route('islamic_tour') }}">Halal Tour</a></li>
                        <li><a class="dropdown-item" href="{{ route('riwayat') }}">Riwayat Pesanan</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('artikel') }}">Artikel</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('hubungi_kami') }}">Hubungi Kami</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('tentang_kami') }}">Tentang Kami</a></li>
            </ul>
        </div>

        {{-- Auth Section --}}
        @guest
            <a href="{{ route('register') }}" class="btn btn-auth">Masuk/Registrasi</a>
        @else
            @if (is_null(Auth::user()->email_verified_at))
                <a href="{{ route('verification.notice') }}" class="btn btn-auth">Verifikasi Email</a>
            @else
                <div class="dropdown">
                    <a href="#" class="btn btn-auth dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle"></i>
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="{{ route('profile') }}">Profil Saya</a></li>
                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" id="logout-confirm" class="dropdown-item">Keluar</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @endif
        @endguest

    </div>
</nav>
