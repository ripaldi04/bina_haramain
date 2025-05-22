@extends('layouts.user')

@section('title', 'Reset Password')

@section('style')
    @vite(['resources/css/user/register.css'])
@endsection

@section('script')
    @vite(['resources/js/alert.js', 'resources/js/user/login.js'])
@endsection

@section('content')
    <section class="register-section" style="background-image: url('{{ asset('images/bg_Register.jpg') }}');">
        <div class="register-container">
            <h2>Reset Password</h2>

            <form class="register-form" method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email }}">

                <label for="password">Password Baru</label>
                <div style="position: relative; margin-bottom: 15px;">
                    <input type="password" name="password" id="password" placeholder="Masukkan Password Baru" required
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

                <label for="password_confirmation">Konfirmasi Password</label>
                <div style="position: relative; margin-bottom: 15px;">
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        placeholder="Ulangi Password" required style="padding-right: 2.5rem; width: 100%;">
                    <i class="bi bi-eye toggle-password" data-target="password_confirmation"
                        style="
                        position: absolute;
                        right: 10px;
                        top: 55%;
                        transform: translateY(-50%);
                        cursor: pointer;
                        color: #999;
                    "></i>
                </div>

                @error('password')
                    <div class="alert alert-danger" style="margin-bottom: 15px;">{{ $message }}</div>
                @enderror

                <button type="submit">Reset Password</button>
            </form>
        </div>
    </section>
@endsection
