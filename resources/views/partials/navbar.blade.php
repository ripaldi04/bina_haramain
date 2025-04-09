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
                <li class="nav-item"><a class="nav-link" href="{{route ('home')}}">Beranda</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="layananDropdown" role="button"
                        data-bs-toggle="dropdown">
                        Layanan
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="layananDropdown">
                        <li><a class="dropdown-item" href="{{ route('layanan_haji') }}">Layanan Haji</a></li>
                        <li><a class="dropdown-item" href="{{route ('layanan_umrah')}}">Layanan Umrah</a></li>
                        <li><a class="dropdown-item" href="{{route('riwayat')}}">Riwayat Pesanan</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{route('hubungi_kami')}}">Hubungi Kami</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Tentang Kami</a></li>
            </ul>
        </div>
        <a href="{{asset ('register')}}" class="btn btn-auth">Masuk/Registrasi</a>
    </div>
</nav>
