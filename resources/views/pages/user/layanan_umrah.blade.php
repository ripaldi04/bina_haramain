@extends('layouts.user')

@section('title', 'Layanan Umrah')

@section('style')
    @vite(['resources/css/user/layanan_umrah.css'])
@endsection

@section('script')
    @vite(['resources/js/user/layanan.js'])
@endsection


@section('content')
    <!--Container Memasukan jenis-->
    <div class="container mt-4">
        <h3 class="fw-bold" style="margin-top: 70px;">Transaksi Paket Umrah</h3>

        <div class="card p-4 shadow-sm">
            <div class="row g-2">
                <!-- Input Keberangkatan -->
                <div class="col-md-3">
                    <label class="form-label fw-bolder">Maskapai</label>
                    <input id="searchMaskapai" type="text" class="form-control" placeholder="">
                </div>


                <!-- Input Bandara -->
                <div class="col-md-3">
                    <label class="form-label fw-bolder">Bandara</label>
                    <input id="searchBandara" type="text" class="form-control" placeholder="">
                </div>

                <!-- Input Jenis Paket -->
                <div class="col-md-3">
                    <label class="form-label fw-bolder">Hotel Mekkah</label>
                    <input id="searchHotelMekkah" type="text" class="form-control" placeholder="">
                </div>
                <!-- Input Promo -->
                <div class="col-md-2">
                    <label class="form-label fw-bolder">Hotel Madinah</label>
                    <input id="searchHotelMadinah" type="text" class="form-control" placeholder="">
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
            @foreach ($paket_umrah as $paket)
                <div class="col-md-4 paket-card" data-nama="{{ strtolower($paket->nama_paket) }}"
                    data-maskapai="{{ strtolower($paket->maskapai) }}" data-bandara="{{ strtolower($paket->bandara) }}"
                    data-hotelmekkah="{{ strtolower($paket->hotel_mekkah) }}"
                    data-hotelmadinah="{{ strtolower($paket->hotel_madinah) }}">
                    <div class="card shadow-sm">
                        <div class="card-img-top position-relative">
                            <img src="{{ asset('storage/' . $paket->gambar) }}" class="img-fluid rounded-top"
                                alt="{{ $paket->nama_paket }}">
                        </div>
                        <div class="card-body">
                            <h6 class="fw-bold text-center">{{ $paket->nama_paket }}</h6>
                            <hr>
                            <ul class="list-unstyled">
                                {{-- <li><i class="bi bi-calendar-event"></i> {{ $paket->keberangkatan }}</li> --}}
                                <li><i class="bi bi-building"></i> {{ $paket->hotel_mekkah }} (Makkah)</li>
                                <li><i class="bi bi-building"></i> {{ $paket->hotel_madinah }} (Madinah)</li>
                                <li><i class="bi bi-airplane"></i> {{ $paket->maskapai }}</li>
                                <li><i class="bi bi-geo-alt"></i> {{ $paket->bandara }}</li>
                                <li><i class="bi bi-box-seam"></i> Sisa Seat:
                                    {{ $paket->detail_Paket->sum('jumlah_seat') }}
                            </ul>
                            <p class="fw-nomal text-dark">Harga Mulai Dari: <br>
                                <span class="fw-bolder fs-5 text-warning">
                                    @if ($paket && $paket->tipeKamars->isNotEmpty())
                                        ${{ number_format($paket->tipeKamars->last()->harga, 0, ',', '.') }}
                                    @endif
                                </span><br>
                            </p>
                            <a href="{{ route('layanan_haji.detail', $paket->id) }}"
                                class="btn btn-dark w-100 fw-bolder">Detail
                                Paket</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
