@extends('layouts.user') {{-- atau sesuaikan dengan layout utama kamu --}}

@section('title', 'Profil Saya')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Profil Saya</h2>

        <div class="card shadow-sm">
            <div class="card-body">
                <p><strong>Nama:</strong> {{ auth()->user()->name }}</p>
                <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                <p><strong>Kode Referral:</strong> {{ auth()->user()->kode_referral ?? '-' }}</p>
                <p><strong>Status Verifikasi Email:</strong>
                    @if (auth()->user()->hasVerifiedEmail())
                        <span class="badge bg-success">Terverifikasi</span>
                    @else
                        <span class="badge bg-warning text-dark">Belum Verifikasi</span>
                    @endif
                </p>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('home') }}" class="btn btn-secondary">Kembali ke Beranda</a>
        </div>
    </div>
@endsection
