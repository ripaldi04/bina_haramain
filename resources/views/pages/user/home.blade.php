@extends('layouts.user')

@section('title', 'Beranda')

@section('style')
    @vite(['resources/css/user/home.css'])
@endsection

@section('script')
    @vite(['resources/js/alert.js'])
@endsection

@section('content')
    <div class="hero-section bg-light">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-evenly px-3 py-5">
                @if (session('success'))
                    <meta name="success-message" content="{{ session('success') }}">
                @endif

                @if (session('error'))
                    <div id="error-message" data-message="{{ session('error') }}"></div>
                @endif

                @foreach ($errors->all() as $error)
                    <div class="error-list" data-message="{{ $error }}"></div>
                @endforeach

                <!-- Teks utama (Desktop) -->
                <div class="col-md-6 text-md-start d-none d-md-block">
                    <h1 class="fs-4">{{ $banner->header1 }}</h1>
                    <p class="fs-4 fw-bold text-warning">{{ $banner->header2 }}</p>
                    <p class="fs-6">{{ $banner->deskripsi }}</p>
                    <a href="{{ route('layanan_haji') }}" class="btn btn-warning text-white mt-2"
                        style="width: 150px; border-radius: 4px;">
                        Lihat Paket
                    </a>

                </div>

                <!-- Gambar (Desktop) -->
                <div class="col-md-6 text-end d-none d-md-block">
                    <img src="{{ asset('storage/' . $banner->image_url) }}" class="img-fluid" alt="Banner">
                </div>

                <!-- Semua elemen dalam satu kolom (Mobile) -->
                <div class="col-12 text-center d-md-none">
                    <h1 class="fs-3">Haji Langsung Berangkat</h1>
                    <p class="fs-4 fw-bold text-warning">
                        Tanpa Antri <br> Visa Haji Resmi <br> Maktab VIP <br> Sepenuh Hati
                    </p>
                    <img src="{{ asset('storage/' . $banner->image_url) }}" class="img-fluid" alt="Banner">
                    <p class="fs-6">
                        Spesial bersama Koh Dennis Lim dan Teh Yunda – Kuota Terbatas, Segera Amankan Kuota Anda sebelum
                        Terlambat!
                    </p>
                    <button class="btn btn-warning text-white mt-2" style="width: 150px; border-radius: 4px;">
                        Lihat Paket
                    </button>
                </div>

            </div>
        </div>
    </div>



    <div class="container">
        <div class="container-card-highlight">
            <div class="row mt-5 justify-content-center mobile-card--highlight-container">
                <div class="col-4">
                    <div class="card card-scale">
                        <div class="card-body card-highlight">
                            <h5 class="card-title">Penawaran Harga Terbaik</h5>
                            <p class="card-text">Penawaran harga terbaik untuk Anda yang rindu ke Baitullah. Harga kami
                                jujur dan bersaing</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card card-scale">
                        <div class="card-body card-highlight">
                            <h5 class="card-title dua">Visa Haji Resmi</h5>
                            <p class="card-text">Pasti Berangkat, Tanpa Ribet! Haji lebih tenang dengan Visa Haji Resmi
                                dan Tanpa antre panjang</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card card-scale">
                        <div class="card-body card-highlight">
                            <h5 class="card-title">Travel Resmi Terpercaya</h5>
                            <p class="card-text">Kami secara resmi terdaftar di Kementerian Agama Republik Indonesia.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($video)
        <div class="container d-flex justify-content-center" style="margin-top: -50px; margin-bottom: 40px;">

            <div style="width: 950px; height: 500px;">
                <iframe width="100%" height="100%"
                    src="https://www.youtube.com/embed/{{ $video->youtube_id }}?autoplay=0" frameborder="0"
                    allow="autoplay; encrypted-media" allowfullscreen style="border-radius: 20px;">
                </iframe>
            </div>
        </div>
    @endif
    <div class="container">
        <div class="row p-3 d-flex justify-content-center align-items-center g-5 sudah-siap">
            <div class="col-md-7 col-12">
                <div style="margin-left: 15%; margin-bottom: 10%;">
                    @if (!empty($highlight1->header))
                        <h4 class="fs-6 mb-3 mt-5 header-sudah-siap" style="color: var(--primary-color);">
                            {{ $highlight1->header }}
                        </h4>
                    @endif
                    <div style="display: flex; flex-direction: column; gap: 10px;">
                        @foreach ([$highlight1->point1, $highlight1->point2, $highlight1->point3, $highlight1->point4, $highlight1->point5] as $point)
                            @if (!empty($point))
                                <div class="icon-text d-flex align-items-start gap-2">
                                    <img src="{{ asset('images/v121_56.png') }}" width="20" alt="Icon">
                                    <p class="mb-0">{{ $point }}</p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    @if (!empty($highlight1->deskripsi))
                        <p class="mt-5 lh-lg">{{ $highlight1->deskripsi }}</p>
                    @endif
                </div>
            </div>
            <div class="col-md-5 col-12">
                @if (!empty($highlight1->image_url))
                    <img src="{{ asset('storage/' . $highlight1->image_url) }}" alt="ini gambar" width="352px"
                        height="406" style="border-radius: 30px;">
                @else
                    <p>Gambar tidak tersedia</p>
                @endif
            </div>
            <div class="row p-3 d-flex justify-content-center align-items-start g-5"
                style="background-color: white; width: 90%;">
                <div class="col-md-6 col-12 mbl-img-none">
                    <img src="{{ asset('storage/' . $highlight2->image_url) }}" width="450px" height="450px"
                        style="border-radius: 30px" alt="">
                </div>
                <div class="col-md-6 col-12">
                    <h5 class="card-title fs-2" style="color: var(--primary-color);"> {{ $highlight2->header }}</h5>
                    <p class="mt-5 lh-lg"> {{ $highlight2->deskripsi }}</p>
                </div>
                <div class="row g-3 align-items-start">
                    @foreach ($landingPoint->chunk(ceil($landingPoint->count() / 2)) as $chunk)
                        <div class="col-6 p-0">
                            @foreach ($chunk as $point)
                                <div class="row g-0 align-items-center mb-5 d-flex item-row">
                                    <div class="col-2 d-flex justify-content-center">
                                        <img src="{{ asset('storage/' . $point->image_url) }}" class="img-fluid fixed-img">
                                    </div>
                                    <div class="col-10 h-100 ps-3">
                                        <h5>{{ $point->title }}</h5>
                                        <p>{{ $point->deskripsi }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- Keunggulan --}}
    <div class="mt-5 keunggulan">
        <div class="container">
            <h5 class="fw-bold fs-2 text-center" style="margin-top: 5%;">Keunggulan Travel Kami</h5>
            <div class="row d-flex justify-content-center align-items-center"
                style="color: black; margin-top: 5%; margin-bottom: 5%;">
                @foreach ($keunggulan as $item)
                    <div class="col-lg-4 col-md-6 col-12 text-center mb-3">
                        <div class="d-flex flex-row align-items-center gap-3"
                            style="background-color: white; padding: 15px; margin: 20px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); text-align: left;">
                            <img src="{{ asset('storage/' . $item->image_url) }}" alt="{{ $item->title }}"
                                height="60" width="60" style="object-fit: cover; border-radius: 8px;">
                            <h5 class="m-0 fw-bold" style="font-size: 1.2rem;">{{ $item->title }}</h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container mt-5 mb-5">
        <div>
            <div class="fs-2 fw-bold text-center" style="color: var(--primary-color);">
                Fasilitas Untuk Jamaah
            </div>
            <div class="garis-bawah-fasilitas mb-5"></div>

            <div class="row gy-5 justify-content-center mt-5 mb-5"> <!-- gy-5 kasih jarak antar baris -->
                @if ($fasilitas->isEmpty())
                    <p class="text-center">Tidak ada fasilitas yang tersedia.</p>
                @else
                    @foreach ($fasilitas as $item)
                        <div class="col-lg-4 col-md-6 col-sm-12 d-flex align-items-stretch mt-5 mb-5">
                            <div class="text-center p-4"
                                style="background-color: #fff; border: 1px solid #ddd; border-radius: 12px; position: relative; padding-top: 80px; padding-bottom: 40px; box-shadow: 0px 4px 10px rgba(0,0,0,0.05); max-width: 320px; margin: 0 auto; word-wrap: break-word;">
                                <div
                                    style="width: 80px; height: 80px; overflow: hidden; margin: 0 auto; position: absolute; top: -40px; left: 0; right: 0; background-color: #fff;">
                                    <img src="{{ asset('storage/' . $item->image_url) }}" alt="Fasilitas Image"
                                        style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
                                </div>
                                <h5 class="fw-bold mt-4" style="color: #555; word-break: break-word;">
                                    {{ $item->title }}
                                </h5>
                                <p style="color: #666; font-size: 15px; word-break: break-word;">
                                    {{ $item->deskripsi }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>


    <div class="container mt-5">
        <div class="text-center mb-5">
            <h2 class="fs-3 fw-bold" style="color: var(--primary-color);">Muthawif</h2>
            <h2 class="fs-2 fw-bold" style="color: black;">Berpengalaman dan Profesional</h2>
        </div>
        <div class="row mt-4 justify-content-center">
            @foreach ($muthawifs as $muthawif)
                <div class="col-md-4 d-flex justify-content-center">
                    <div class="card muthawif" style="width: 18rem; border-radius: 30px; background-size: cover;">
                        <div class="image-blur"></div>
                        <img src="{{ asset('storage/' . $muthawif->image_url) }}" class="card-img-top"
                            alt="Foto Muthawif">
                        <div class="card-body muthawif-body">
                            <h5 class="card-title text-center fs-4" style="color:white;">{{ $muthawif->nama }}</h5>
                            <p class="card-text text-center" style="color: var(--secondary-color);">
                                {{ $muthawif->daerah }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container">
        <div class="mt-5 container-fluid">
            <h5 class="fs-6">GALERI</h5>
            <h5 class="fs-5 fw-bold" style="color: var(--primary-color);">Galeri Keberangkatan Haji Tahun 2024 M /
                1445 H
            </h5>
            <span class="garis-bawah-galeri mb-5"></span>

            <div class="row g-3">
                <!-- Gunakan gap antara elemen -->
                <div class="col-lg-3 col-md-6">
                    @if (!empty($galeri->image1_url))
                        <img src="{{ asset('storage/' . $galeri->image1_url) }}" class="galeri-img">
                    @endif
                </div>
                <div class="col-lg-3 col-md-6 d-flex flex-column">
                    @if (!empty($galeri->image2_url))
                        <img src="{{ asset('storage/' . $galeri->image2_url) }}" class="galeri-img-small">
                    @endif
                    @if (!empty($galeri->image3_url))
                        <img src="{{ asset('storage/' . $galeri->image3_url) }}" class="galeri-img-small mt-3">
                    @endif
                </div>
                <div class="col-lg-3 col-md-6">
                    @if (!empty($galeri->image4_url))
                        <img src="{{ asset('storage/' . $galeri->image4_url) }}" class="galeri-img">
                    @endif
                </div>
                <div class="col-lg-3 col-md-6">
                    @if (!empty($galeri->image5_url))
                        <img src="{{ asset('storage/' . $galeri->image5_url) }}" class="galeri-img">
                    @endif
                </div>
            </div>

            <div class="row mt-3 g-3">
                <div class="col-lg-4 col-md-6">
                    @if (!empty($galeri->image6_url))
                        <img src="{{ asset('storage/' . $galeri->image6_url) }}" class="galeri-img">
                    @endif
                </div>
                <div class="col-lg-4 col-md-6">
                    @if (!empty($galeri->image7_url))
                        <img src="{{ asset('storage/' . $galeri->image7_url) }}" class="galeri-img">
                    @endif
                </div>
                <div class="col-lg-4 col-md-12">
                    @if (!empty($galeri->image8_url))
                        <img src="{{ asset('storage/' . $galeri->image8_url) }}" class="galeri-img">
                    @endif
                </div>
            </div>
        </div>
        <span class="galeri-bawah"></span>
        <div>
            <h5 class="fs-5 fw-bold">{{ $galeri->title }}</h5>
            <h5 class="fs-6 fw-semibold" style="color: var(--tertinary-color);">{{ $galeri->deskripsi }}</h5>
            <a href="{{ route('layanan_haji') }}">
                <button style="background-color: var(--primary-color); color: white; border-radius: 5px;">
                    Daftar Sekarang!!
                </button>
            </a>
        </div>
    </div>
    <div class="container mt-5 text-center">
        <h6 class="fw-bold text-uppercase" style="color: #f7c53a; letter-spacing: 2px; line-height: 1.0;">
            Berita Terbaru
        </h6>
        <h2 class="fw-bold mb-4" style="color: #404040; line-height: 1.0;">
            Berita Artikel Terbaru
        </h2>
    </div>

    <div class="container mt-5">
        <div class="row">

            <!-- Artikel 1 -->
            @foreach ($artikels as $artikel)
                <div class="col-md-4 mb-4">
                    <div class="card artikel-card shadow-sm h-100 text-start">
                        <img src="{{ asset('storage/' . $artikel->gambar) }}" class="artikel-img"
                            alt="{{ $artikel->judul }}">
                        <div class="card-body">
                            <h5 class="card-title artikel-title">
                                {{ $artikel->judul }} </h5>
                            <p class="card-text artikel-text">
                                {{ \Illuminate\Support\Str::limit($artikel->isi, 200, '...') }} </p>
                            <a href="{{ route('detail_artikel', $artikel->id) }}" class="artikel-btn">Baca
                                Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Tombol Semua Artikel -->
    <div class="text-center mt-4">
        <a href="{{ route('artikel') }}" class="semuaartikel-btn">Semua Artikel</a>
    </div>

    <div class="mt-5 paket-haji">
        <div class="container text-center" style="margin-top: 5%;">
            <h5 class="fs-3 fw-bold text-center">Paket Haji Langsung Berangkat 2025</h5>
            <span class="garis-bawah-paket"></span>
            <div class="row mt-5 justify-content-center align-items-center">
                @foreach ($paketHaji as $paket)
                    <div class="col-md-4 mb-4">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('storage/' . $paket->gambar) }}" class="card-img-paket" alt="...">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $paket->nama }}</h5>
                                {{-- Periode --}}
                                <div class="row align-items-center">
                                    <div class="col-3 d-flex align-items-end justify-content-end"
                                        style="margin-top: -40px">
                                        <img src="{{ asset('images/v160_3.png') }}" alt="" width="30px">
                                    </div>
                                    <div class="col-9 text-start ps-0">
                                        <h5 class="fs-6 mb-2">Tanggal Keberangkatan</h5>
                                        @foreach ($paket->detail_Paket as $detail)
                                            <h6 class="fw-light" style="color: var(--tertinary-color);">
                                                {{ $detail->tanggal_keberangkatan }}
                                            </h6>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row align-items-center mt-3">
                                    <div class="col-3 d-flex align-items-end justify-content-end"
                                        style="margin-top : -40px">
                                        <img src="{{ asset('images/v160_3.png') }}" alt="" width="30px">
                                    </div>
                                    <div class="col-9 text-start ps-0">
                                        <h5 class="fs-6 mb-2">Program Hari</h5>
                                        <h6 class="fw-light" style="color: var(--tertinary-color);">
                                            {{ $paket->program_hari }} hari
                                        </h6>
                                    </div>
                                </div>

                                {{-- Hotel --}}
                                <div class="row align-items-center mt-3">
                                    <div class="col-3 d-flex align-items-end justify-content-end"
                                        style="margin-top: -60px;">
                                        <img src="{{ asset('images/v160_8.png') }}" alt="" width="30px">
                                    </div>
                                    <div class="col-9 text-start ps-0">
                                        <h5 class="fs-6 mb-2">Hotel</h5>
                                        <h6 class="fw-light" style="color: var(--tertinary-color);">
                                            Mekkah: {{ $paket->hotel_mekkah ?? '-' }}
                                        </h6>
                                        <h6 class="fw-light" style="color: var(--tertinary-color);">
                                            Madinah: {{ $paket->hotel_madinah ?? '-' }}
                                        </h6>
                                    </div>
                                </div>

                                {{-- Maskapai --}}
                                <div class="row align-items-center mt-3">
                                    <div class="col-3 d-flex align-items-end justify-content-end"
                                        style="margin-top: -75px;">
                                        <img src="{{ asset('images/v160_85.png') }}" alt="" width="30px">
                                    </div>
                                    <div class="col-9 text-start ps-0 mb-5">
                                        <h5 class="fs-6 mb-2">Maskapai</h5>
                                        <h6 class="fw-light" style="color: var(--tertinary-color);">
                                            {{ $paket->maskapai ?? '-' }}
                                        </h6>
                                    </div>
                                </div>
                                {{-- Bandara --}}
                                <div class="row align-items-center" style="margin-top: -30px">
                                    <div class="col-3 d-flex align-items-end justify-content-end"
                                        style="margin-top: -70px;">
                                        <img src="{{ asset('images/v160_85.png') }}" alt="" width="30px">
                                    </div>
                                    <div class="col-9 text-start ps-0 mb-5">
                                        <h5 class="fs-6 mb-2">Bandara</h5>
                                        <h6 class="fw-light" style="color: var(--tertinary-color);">
                                            {{ $paket->bandara ?? '-' }}
                                        </h6>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center align-items-center flex-column">
                                    <img src="{{ asset('images/v160_64.png') }}" alt=""
                                        style="margin-left: 30%; margin-bottom: 10%;" width="200px">
                                    <h5 class="fs-2 fw-bold" style="color: var(--secondary-color);">$
                                        {{ number_format($paket->harga, 0, ',', '.') }}</h5>
                                    <a href="{{ route('layanan_haji.detail', $paket->id) }}" class="btn">Detail
                                        Paket</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="bg-secondary d-flex justify-content-evenly" style="margin-top: 9%;">
        <div class="container">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-6 mt-5" style="color: var(--for-color);">
                    <h1 style="color: rgb(181, 0, 0); font-weight: bold;">{{ $hotDeals->first()->title }}</h1>
                    <h5 style="line-height: 30px;">
                        {!! $hotDeals->first()->deskripsi ?? '' !!}
                    </h5>
                    <h4 style="color: var(--secondary-color); line-height: 35px; margin-top: 20px;">
                        {{ $hotDeals->first()->subtitle ?? 'Subjudul tidak tersedia' }}
                    </h4>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <img src="{{ asset($hotDeals->first()->image_url ?? 'storage/default.png') }}" class="img-fluid"
                        alt="Hot Deal Image">
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 6%;">
        <h5 class="fw-bold fs-2">Hal yang sering ditanyakan</h5>
        <div class="garis-bawah-qanda"></div>
        @foreach ($questions->chunk(2) as $row)
            <div class="row">
                @foreach ($row as $q)
                    <div class="col-6">
                        <div class="card" style="width: 100%; margin-top: 20px;">
                            <div class="card-body">
                                <h5 class="card-title" style="color: var(--primary-color);">{{ $q->title }}</h5>
                                <p class="card-text">{{ $q->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
    <!-- Tombol WhatsApp Mengambang -->
    <a href="https://wa.me/628121869994?text=Halo%2C%20saya%20ingin%20bertanya%20tentang%20layanan%20Anda" target="_blank"
        class="wa-float">
        <img src="{{ asset('images/wa-icon.png') }}" alt="WhatsApp" class="wa-icon">
    </a>
@endsection
