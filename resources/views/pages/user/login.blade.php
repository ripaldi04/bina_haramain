@extends('layouts.user')

@section('title', 'Login')

@section('style')
    @vite(['resources/css/login.css'])
@endsection

@section('content')
    <section class="register-section" style="background-image: url('{{ asset('images/bg_Register.jpg') }}');">
        <div class="register-container">
            <h2 style="color: #b97012; margin-bottom: 40px;">Halaman Login</h2>
            <form class="register-form">
                <label>Email</label>
                <input type="email" placeholder="Masukkan Email">

                <label>Sandi</label>
                <input type="password" placeholder="Masukkan Sandi">

                <button type="submit">Masuk</button>
            </form>
        </div>
    </section>
@endsection
