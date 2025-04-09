@extends('layouts.user')

@section('title', 'Registrasi')

@section('style')
    @vite(['resources/css/register.css'])
@endsection

@section('content')
    <section class="register-section" style="background-image: url('{{ asset('images/bg_Register.jpg') }}');">
        <div class="register-container">
            <h2 style="color: #b97012; margin-bottom: 40px;">Halaman Registrasi</h2>
            <form class="register-form">
                <label>Nama</label>
                <input type="text" placeholder="Masukkan Nama">

                <label>Email</label>
                <input type="email" placeholder="Masukkan Email">

                <label>Sandi</label>
                <input type="password" placeholder="Masukkan Sandi">

                <label>Ulangi Sandi</label>
                <input type="password" placeholder="Ulangi Sandi">

                <p class="login-text">Sudah Punya Akun? <a href="{{asset('login')}}">Masuk disini</a></p>

                <button type="submit">Registrasi</button>
            </form>
        </div>
    </section>
@endsection
