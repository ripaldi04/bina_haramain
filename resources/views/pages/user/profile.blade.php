@extends('layouts.user')

@section('title', 'Profil Saya')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-center mb-4">
                    <h2 class="fw-bold">👤 Profil</h2>
                </div>

                <div class="card border-0 shadow rounded-3">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label text-muted">Nama Lengkap</label>
                            <div class="fs-5">{{ auth()->user()->name }}</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-muted">Email</label>
                            <div class="fs-5">{{ auth()->user()->email }}</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-muted">Kode Referral</label>
                            <div class="fs-5">{{ auth()->user()->kode_referral ?? '-' }}</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-muted">Status Verifikasi Email</label><br>
                            @if (auth()->user()->hasVerifiedEmail())
                                <span class="badge bg-success px-3 py-2">✅ Terverifikasi</span>
                            @else
                                <span class="badge bg-warning text-dark px-3 py-2">⚠️ Belum Verifikasi</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="text-end mt-4">
                    <a href="{{ route('home') }}" class="btn btn-outline-warning">
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
