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
                    <p class="fs-4 fw-bold text-warning">{!! $banner->header2 !!}</p>
                    <p class="fs-6">{{ $banner->deskripsi }}</p>
                    <button class="btn btn-warning text-white mt-2" style="width: 150px; border-radius: 4px;">
                        Lihat Paket
                    </button>
                </div>

                <!-- Gambar (Desktop) -->
                <div class="col-md-6 text-end d-none d-md-block">
                    <img src="{{ asset($banner->image_url) }}" class="img-fluid" alt="Icon">
                </div>

                <!-- Semua elemen dalam satu kolom (Mobile) -->
                <div class="col-12 text-center d-md-none">
                    <h1 class="fs-3">Haji Langsung Berangkat</h1>
                    <p class="fs-4 fw-bold text-warning">
                        Tanpa Antri <br> Visa Haji Resmi <br> Maktab VIP <br> Sepenuh Hati
                    </p>
                    <img src="./images/v146_30.png" class="img-fluid w-75 my-3" alt="Icon">
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
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card position-relative">
                        <div class="card-body">
                            <h5 class="card-title fs-4">Cari paket Haji dan Umrah Terbaik</h5>

                            <!-- Row untuk input -->
                            <div class="row mt-4 p-1" style="padding-right: 50px;">
                                <div class="col-3">
                                    <div>
                                        <p class="card-text text-search text-nowrap">Keberangkatan</p>
                                        <input type="search" class="form-control"
                                            style="border-radius: 5px; border-color: #909090;">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div>
                                        <p class="card-text text-search text-nowrap">Jenis Paket</p>
                                        <input type="search" class="form-control"
                                            style="border-radius: 5px; border-color: #909090;">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div>
                                        <p class="card-text text-search text-nowrap">Maskapai</p>
                                        <input type="search" class="form-control"
                                            style="border-radius: 5px; border-color: #909090;">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div>
                                        <p class="card-text text-search text-nowrap">Bandara Keberangkatan</p>
                                        <input type="search" class="form-control"
                                            style="border-radius: 5px; border-color: #909090;">
                                    </div>
                                </div>
                            </div>

                            <!-- Ikon pencarian di luar row input -->
                            <div class="position-absolute" style="right: 15px; bottom: 20px;">
                                <button class="btn d-flex justify-content-center align-items-center"
                                    style="background-color: var(--primary-color); height: 38px; width: 60px; border-radius: 5px; border: 2px solid #909090;">
                                    <i class="bi bi-search fs-6 text-white"></i>
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row p-3 d-flex justify-content-center align-items-center g-5 sudah-siap">
            <div class="col-md-7 col-12">
                <div style="margin-left: 15%; margin-bottom: 10%;">
                    <h4 class="fs-6 mb-3 mt-5 header-sudah-siap" style="color: var(--primary-color);">Sudah Siap
                        Menjadi Tamu Allah dengan Haji Eksklusif?
                    </h4>
                    <div style="display: flex; flex-direction: column; gap: 10px;">
                        <div class="icon-text">
                            <img src="./images/v121_56.png" width="20px" alt="">
                            <p>Ingin Berhaji Tanpa Menunggu Puluhan Tahun?</p>
                        </div>
                        <div class="icon-text">
                            <img src="./images/v121_56.png" width="20px" alt="">
                            <p>Ingin berhaji dengan kepastian keberangkatan?</p>
                        </div>
                        <div class="icon-text">
                            <img src="./images/v121_56.png" width="20px" alt="">
                            <p>Ingin merasakan kenyamanan fasilitas eksklusif & layanan premium?</p>
                        </div>
                        <div class="icon-text">
                            <img src="./images/v121_56.png" width="20px" alt="">
                            <p>Ingin ibadah lebih khusyuk dengan bimbingan maksimal?</p>
                        </div>
                        <div class="icon-text">
                            <img src="./images/v121_56.png" width="20px" alt="">
                            <p>Ingin berangkat di 2025 dengan Visa Haji Resmi?</p>
                        </div>
                    </div>
                    <p class="mt-5 lh-lg">Kini, Anda bisa berhaji tanpa antre panjang! Dengan Haji Khusus, berangkat
                        lebih cepat, harga lebih terjangkau, fasilitas tetap mewah! Saatnya wujudkan impian haji Anda
                        dengan perjalanan yang nyaman, aman, dan penuh keberkahan!</p>
                </div>
            </div>
            <div class="col-md-5 col-12">
                <img src="./images/v121_93.png" alt="ini gambar" width="352px" height="406"
                    style="border-radius: 30px;">
            </div>
            <div class="row p-3 d-flex justify-content-center align-items-start g-5"
                style="background-color: white; width: 90%;">
                <div class="col-md-6 col-12 mbl-img-none">
                    <img src="./images/v121_100.png" width="450px" height="450px" style="border-radius: 30px"
                        alt="">
                </div>
                <div class="col-md-6 col-12">
                    <h5 class="card-title fs-2" style="color: var(--primary-color);">Mengapa Harus Pilih PT. Bina
                        Haramain ?</h5>
                    <p class="mt-5 lh-lg">PT. Bina Haramain adalah perusahaan travel profesional dengan pengalaman 3
                        tahun dalam penyelenggaraan perjalanan haji. Kami berkomitmen memberikan layanan terbaik dengan
                        pemahaman mendalam tentang proses, regulasi, dan kebutuhan ibadah
                        haji, sehingga perjalanan Anda menjadi lebih nyaman, aman, dan tanpa kendala. Dengan tim
                        berpengalaman dan layanan eksklusif, kami siap mengantarkan Anda menuju Baitullah dengan
                        kemudahan, kepastian, dan kenyamanan terbaik.</p>
                </div>
                <div class="row g-3 align-items-start">
                    <div class="col-6 p-0">
                        <div class="row g-0 align-items-center mb-5 d-flex item-row">
                            <div class="col-2 d-flex justify-content-center">
                                <img src="./images/v121_107.png" class="img-fluid fixed-img">
                            </div>
                            <div class="col-10 h-100 ps-3">
                                <h5>Paket Haji Lebih Murah</h5>
                                <p>Dapatkan harga terbaik dengan fasilitas bintang ⭐⭐⭐⭐⭐ Lebih terjangkau, lebih mewah!
                                </p>
                            </div>
                        </div>
                        <div class="row g-0 align-items-center mb-5 d-flex item-row">
                            <div class="col-2 d-flex justify-content-center">
                                <img src="./images/v121_120.png" class="img-fluid fixed-img">
                            </div>
                            <div class="col-10 h-100 ps-3">
                                <h5>Haji Mudah Sesuai Syariah</h5>
                                <p>Ibadah haji lebih tenang & berkah dengan layanan sesuai Syariah – Tanpa Riba, Tanpa
                                    Akad Bathil, Tanpa Gharar!</p>
                            </div>
                        </div>
                        <div class="row g-0 align-items-center mb-5 d-flex item-row">
                            <div class="col-2 d-flex justify-content-center">
                                <img src="./images/v121_115.png" class="img-fluid fixed-img">
                            </div>
                            <div class="col-10 h-100 ps-3">
                                <h5>GARANSI Tahun 2025 Berangkat Haji</h5>
                                <p>Kami memberikan GARANSI bahwa tahun 2025 Anda bisa berangkat Haji.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 p-0">
                        <div class="row g-0 align-items-center mb-5 d-flex item-row">
                            <div class="col-2 d-flex justify-content-center">
                                <img src="./images/tawaf.png" class="img-fluid fixed-img">
                            </div>
                            <div class="col-10 h-100 ps-3">
                                <h5>Program Eksklusif Haji</h5>
                                <p>Selama 26 Hari Anda akan dibimbing untuk pengalaman haji yang berkesan meraih Mabrur
                                </p>
                            </div>
                        </div>
                        <div class="row g-0 align-items-center mb-5 d-flex item-row">
                            <div class="col-2 d-flex justify-content-center">
                                <img src="./images/v121_112.png" class="img-fluid fixed-img">
                            </div>
                            <div class="col-10 h-100 ps-3">
                                <h5>Jaminan Kepuasan Layanan</h5>
                                <p>Kami berkomitmen memberikan layanan & fasilitas terbaik, memastikan semua kebutuhan
                                    Anda terpenuhi dengan sempurna.</p>
                            </div>
                        </div>
                        <div class="row g-0 align-items-center d-flex item-row">
                            <div class="col-2 d-flex justify-content-center">
                                <img src="./images/v121_115.png" class="img-fluid fixed-img">
                            </div>
                            <div class="col-10 h-100 ps-3">
                                <h5>Garansi 100% UANG KEMBALI</h5>
                                <p>Kami memberikan GARANSI bahwa tahun 2025 Anda bisa berangkat Haji.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5 keunggulan">
        <div class="container">
            <h5 class="fw-bold fs-2 text-center" style="margin-top: 5%;">Keunggulan Travel Kami</h5>
            <div class="row d-flex justify-content-center align-items-center"
                style="color: black; margin-top: 5%; margin-bottom: 5%;">
                <div class="col-4 text-center">
                    <div class="d-flex flex-row justify-content-center align-items-center text-start"
                        style="background-color: white; width: 376; height: 156; border-radius: 5px; height: 100px;">
                        <img src="./images/berizin resmi.png" alt="" height="60px" style="margin-left: 20px;">
                        <h5 class="m-4 text-start">Berizin Resmi dari Kementrian Agama RI</h5>
                    </div>
                </div>
                <div class="col-4 text-center" style="width: 376; height: 156;">
                    <div class="d-flex flex-row justify-content-center align-items-center text-start"
                        style="background-color: white; border-radius: 5px; height: 100px;">
                        <img src="./images/v160_83.png" alt="" height="35px">
                        <h5 class="m-4 text-start">Maskapai Berkualitas
                        </h5>
                    </div>
                </div>
                <div class="col-4 text-center">
                    <div class="d-flex flex-row justify-content-center align-items-center"
                        style="background-color: white; border-radius: 5px; height: 100px;">
                        <img src="./images/v160_201.png" alt="" height="45px" style="margin-left: 20px;">
                        <h5 class="m-4 text-start">Jaminan Kepastian Tiket Pesawat (PP)
                        </h5>
                    </div>
                </div>
            </div>
            <div class="row mt-4 d-flex justify-content-center" style="color: black; margin-bottom: 5%;">
                <div class="col-4 text-center">
                    <div class="d-flex flex-row justify-content-center align-items-center"
                        style="background-color: white; width: 376; height: 156; border-radius: 5px; height: 100px;">
                        <img src="./images/v185_16.png" alt="" height="60px" style="margin-left: 20px;">
                        <h5 class="m-4 text-start">Berpengalaman Melayani Haji
                        </h5>
                    </div>
                </div>
                <div class="col-4 text-center">
                    <div class="d-flex flex-row justify-content-center align-items-center"
                        style="background-color: white; width: 376; height: 156; border-radius: 5px; height: 100px;">
                        <img src="./images/v185_19.png" alt="" height="60px" style="margin-left: 20px;">
                        <h5 class="m-4 text-start">Bimbingan Intensif Manasik Haji</h5>
                    </div>
                </div>
                <div class="col-4 text-center">
                    <div class="d-flex flex-row justify-content-center align-items-center"
                        style="background-color: white; width: 376; height: 156; border-radius: 5px; height: 100px;">
                        <img src="./images/v185_22.png" alt="" height="80px" style="margin-left: 20px;">
                        <h5 class="m-4 text-start">Pembimbing Haji Berpengalaman
                        </h5>
                    </div>
                </div>
            </div>
            <div class="row mt-4 d-flex justify-content-center" style="color: black; margin-bottom: 5%;">
                <div class="col-4 text-center">
                    <div class="d-flex flex-row justify-content-center align-items-center"
                        style="background-color: white; width: 376; height: 156; border-radius: 5px; height: 100px;">
                        <img src="./images/v185_31.png" alt="" height="40px" style="margin-left: 20px;">
                        <h5 class="m-4 text-start">Pelayanan Ramah & Menyeluruh</h5>
                    </div>
                </div>
                <div class="col-4 text-center">
                    <div class="d-flex flex-row justify-content-center align-items-center"
                        style="background-color: white; width: 376; height: 156; border-radius: 5px; height: 100px;">
                        <img src="./images/harga terjangkau.png" alt="" height="60px"
                            style="margin-left: 20px;">
                        <h5 class="m-4 text-start">Harga Sangat Bersahabat/Terjangkau
                        </h5>
                    </div>
                </div>
                <div class="col-4 text-center">
                    <div class="d-flex flex-row justify-content-center align-items-center"
                        style="background-color: white; width: 376; height: 156; border-radius: 5px; height: 100px;">
                        <img src="./images/v185_50.png" alt="" height="50px" style="margin-left: 20px;">
                        <h5 class="m-4 text-start">Layanan Medis Untuk Jamaah
                        </h5>
                    </div>
                </div>
            </div>
            <div class="row mt-4 d-flex justify-content-center" style="color: black; margin-bottom: 5%;">
                <div class="col-4 text-center">
                    <div class="d-flex flex-row justify-content-center align-items-center"
                        style="background-color: white; width: 376; height: 156; border-radius: 5px; height: 100px;">
                        <img src="./images/v185_37.png" alt="" height="60px" style="margin-left: 20px;">
                        <h5 class="m-4 text-start">Fasilitas Berkelas & Memukau
                        </h5>
                    </div>
                </div>
                <div class="col-4 text-center">
                    <div class="d-flex flex-row justify-content-center align-items-center"
                        style="background-color: white; width: 376; height: 156; border-radius: 5px; height: 100px;">
                        <img src="./images/v185_40.png" alt="" height="60px" style="margin-left: 20px;">
                        <h5 class="m-4 text-start">Memberikan Garansi 100% Uang Kembali
                        </h5>
                    </div>
                </div>
                <div class="col-4 text-center">
                    <div class="d-flex flex-row justify-content-center align-items-center"
                        style="background-color: white; width: 376; height: 156; border-radius: 5px; height: 100px;">
                        <img src="./images/v185_53.png" alt="" height="50px" style="margin-left: 20px;">
                        <h5 class="m-4 text-start">Group Support & Team Support
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5" style="margin-bottom: 10%;">
        <div>
            <div class="fs-2 fw-bold d-flex justify-content-center align-items-center"
                style="color: var(--primary-color);">
                Fasilitas Untuk Jamaah</div>
            <div class="garis-bawah-fasilitas"></div>
            <div class="row" style="margin-left: 4%;">
                <div class="col-4">
                    <div class="card" style="width: 18rem; height: 180px;">
                        <div class="card-body text-center">
                            <img src="./images/v121_169.png" alt="" height="80px"
                                style="margin-top: -25%; border-radius: 30%;">
                            <h5 class="card-title" style="margin-top: 20px; color: var(--tertinary-color);">Visa Haji
                                Resmi
                            </h5>
                            <p class="card-text">Pengurusan Visa Haji Resmi untuk kemudahan jamaah melaksanakan haji
                                dengan tenang</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card" style="width: 18rem; height: 180px;">
                        <div class="card-body text-center">
                            <img src="./images/v121_173.png" alt="" height="80px"
                                style="margin-top: -25%; border-radius: 30%;">
                            <h5 class="card-title" style="margin-top: 20px; color: var(--tertinary-color);">Konsumsi
                            </h5>
                            <p class="card-text">Konsumsi yang terjamin berupa makan 3x Sehari dengan Menu Indonesia
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card" style="width: 18rem; height: 180px;">
                        <div class="card-body text-center">
                            <img src="./images/v121_174.png" alt="" height="80px"
                                style="margin-top: -25%; border-radius: 30%;">
                            <h5 class="card-title" style="margin-top: 20px; color: var(--tertinary-color);">
                                Dokumentasi
                            </h5>
                            <p class="card-text">Dokumentasi untuk setiap jamaah secara apik & profesional</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card" style="width: 18rem; margin-top:20%; height: 180px;">
                        <div class="card-body text-center">
                            <img src="./images/v121_170.png" alt="" height="80px"
                                style="margin-top: -25%; border-radius: 30%;">
                            <h5 class="card-title" style="margin-top: 20px; color: var(--tertinary-color);">
                                Perlengkapan
                            </h5>
                            <p class="card-text">Setiap Jamaah akan dibekali perlengkapan baik haji agar nyaman dan
                                khusyur</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card" style="width: 18rem; margin-top:20%;height: 180px;">
                        <div class="card-body text-center">
                            <img src="./images/v121_175.png" alt="" height="80px"
                                style="margin-top: -25%; border-radius: 30%;">
                            <h5 class="card-title" style="margin-top: 20px; color: var(--tertinary-color);">Tl /
                                Muthawif
                            </h5>
                            <p class="card-text">Akan didampingi oleh Tour Leader atau Muthowif berpengalaman</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card" style="width: 18rem; margin-top:20%; height: 180px;">
                        <div class="card-body text-center">
                            <img src="./images/v132_20.png" alt="" height="80px"
                                style="margin-top: -25%; border-radius: 30%;">
                            <h5 class="card-title" style="margin-top: 20px; color: var(--tertinary-color);">Buku Doa &
                                Pegangan
                            </h5>
                            <p class="card-text">Setiap jamaah akan mendapatkan buku doa atau pegangan</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card" style="width: 18rem; margin-top:20%; height: 180px;">
                        <div class="card-body text-center">
                            <img src="./images/v121_171.png" alt="" height="80px"
                                style="margin-top: -25%; border-radius: 30%;">
                            <h5 class="card-title" style="margin-top: 20px; color: var(--tertinary-color);">Hotel
                                Menginap
                            </h5>
                            <p class="card-text">Akomodasi Hotel yang nyaman, terbaik, dan dekat selama pelaksanaan
                                ibadah haji</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card" style="width: 18rem; margin-top:20% ; height: 180px;">
                        <div class="card-body text-center">
                            <img src="./images/v121_177.png" alt="" height="80px"
                                style="margin-top: -25%; border-radius: 30%;">
                            <h5 class="card-title" style="margin-top: 20px; color: var(--tertinary-color);">
                                Transportasi
                            </h5>
                            <p class="card-text">Transportasi yang stand by mendampingi perjalanan jamaah</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card" style="width: 18rem; margin-top:20% ; height: 180px;">
                        <div class="card-body text-center">
                            <img src="./images/v121_172.png" alt="" height="80px"
                                style="margin-top: -25%; border-radius: 30%;">
                            <h5 class="card-title" style="margin-top: 20px; color: var(--tertinary-color);">Tiket
                                pesawat
                            </h5>
                            <p class="card-text">Seluruh Jamaah akan mendapatkan tiket pesawat internasional PP secara
                                pasti dan terjamin</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card" style="width: 18rem; margin-top:20% ; height: 180px;">
                        <div class="card-body text-center">
                            <img src="./images/v121_178.png" alt="" height="80px"
                                style="margin-top: -25%; border-radius: 30%;">
                            <h5 class="card-title" style="margin-top: 20px; color: var(--tertinary-color);">Sertifikat
                                Haji
                            </h5>
                            <p class="card-text">Semua jamaah Haji akan mendapatkan sertifikat cetak Haji</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card" style="width: 18rem; margin-top:20% ; height: 180px;">
                        <div class="card-body text-center">
                            <img src="./images/v121_181.png" alt="" height="80px"
                                style="margin-top: -25%; border-radius: 30%;">
                            <h5 class="card-title" style="margin-top: 20px; color: var(--tertinary-color);">Air Zam
                                Zam
                            </h5>
                            <p class="card-text">Setiap jamaah akan diberikan air Zam-zam sebanyak 5 Liter</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card" style="width: 18rem; margin-top:20% ; height: 180px;">
                        <div class="card-body text-center">
                            <img src="./images/v121_184.png" alt="" height="80px"
                                style="margin-top: -25%; border-radius: 30%;">
                            <h5 class="card-title" style="margin-top: 20px; color: var(--tertinary-color);">City Tour
                            </h5>
                            <p class="card-text">Diagendakan program city tour Makkah dan Madinah untuk seluruh Jamaah
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="text-center mb-5">
            <h2 class="fs-3 fw-bold" style="color: var(--primary-color);">Muthawif</h2>
            <h2 class="fs-2 fw-bold" style="color: black;">Berpengalaman dan Profesional</h2>
        </div>
        <div class="row mt-4 justify-content-center">
            <div class="col-md-4 d-flex justify-content-center">
                <div class="card muthawif" style="width: 18rem; border-radius: 30px;">
                    <div class="image-blur"></div>
                    <!-- Elemen gambar dengan efek blur -->
                    <img src="./images/v160_93.png" class="card-img-top" alt="...">
                    <div class="card-body muthawif-body">
                        <h5 class="card-title text-center fs-4" style="color:white;">Ustadz Ripaldi S.Kom M.Kom</h5>
                        <p class="card-text text-center" style="color: var(--secondary-color);">Muthawif Indonesia
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex justify-content-center">
                <div class="card muthawif" style="width: 18rem;  border-radius: 30px;">
                    <div class="image-blur"></div>
                    <!-- Elemen gambar dengan efek blur -->
                    <img src="./images/v160_93.png" class="card-img-top" alt="...">
                    <div class="card-body muthawif-body">
                        <h5 class="card-title text-center fs-4" style="color:white;">Ustadz Ripaldi S.Kom M.Kom</h5>
                        <p class="card-text text-center" style="color: var(--secondary-color);">Muthawif Indonesia
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex justify-content-center">
                <div class="card muthawif" style="width: 18rem;  border-radius: 30px;">
                    <div class="image-blur"></div>
                    <!-- Elemen gambar dengan efek blur -->
                    <img src="./images/v160_93.png" class="card-img-top" alt="...">
                    <div class="card-body muthawif-body">
                        <h5 class="card-title text-center fs-4" style="color:white;">Ustadz Ripaldi S.Kom M.Kom</h5>
                        <p class="card-text text-center" style="color: var(--secondary-color);">Muthawif Indonesia
                        </p>
                    </div>
                </div>
            </div>
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
                    <img src="./images/v145_16.png" class="galeri-img">
                </div>
                <div class="col-lg-3 col-md-6 d-flex flex-column">
                    <img src="./images/v185_79.png" class="galeri-img-small">
                    <img src="./images/v185_87.png" class="galeri-img-small mt-3">
                </div>
                <div class="col-lg-3 col-md-6">
                    <img src="./images/v185_84.png" class="galeri-img">
                </div>
                <div class="col-lg-3 col-md-6">
                    <img src="./images/v185_90.png" class="galeri-img">
                </div>
            </div>

            <div class="row mt-3 g-3">
                <div class="col-lg-4 col-md-6">
                    <img src="./images/v185_96.png" class="galeri-img">
                </div>
                <div class="col-lg-4 col-md-6">
                    <img src="./images/v185_93.png" class="galeri-img">
                </div>
                <div class="col-lg-4 col-md-12">
                    <img src="./images/v145_19.png" class="galeri-img">
                </div>
            </div>
        </div>
        <span class="galeri-bawah"></span>
        <div>
            <h5 class="fs-5 fw-bold">57 Jamaah Haji Langsung Berangkat</h5>
            <h5 class="fs-6 fw-semibold" style="color: var(--tertinary-color);">Musim Haji 2024 M/1445 H, ada 57
                jamaah Haji Khusus Langsung Berangkat, Tanpa Antri</h5>
            <button style="background-color: var(--primary-color); color: white; border-radius: 5px;">Daftar
                Sekarang!!</button>
        </div>
    </div>
    <div class="mt-5 paket-haji">
        <div class="container text-center" style="margin-top: 5%;">
            <h5 class="fs-3 fw-bold text-center">Paket Haji Langsung Berangkat 2025</h5>
            <span class="garis-bawah-paket"></span>
            <div class="row mt-5 justify-content-center align-items-center">
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="./images/v160_58.png" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title">Haji Furodha</h5>
                            <h5 class="card-title mb-4">⭐⭐⭐</h5>
                            <div class="row align-items-center">
                                <div class="col-3 d-flex align-items-end justify-content-end" style="margin-top: -40px;">
                                    <img src="./images/v160_3.png" alt="" width="30px">
                                </div>
                                <div class="col-9 text-start ps-0">
                                    <h5 class="fs-5 mb-0">Periode</h5>
                                    <h6 class="fw-light fs-6" style="color: var(--tertinary-color);">Aug 2023, Okt
                                        2023, Feb 2024, Mart 2024</h6>
                                </div>
                            </div>
                            <div class="row align-items-center mt-2">
                                <div class="col-3 d-flex align-items-end justify-content-end" style="margin-top: -50px;">
                                    <img src="./images/v160_8.png" alt="" width="30px">
                                </div>
                                <div class="col-9 text-start ps-0">
                                    <h5 class="fs-5">Hotel</h5>
                                    <h6 class="fw-light fs-6" style="color: var(--tertinary-color);">Mekkah: Mira
                                        Ajyad / Setaraf</h6>
                                    <h6 class="fw-light fs-6" style="color: var(--tertinary-color);">Madinah: Tulip In
                                        / Setaraf
                                    </h6>
                                </div>
                            </div>
                            <div class="row align-items-center mt-2">
                                <div class="col-3 d-flex align-items-end justify-content-end" style="margin-top: -100px;">
                                    <img src="./images/v160_85.png" alt="" width="30px">
                                </div>
                                <div class="col-9 text-start ps-0 mb-5">
                                    <h5 class="fs-5">Maskapai</h5>
                                    <img src="./images/v160_15.png" width="100px" alt="">
                                    <img src="./images/v160_16.png" width="100px" alt="">
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center flex-column">
                                <img src="./images/v160_64.png" alt=""
                                    style="margin-left: 30%; margin-bottom: 10%;" width="200px">
                                <h5 class="fs-2 fw-bold" style="color: var(--secondary-color);">$20.000</h5>
                                <button class="btn">Detail Paket</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="./images/v160_58.png" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title">Haji Furodha</h5>
                            <h5 class="card-title mb-4">⭐⭐⭐⭐⭐</h5>
                            <div class="row align-items-center">
                                <div class="col-3 d-flex align-items-end justify-content-end" style="margin-top: -40px;">
                                    <img src="./images/v160_3.png" alt="" width="30px">
                                </div>
                                <div class="col-9 text-start ps-0">
                                    <h5 class="fs-5 mb-0">Periode</h5>
                                    <h6 class="fw-light fs-6" style="color: var(--tertinary-color);">Aug 2023, Okt
                                        2023, Feb 2024, Mart 2024</h6>
                                </div>
                            </div>
                            <div class="row align-items-center mt-2">
                                <div class="col-3 d-flex align-items-end justify-content-end" style="margin-top: -50px;">
                                    <img src="./images/v160_8.png" alt="" width="30px">
                                </div>
                                <div class="col-9 text-start ps-0">
                                    <h5 class="fs-5">Hotel</h5>
                                    <h6 class="fw-light fs-6" style="color: var(--tertinary-color);">Mekkah: Mira
                                        Ajyad / Setaraf</h6>
                                    <h6 class="fw-light fs-6" style="color: var(--tertinary-color);">Madinah: Tulip In
                                        / Setaraf
                                    </h6>
                                </div>
                            </div>
                            <div class="row align-items-center mt-2">
                                <div class="col-3 d-flex align-items-end justify-content-end" style="margin-top: -100px;">
                                    <img src="./images/v160_85.png" alt="" width="30px">
                                </div>
                                <div class="col-9 text-start ps-0 mb-5">
                                    <h5 class="fs-5">Maskapai</h5>
                                    <img src="./images/v160_15.png" width="100px" alt="">
                                    <img src="./images/v160_16.png" width="100px" alt="">
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center flex-column">
                                <img src="./images/v160_64.png" alt=""
                                    style="margin-left: 30%; margin-bottom: 10%;" width="200px">
                                <h5 class="fs-2 fw-bold" style="color: var(--secondary-color);">$27.500</h5>
                                <button class="btn">Detail Paket</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="bg-secondary d-flex justify-content-evenly" style="margin-top: 9%;">
        <div class="container">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-6 mt-5" style="color: var(--for-color);">
                    <h1 style="color: rgb(181, 0, 0); font-weight: bold;">HOT DEAL !!!!</h1>
                    <h5 style="line-height: 50px;">
                        Pendaftaran Bulan Februari 2025 ini akan mendapatkan potongan harga $1.000/pack! dan Anda berhak
                        1 Bus serta 1 Hotel Bersama Ustadz Koh Dennis Lim & Teh Yunda
                    </h5>
                    <h3 style="color: var(--secondary-color); line-height: 30px;">
                        SEAT TERBATAS <span style="color: rgb(181, 0, 0); font-weight: bold;">!!!!</span> <br> PASTIKAN
                        ANDA KEBAGIAN <span style="color: rgb(181, 0, 0); font-weight: bold;">!!!</span>
                    </h3>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <img src="./images/v185_130.png" class="img-fluid" alt="">
                </div>
            </div>

        </div>
    </div>
    <div class="container" style="margin-top: 6%;">
        <h5 class="fw-bold fs-2">Hal yang sering ditanyakan</h5>
        <div class="garis-bawah-qanda"></div>
        <div class="row">
            <div class="col-6">
                <div class="card" style="width: 100%; margin-top: 5%;">
                    <div class="card-body">
                        <h5 class="card-title" style="color: var(--primary-color);">Apa itu Bina Haramain?</h5>
                        <p class="card-text">Bina Haramain adalah pusat Informasi dan edukasi haji umrah PT Pradana
                            Grasindo Travel</p>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card" style="width: 100%; margin-top: 5%;">
                    <div class="card-body">
                        <h5 class="card-title" style="color: var(--primary-color);">Apakah calon jamaah haji akan
                            mendapatkan Bimbingan Manasik Haji?</h5>
                        <p class="card-text">Ya. Bina Haramain akan memberikan bimbingan manasik haji secara intensif
                            kepada seluruh calon jamaah haji.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card" style="width: 100%; margin-top: 1%;">
                    <div class="card-body">
                        <h5 class="card-title" style="color: var(--primary-color);">Apakah telah memiliki izin?</h5>
                        <p class="card-text">PT Pradana Grasindo Travel adalah perusahaan dengan legalitas lengkap dan
                            memiliki izin PPIU No. U.541 Tahun 2021, serta Izin PIHK No. 02180102427260001 Tahun 2023.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card" style="width: 100%; margin-top: 5%;">
                    <div class="card-body">
                        <h5 class="card-title" style="color: var(--primary-color);">Jika saya GAGAL berangkat, apakah
                            uang pendaftaran saya akan kembali?</h5>
                        <p class="card-text">Kami menggaransi bahwa Anda akan berangkat (jaminan Keberangkatan Haji
                            2025). Namun jika hal terburuknya adalah Anda GAGAL berangkat sedangkan Anda telah melakukan
                            pembayaran, maka kami Garansi 100% uang Anda kembali.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6" id="tanya-card">
                <div class="card" style="width: 100%; margin-top: -7%;">
                    <div class="card-body">
                        <h5 class="card-title" style="color: var(--primary-color);">Jika saya tertarik daftar Haji
                            Langsung Berangkat 2025, bagaimana prosedurnya?</h5>
                        <p class="card-text">Anda bisa mendaftar dengan meng-klik tombol DAFTAR SEKARANG yang berwarna
                            hijau, setelah itu Anda akan diarahkan ke nomor Whatsapp Official Bina Haramain.</p>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card" style="width: 100%; margin-top: 5%;">
                    <div class="card-body">
                        <h5 class="card-title" style="color: var(--primary-color);">Jika saya melakukan pembayaran
                            dengan cara angsur, Berapa DP yang harus saya bayar dan kapan saya harus melunasinya?
                        </h5>
                        <p class="card-text">Untuk Haji Furoda 2025 Anda harus membayar DP sebesar Rp 100.000.000
                            (seratus juta rupiah) untuk Paket Bintang 3. Untuk Haji Furoda Paket Bintang 5 DP sebesar $
                            11.000. Jika skema cash keras, maka pelunasan selambat-lambatnya 30
                            hari setelah pembayaran DP. Jika Anda akan membayar dengan skema Angsur, Anda diharuskan
                            melunasinya selambat-lambatnya pada bulan Syawal 1446 H. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
