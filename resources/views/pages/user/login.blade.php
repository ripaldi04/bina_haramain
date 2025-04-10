@extends('layouts.user')

@section('title', 'Login')

@section('style')
    @vite(['resources/css/register.css'])
@endsection

@section('script')
    @vite(['resources/js/user/login.js'])
@endsection

@section('content')
    <section class="register-section" style="background-image: url('{{ asset('images/bg_Register.jpg') }}');">
        <div class="register-container">
            <h2>Halaman Login</h2>
            {{-- Tampilkan pesan error jika login gagal --}}
            <form class="register-form" method="POST" action="{{ route('login.proses') }}">
                @csrf
                @if (session('success'))
                    <div class="alert alert-success" style="margin-bottom: 15px; color: #28a745; font-weight: bold;">
                        {{ session('success') }}
                    </div>
                @endif
                <label>Email</label>
                <input type="email" name="email" placeholder="Masukkan Email">

                <label>Sandi</label>
                <div style="position: relative; margin-bottom: 15px;">
                    <input type="password" name="password" id="password" placeholder="Masukkan Sandi"
                        style="padding-right: 2.5rem; width: 100%;">
                    <i class="bi bi-eye toggle-password" data-target="password"
                        style="
                            position: absolute;
                            right: 10px;
                            top: 55%;
                            transform: translateY(-50%);
                            cursor: pointer;
                            color: #999;
                        "></i>
                </div>

                <p class="login-text">Belum Punya Akun? <a href="{{ asset('register') }}">Daftar disini</a></p>
                <button type="submit">Masuk</button>
            </form>
        </div>
    </section>
@endsection
