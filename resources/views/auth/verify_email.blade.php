@extends('layouts.user')

@section('title', 'Verifikasi Email')

@section('style')
    @vite(['resources/css/register.css']) {{-- Menggunakan style register --}}
@endsection

@section('content')
    <section class="register-section" style="background-image: url('{{ asset('images/bg_Register.jpg') }}');">
        <div class="register-container">
            <h2 style="color: #b97012; margin-bottom: 30px;">Verifikasi Email</h2>

            <p style="margin-bottom: 10px; color: white;">
                Kami telah mengirimkan link verifikasi ke email kamu. 
                Silakan cek kotak masuk dan folder spam untuk menyelesaikan proses registrasi.
            </p>
            <p style="color: #ffc107;">
                <strong>Belum menerima email?</strong> Harap tunggu 1–2 menit dan cek lagi inbox kamu.
                Jika masih belum ada, kamu bisa klik tombol di bawah untuk kirim ulang email verifikasi.
            </p>

            {{-- Tampilkan pesan sukses jika ada --}}
            @if (session('message'))
                <div style="color: #28a745; margin-top: 15px; margin-bottom: 20px;">
                    {{ session('message') }}
                </div>
            @endif

            {{-- Tombol kirim ulang email --}}
            <form method="POST" action="{{ route('verification.send') }}" class="register-form">
                @csrf
                <button type="submit" style="margin-top: 10px;">Kirim Ulang Email Verifikasi</button>
            </form>

            <p class="login-text" style="margin-top: 20px;">
                Salah email? <a href="{{ route('register.form') }}">Registrasi Ulang</a>
            </p>
        </div>
    </section>
@endsection
