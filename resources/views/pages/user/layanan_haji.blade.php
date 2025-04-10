@extends('layouts.user')

@section('title', 'Layanan Haji')

@section('style')
    @vite(['resources/css/user/layanan_haji.css'])
@endsection

@section('content')
    <!--Container Memasukan jenis-->
    <div class="container mt-4">
        <h3 class="fw-bold" style="margin-top: 70px;">Transaksi Paket Haji</h3>

        <div class="card p-4 shadow-sm">
            <div class="row g-2">
                <!-- Input Keberangkatan -->
                <div class="col-md-3">
                    <label class="form-label fw-bolder">Keberangkatan</label>
                    <input type="text" class="form-control" placeholder="">
                </div>

                <!-- Input Jenis Paket -->
                <div class="col-md-3">
                    <label class="form-label fw-bolder">Jenis Paket</label>
                    <input type="text" class="form-control" placeholder="">
                </div>

                <!-- Input Bandara -->
                <div class="col-md-3">
                    <label class="form-label fw-bolder">Bandara</label>
                    <input type="text" class="form-control" placeholder="">
                </div>

                <!-- Input Promo -->
                <div class="col-md-2">
                    <label class="form-label fw-bolder">Promo</label>
                    <input type="text" class="form-control" placeholder="">
                </div>

                <!-- Tombol Search -->
                <div class="col-md-1 d-flex align-items-end">
                    <button class="btn btn-primary search-btn">
                        <i class="bi bi-search fs-6 text-white"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row g-4">
            <!-- Kartu Paket 1 -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-img-top position-relative">
                        <img src="{{ asset('images/FurodaB3.jpg') }}" class="img-fluid rounded-top" alt="Haji Furada">
                        <!-- <div class="overlay-text">
                                                            <h5 class="fw-bold text-white">Haji Furada</h5>
                                                            <p class="fw-bold text-white">$27.000</p>
                                                            <div class="stars">⭐⭐⭐⭐⭐</div>
                                                        </div> -->
                    </div>
                    <div class="card-body">
                        <h6 class="fw-bold text-center">Haji Furada Paket Bintang Tiga</h6>
                        <hr>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-calendar-event"></i> 22 Mei 2025</li>
                            <li><i class="bi bi-building"></i> Swissotel Al Maqam Makkah (Makkah)</li>
                            <li><i class="bi bi-building"></i> Dar Al Eiman Al Haram Hotel (Madinah)</li>
                            <li><i class="bi bi-airplane"></i> Saudi Arabian Airlines</li>
                            <li><i class="bi bi-geo-alt"></i> Soekarno-Hatta International Airport (CGK)</li>
                        </ul>
                        <p class="fw-nomal text-dark ">Harga Mulai Dari: <br><span
                                class="fw-bolder fs-5 text-warning">$20.000</span><br></p>
                        <a href="{{ route('detailb3_layanan_haji') }}" class="btn btn-dark w-100 fw-bolder">Detail Paket</a>
                    </div>
                </div>
            </div>

            <!-- Kartu Paket 2 -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-img-top position-relative">
                        <img src="{{ asset('images/FurodaB5.jpg') }}" class="img-fluid rounded-top" alt="Haji Furada">
                        <!-- <div class="overlay-text">
                                                            <h5 class="fw-bold text-white">Haji Furada</h5>
                                                            <p class="fw-bold text-white">$20.000</p>
                                                            <div class="stars">⭐⭐⭐</div>
                                                        </div> -->
                    </div>
                    <div class="card-body">
                        <h6 class="fw-bold text-center">Haji Furada Paket Bintang Lima</h6>
                        <hr>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-calendar-event"></i> 22 Mei 2025</li>
                            <li><i class="bi bi-building"></i> Swissotel Al Maqam Makkah (Makkah)</li>
                            <li><i class="bi bi-building"></i> Dar Al Eiman Al Haram Hotel (Madinah)</li>
                            <li><i class="bi bi-airplane"></i> Saudi Arabian Airlines</li>
                            <li><i class="bi bi-geo-alt"></i> Soekarno-Hatta International Airport (CGK)</li>
                        </ul>
                        <p class="fw-nomal text-dark ">Harga Mulai Dari: <br><span
                                class="fw-bolder fs-5 text-warning">$27.500</span><br></p>
                        <a href="{{ route('detailb5_layanan_haji') }}" class="btn btn-dark w-100 fw-bolder">Detail Paket</a>
                    </div>
                </div>
            </div>

            <!-- Kartu Paket 3 -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-img-top position-relative">
                        <img src="{{ asset('images/OnhPLUS.jpg') }}" class="img-fluid rounded-top" alt="Haji Onh Plus">
                        <!-- <div class="overlay-text">
                                                            <h5 class="fw-bold text-white">Onh Plus</h5>
                                                            <p class="fw-bold text-white">$13.000</p>
                                                            <div class="stars">⭐⭐⭐⭐⭐</div>
                                                        </div> -->
                    </div>
                    <div class="card-body">
                        <h6 class="fw-bold text-center">Haji Onh Plus</h6>
                        <hr>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-calendar-event"></i> 22 Mei 2025</li>
                            <li><i class="bi bi-building"></i> Swissotel Al Maqam Makkah (Makkah)</li>
                            <li><i class="bi bi-building"></i> Dar Al Eiman Al Haram Hotel (Madinah)</li>
                            <li><i class="bi bi-airplane"></i> Saudi Arabian Airlines</li>
                            <li><i class="bi bi-geo-alt"></i> Soekarno-Hatta International Airport (CGK)</li>
                        </ul>
                        <p class="fw-nomal text-dark ">Harga Mulai Dari: <br><span
                                class="fw-bolder fs-5 text-warning">$11.000</span><br></p>
                        <button class="btn btn-dark w-100 fw-bolder">Detail Paket</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
