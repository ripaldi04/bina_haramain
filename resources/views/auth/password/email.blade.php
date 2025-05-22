@extends('layouts.user')

@section('title', 'Lupa Password')

@section('style')
    @vite(['resources/css/user/register.css'])
@endsection

@section('script')
    @vite(['resources/js/alert.js'])
@endsection

@section('content')
    <section class="register-section" style="background-image: url('{{ asset('images/bg_Register.jpg') }}');">
        <div class="register-container">
            <h2>Lupa Password</h2>

            @if (session('status'))
                <div class="alert alert-success" style="margin-bottom: 15px;">
                    {{ session('status') }}
                </div>
            @endif

            <form class="register-form" method="POST" action="{{ route('password.email') }}">
                @csrf

                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Masukkan Email" required>

                @error('email')
                    <div class="alert alert-danger" style="margin-top: 8px;">{{ $message }}</div>
                @enderror

                <p class="login-text">Ingat Sandi? <a href="{{ route('login') }}">Masuk di sini</a></p>

                <button type="submit">Kirim Link Reset</button>
            </form>
        </div>
    </section>
@endsection
