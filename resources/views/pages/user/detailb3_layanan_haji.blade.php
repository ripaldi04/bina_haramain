@extends('layouts.user')

@section('title', 'Haji Bintang 3')

@section('style')
    @vite(['resources/css/detailb3_layanan_haji.css'])
@endsection

@section('content')
    <!-- Container -->
    <div class="container mt-5  ">
        <h2 class="fw-bold" style="font-size: 40px; margin-top: 100px;">Haji Furoda 2025</h2>
        <div class="row mt-5 bg-white p-4 rounded">
            <div class="col-md-8">

                <!-- Header dengan Gambar -->
                <div class="container header-container mt-4">
                    <img src="{{ asset('images/DetailB3.png') }}" class="header-image" alt="Haji Furoda">
                </div>
            </div>

            <!-- Kolom Pesan Paket -->
            <div class="col-lg-4 d-flex align-items-start">
                <div class="pesan-paket">
                    <h5 class="header-title">Pesan Paket</h5>

                    <label>Program Hari</label>
                    <select class="form-select">
                        <option>Program 26 Hari</option>
                    </select>

                    <label>Bandara Keberangkatan</label>
                    <select class="form-select">
                        <option>Soekarno-Hatta</option>
                    </select>

                    <label>Tanggal Keberangkatan</label>
                    <input type="date" class="form-control">

                    <label>Kamar</label>

                    <!--Quad Room-->
                    <div class="room-box">
                        <div class="room-header">
                            <strong>Quad</strong> <span class="room-type">(1 Kamar Ber-4)</span>
                        </div>
                        <div class="room-price">
                            Harga : <span class="price">$ 20,000</span>/pax
                        </div>
                        <div class="room-input d-flex">
                            <label for="number-input" class="form-label">Jumlah</label>
                            <input type="number" class="form-control custom-input" id="number-input" min="0"
                                max="100">
                            <div class="tombol">Pax</div>
                        </div>
                    </div>

                    <!-- Double  Room -->
                    <div class="room-box">
                        <div class="room-header">
                            <strong>Double</strong> <span class="room-type">(1 Kamar Ber-2)</span>
                        </div>
                        <div class="room-price">
                            Harga : <span class="price">$ 27,500</span>/pax
                        </div>
                        <div class="room-input d-flex">
                            <label for="number-input" class="form-label">Jumlah</label>
                            <input type="number" class="form-control custom-input" id="number-input" min="0"
                                max="100">
                            <div class="tombol">Pax</div>
                        </div>
                    </div>

                    <!--Triple Room-->
                    <div class="room-box">
                        <div class="room-header">
                            <strong>Triple</strong> <span class="room-type">(1 Kamar Ber-3)</span>
                        </div>
                        <div class="room-price">
                            Harga : <span class="price">$ 27,500</span>/pax
                        </div>
                        <div class="room-input d-flex">
                            <label for="number-input" class="form-label">Jumlah</label>
                            <input type="number" class="form-control custom-input" id="number-input" min="0"
                                max="100">
                            <div class="tombol">Pax</div>
                        </div>
                    </div>

                    <div class="total-harga">
                        <p>Total: <span>USD 0,00</span></p>
                    </div>

                    <button class="btn-pesan"><i class="bi bi-cart-fill"></i> Pesan Paket</button>
                    <button class="btn-download">Konsultasi Paket</button>
                    <button class="btn-download">Download Brosur</button>
                </div>
            </div>

            <!-- Informasi Paket -->
            <div class="container info-box">
                <div class="row">
                    <div class="col-md-6">
                        <h5><strong>Hotel Makkah</strong></h5>
                        <p><i class="bi bi-geo-alt-fill custom-icon fs-4"></i> <span class="warna-text">Nada
                                Deafah/Setaraf</span></p>
                        <p class="star-rating fs-4">★★★</p>
                        <h5 class="mt-3 fw-bold 15px">Jenis Paket</h5>
                        <p><i class="fa-solid fa-kaaba custom-icon fs-4"></i><span class="warna-text">Haji Furoda
                                2025</span></p>
                        <h5><strong>Hotel Lain</strong></h5>
                        <p><i class="bi bi-building-fill custom-icon fs-4"></i> <span class="warna-text">Maktab
                                Arafah</span> (Makkah)</p>
                        <p><i class="bi bi-building-fill custom-icon fs-4"></i> <span class="warna-text">Hotel
                                Transit</span> (Makkah)</p>
                    </div>
                    <div class="col-md-6">
                        <h5><strong>Hotel Madinah</strong></h5>
                        <p><i class="bi bi-geo-alt-fill custom-icon fs-4"></i> <span class="warna-text">Almukthara
                                Gorbi/Setaraf</span></p>
                        <p class="star-rating fs-4">★★★</p>

                        <h5 class="mt-3 fw-bold 15px">Maskapai</h5>
                        <p><i class="bi bi-airplane-fill custom-icon fs-4"></i><span class="warna-text">Airlines /
                                Garuda Indonesia</span> </p>
                    </div>
                </div>
            </div>

            <!--list isi-->
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Itenary
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Isi dari Itenary.</div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Fasilitas
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body fw-bold">Biaya Sudah Termasuk (Include)</div>
                        <ul class="list-fasilitas">
                            <li><i class="bi bi-check-circle-fill green-icon"></i> Hotel Makkah (Deafah/Setaraf)</li>
                            <li><i class="bi bi-check-circle-fill green-icon"></i> Hotel Madinah (Almukhtara
                                Garbi/Setaraf)</li>
                            <li><i class="bi bi-check-circle-fill green-icon"></i> Hotel Aziziyah Al Hidayah Tower (Fly
                                Nas)</li>
                            <li><i class="bi bi-check-circle-fill green-icon"></i> Pesawat International PP Start
                                Jakarta</li>
                            <li><i class="bi bi-check-circle-fill green-icon"></i> Maktab Arafah</li>
                            <li><i class="bi bi-check-circle-fill green-icon"></i> Bus ber-AC selama di Saudi</li>
                            <li><i class="bi bi-check-circle-fill green-icon"></i> Handling Bnadara di Indonesia &
                                Saudi</li>
                            <li><i class="bi bi-check-circle-fill green-icon"></i> Bimbingan Secara Intensif</li>
                            <li><i class="bi bi-check-circle-fill green-icon"></i> Makan Pagi, Siang, & Malam</li>
                            <li><i class="bi bi-check-circle-fill green-icon"></i> Sertifikat Haji</li>
                            <li><i class="bi bi-check-circle-fill green-icon"></i> Perlengkapan Haji</li>
                        </ul>
                        <div class="accordion-body fw-bold">Biaya Tidak Termasuk (Exclude):<br></div>
                        <ul class="list-fasilitas">
                            <li><i class="bi bi-x-square-fill red-icon"></i> DAM Tammatu</li>
                            <li><i class="bi bi-x-square-fill red-icon"></i> Kelebihan Bagasi</li>
                            <li><i class="bi bi-x-square-fill red-icon"></i> Pasport</li>
                            <li><i class="bi bi-x-square-fill red-icon"></i> Transport PP Rumah - Jakarta</li>
                            <li><i class="bi bi-x-square-fill red-icon"></i> City Tour di Luar Program</li>
                            <li><i class="bi bi-x-square-fill red-icon"></i> Pengualaran Pribadi (Internet, Telepon,
                                Laundry, dll)</li>
                            <li><i class="bi bi-x-square-fill red-icon"></i> Kereta Eksklusif Saat Armuzna</li>
                        </ul>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseThree" aria-expanded="false"
                            aria-controls="flush-collapseThree">
                            Persyaratan Peserta
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Isi dari Persyaratan Peserta.</div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseFour" aria-expanded="false"
                            aria-controls="flush-collapseFour">
                            Syarat & Ketentuan
                        </button>
                    </h2>
                    <div id="flush-collapseFour" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Isi dari Syarat & Ketentuan.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
