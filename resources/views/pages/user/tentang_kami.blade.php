@extends('layouts.user')

@section('title', 'Tentang Kami')

@section('style')
    @vite(['resources/css/user/tentang_kami.css'])
@endsection
@section('script')
    @vite(['resources/js/user/tentang_kami.js'])
@endsection

@section('content')
    <!-- Section Tentang Kami -->
    <div class="background-cover" style="background: url('/images/mekkah.jpg') center/cover no-repeat;">
        <section class="contact-section">
            <div class="container">
                <h1>Tentang Kami</h1>
                <p><span>Travel Haji & Umrah Berizin Resmi</span></p>
            </div>
        </section>
    </div>

    <!-- Section tentang binaharamain -->
    <section class="tentang-kami">
        <div class="container">
            <div class="logo-container">
                <img src="{{ asset('images/Logo Bina Haramain Baru.png') }}" alt="Logo" class="logo">
                <div class="text">
                    <h1>Tentang <span class="highlight">Bina Haramain</span></h1>
                    <p>
                        PT. Bina Haramain resmi terdaftar di Kementerian Hukum & Ham pada Tgl 28 Agustus tahun 2000.<br>
                        PT. Bina adalah perusahaan Travel Sunnah yang bergerak di bidang:
                    </p>
                    <ul>
                        <li>Penyelenggara Perjalanan Ibadah Umrah (PPIU), Berizin No. 183 / 2020 di Kemenag</li>
                        <li>Penyelenggara Ibadah Haji Khusus (PIHK), Berizin No. 693 / 2020 di Kemenag</li>
                        <li>Provider Resmi Visa Haji Furoda & Umrah</li>
                        <li>Jasa Land Arrangement berizin di Saudi (Tim Penyelenggara Umrah & Haji di Saudi)</li>
                        <li>Penjualan Tiket Pesawat Umrah & Haji</li>
                        <li>Paket Umrah, Umrah Plus, Muslim Tour, Paket Haji Furoda dan Paket Haji Khusus</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="visi-misi-container">
        <div class="visi">
            <h2>VISI</h2>
            <p>Menjadi Biro Haji Umrah yang InsyaAllah amanah sesuai Syariat
                dengan Fasilitas serta Pelayanan yang nyaman, berkualitas dan terbaik.</p>
        </div>

        <div class="misi">
            <h2>MISI</h2>
            <ul>
                <li>Memberikan Kepastian Jadwal Keberangkatan</li>
                <li>Berorientasi pada Pelayanan untuk kepuasan Jamaah</li>
                <li>Memberikan Fasilitas yang terbaik demi kenyamanan Jamaah</li>
                <li>Menyiapkan Pembimbing sesuai sunnah yang amanah, berkompeten, dan berpengalaman</li>
                <li>Mengembangkan SDM dan tata kelola Manajemen yang Profesional</li>
                <li>Menyediakan Pemandu (Mutawwif) di tanah suci yang keilmuannya InsyaAllah sesuai dengan Al-Qur’an dan
                    As-Sunnah</li>
            </ul>
        </div>
    </div>
@endsection
