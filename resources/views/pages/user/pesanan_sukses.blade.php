<!-- resources/views/pages/user/pesananSukses.blade.php -->
@extends('layouts.user')

@section('content')
    <div class="container">
        <h1>Pemesanan Sukses</h1>
        <p>Terima kasih! Pemesanan Anda telah berhasil.</p>
        <a href="{{ route('home') }}" class="btn btn-primary">Kembali ke Halaman Utama</a>
    </div>
@endsection
