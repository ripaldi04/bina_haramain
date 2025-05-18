@extends('layouts.user')

@section('title', 'Artikel')

@section('style')
    @vite(['resources/css/user/artikel.css'])
@endsection

{{-- @section('script')
    @vite(['resources/js/user/detail_layanan.js'])
@endsection --}}

@section('content')
    <!--Container Memasukan jenis-->
    <div class="container mt-4">
        <h3 class="fw-bold" style="margin-top: 70px;">Artikel BinaHaramain</h3>


        <!-- Konten Artikel (Placeholder) -->
        <div class="row">
            <!-- Isi artikel di sini -->
        </div>
    </div>
    </div>

    <div class="container mt-5">
        <div class="row g-4">
            <!-- Kartu Paket 1 -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-img-top position-relative">
                        <img src="asset/artikelPict.png" class="img-fluid rounded-top" alt="Haji Furada">
                    </div>
                    <div class="card-body">
                        <h6 class="fw-bold text-center">Alasan Orang Arab Senang Naik Unta</h6>
                        <hr>
                        <p class="blog-meta">
                            Dipublikasi pada : 04 Februari 2025, 22:10:39
                        </p>
                        <p class="blog-spill">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                            Illo veniam laborum quis neque ab, alias nisi blanditiis itaque facilis aspernatur!
                        </p>
                        <a href="{{ route('detail_artikel') }}" class="btn btn-dark w-100 fw-bolder">Detail Artikel</a>
                    </div>
                </div>
            </div>

            <!-- Kartu Paket 2 -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-img-top position-relative">
                        <img src="asset/artikelPict.png" class="img-fluid rounded-top" alt="Haji Furada">
                    </div>
                    <div class="card-body">
                        <h6 class="fw-bold text-center">Alasan Orang Arab Senang Naik Unta</h6>
                        <hr>
                        <p class="blog-meta">
                            Dipublikasi pada : 04 Februari 2025, 22:10:39
                        </p>
                        <p class="blog-spill">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                            Illo veniam laborum quis neque ab, alias nisi blanditiis itaque facilis aspernatur!
                        </p>
                        <button class="btn btn-dark w-100 fw-bolder">Detail Artikel</button>
                    </div>
                </div>
            </div>

            <!-- Kartu Paket 3 -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-img-top position-relative">
                        <img src="asset/artikelPict.png" class="img-fluid rounded-top" alt="Haji Furada">
                    </div>
                    <div class="card-body">
                        <h6 class="fw-bold text-center">Alasan Orang Arab Senang Naik Unta</h6>
                        <hr>
                        <p class="blog-meta">
                            Dipublikasi pada : 04 Februari 2025, 22:10:39
                        </p>
                        <p class="blog-spill">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                            Illo veniam laborum quis neque ab, alias nisi blanditiis itaque facilis aspernatur!
                        </p>
                        <button class="btn btn-dark w-100 fw-bolder">Detail Artikel</button>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-img-top position-relative">
                        <img src="asset/artikelPict.png" class="img-fluid rounded-top" alt="Haji Furada">
                    </div>
                    <div class="card-body">
                        <h6 class="fw-bold text-center">Alasan Orang Arab Senang Naik Unta</h6>
                        <hr>
                        <p class="blog-meta">
                            Dipublikasi pada : 04 Februari 2025, 22:10:39
                        </p>
                        <p class="blog-spill">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                            Illo veniam laborum quis neque ab, alias nisi blanditiis itaque facilis aspernatur!
                        </p>
                        <button class="btn btn-dark w-100 fw-bolder">Detail Artikel</button>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-img-top position-relative">
                        <img src="asset/artikelPict.png" class="img-fluid rounded-top" alt="Haji Furada">
                    </div>
                    <div class="card-body">
                        <h6 class="fw-bold text-center">Alasan Orang Arab Senang Naik Unta</h6>
                        <hr>
                        <p class="blog-meta">
                            Dipublikasi pada : 04 Februari 2025, 22:10:39
                        </p>
                        <p class="blog-spill">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                            Illo veniam laborum quis neque ab, alias nisi blanditiis itaque facilis aspernatur!
                        </p>
                        <button class="btn btn-dark w-100 fw-bolder">Detail Artikel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
