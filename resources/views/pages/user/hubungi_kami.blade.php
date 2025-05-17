@extends('layouts.user')

@section('title', 'Hubungi Kami')

@section('style')
    @vite(['resources/css/user/hubungi_kami.css'])
@endsection

@section('content')
    <!-- Section Hubungi Kami -->
    <div class="background-cover" style="background-image: url('{{ asset('images/v218_85.png') }}'); height: 500px">
        >
        <section class="contact-section">
            <div class="container">
                <h1>Hubungi Kami</h1>
                <p><span>Reservasi | Konsultasi | Layanan</span></p>
                <p>Hubungi PT. Bina Haramain sekarang untuk informasi, reservasi, atau kebutuhan <br> khusus Anda. Kami siap
                    melayani dengan profesionalisme dan dedikasi terbaik</p>
            </div>
        </section>
    </div>
    <!-- Informasi Kontak -->
    <section class="info-section">
        <div class="container">
            <div class="row">
                <!-- Alamat -->
                <div class="col-md-4">
                    <div class="info-box">
                        <i class="bi bi-geo-alt-fill"></i>
                        <div>
                            <h5 class="fw-bold">PT. Bina Haramain</h5>
                            <div style="color: #909090;">
                                <p>Maktab Square. Jl. K S <br>Tubun No. 19 RT 03/RW 02, <br>
                                    Cibuluh Kec. Bogor Utara, <br>Kota Bogor, Jawa Barat. 16151</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- WhatsApp -->
                <div class="col-md-4">
                    <div class="info-box">
                        <i class="bi bi-telephone-fill"></i>
                        <div>
                            <h5 class="fw-bold">Telp & Whatsapp (Kantor Pusat)</h5>
                            <div style="color: #909090;">
                                <p><a href ="tel:0817141529">0817-141-529</a> Customer Service</p>
                                <p><a href="tel:082110474600">0821-1047-4600</a> Customer Service</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Email -->
                <div class="col-md-4">
                    <div class="info-box">
                        <i class="bi bi-envelope-fill"></i>
                        <div>
                            <h5 class="fw-bold">Email</h5>
                            <p><a href="mailto:binaharamain@gmail.com">binaharamain@gmail.com</a></p>
                            <p><a href="mailto:binaharamain@gmail.com">binaharamain@hotmail.com</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-box">
                        <i class="bi bi-clock-fill"></i>
                        <div>
                            <h5 class="fw-bold">Jam Operasional</h5>
                            <div style="color: #909090; text-align: justify;">
                                <p><a>Senin 08.30 - 17.30 WIB</a></p>
                                <p><a>Selasa 08.30 - 17.30 WIB</a></p>
                                <p><a>Rabu 08.30 - 17.30 WIB</a></p>
                                <p><a>Kamis 08.30 - 17.30 WIB</a></p>
                                <p><a>Jum'at 08.30 - 17.30 WIB</a></p>
                                <p><a>Sabtu 08.30 - 17.30 WIB</a></p>
                                <p><a>Minggu 08.30 - 17.30 WIB</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="custom-line"> </div>

    <section class="contact-container">
        <div class="contact-form">
            <form action="{{ route('kontak.kirim') }}" method="POST">
                @csrf
                <h2>Hubungi Kami</h2>

                <label for="name">Nama</label>
                <input type="text" id="name" name="name" placeholder="Masukkan Nama">

                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan Email">

                <label for="phone">Nomor Handphone</label>
                <div class="phone-input">
                    <span class="country-code">+62</span>
                    <input type="text" id="phone" name="phone" placeholder="Masukkan Nomor Handphone">
                </div>

                <label for="subject">Subjek Pertanyaan</label>
                <input type="text" id="subject" name="subject" placeholder="Masukkan Pertanyaan">

                <label for="message">Pesan</label>
                <textarea id="message" name="message" placeholder="Masukkan Pesan"></textarea>

                <button type="submit" class="btn btn-auth mt-3" style="width: 150px;">Kirim</button>
        </div>

        <div class="contact-image">
            <img src="{{ asset('images/masjid nabawi.jpg') }}" height="665px">
        </div>
        </form>
    </section>
@endsection
