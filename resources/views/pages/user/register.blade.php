@extends('layouts.user')

@section('title', 'Registrasi')

@section('style')
    @vite(['resources/css/register.css'])
@endsection

@section('script')
    @vite(['resources/js/user/register.js'])
@endsection

@section('content')
    <section class="register-section" style="background-image: url('{{ asset('images/bg_Register.jpg') }}');">
        <div class="register-container">
            <h2 style="color: #b97012; margin-bottom: 40px;">Halaman Registrasi</h2>
            <form method="POST" action="{{ route('register') }}" class="register-form">
                @csrf
                <label>Nama Lengkap</label>
                <input type="text" name="name" placeholder="Masukkan Nama Lengkap" required>

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

                <label>Ulangi Sandi</label>
                <div style="position: relative;">
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        placeholder="Ulangi Sandi" style="padding-right: 2.5rem; width: 100%;">
                    <i class="bi bi-eye toggle-password" data-target="password_confirmation"
                        style="
                            position: absolute;
                            right: 10px;
                            top: 50%;
                            transform: translateY(-50%);
                            cursor: pointer;
                            color: #999;
                        "></i>
                </div>

                <p class="login-text">Sudah Punya Akun? <a href="{{ asset('login') }}">Masuk disini</a></p>

                <button type="submit">Registrasi</button>
            </form>
        </div>
    </section>
@endsection
