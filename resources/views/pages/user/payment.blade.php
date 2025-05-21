@extends('layouts.user')

@section('title', 'Pembayaran')

@section('style')
    @vite(['resources/css/user/pembayaran.css'])
@endsection

@section('content')
    @php
        $mataUang = $order->paket->jenis === 'haji' ? '$' : 'Rp';
    @endphp

    <div class="container my-5">
        <h4 class="mb-4 fw-bold text-center">Ringkasan Pemesanan & Pembayaran</h4>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm p-4">
                    <h5 class="mb-3">Detail Pesanan</h5>
                    <ul class="list-unstyled">
                        @if ($order->referralAgen)
                            <p><strong>Referral oleh Agen:</strong> {{ $order->referralAgen->name }}</p>
                        @endif
                        <li><strong>Nama Pemesan:</strong> {{ $order->nama_pemesan }}</li>
                        <li><strong>Nomor Telepon:</strong> +62{{ $order->telepon_pemesan }}</li>
                        <li><strong>Email:</strong> {{ $order->email_pemesan }}</li>
                        <li><strong>Nama Paket:</strong> {{ $order->paket->nama_paket ?? '-' }}</li>
                        <li><strong>Jenis Paket:</strong> {{ $order->paket->jenis ?? '-' }}</li>
                        <li><strong>Program Hari:</strong> {{ $order->paket->program_hari ?? '-' }} hari</li>
                        <li><strong>Total Harga Paket:</strong> {{ $mataUang }}
                            {{ number_format($order->total_harga, 0, ',', '.') }}</li>
                        <li><strong>Diskon:</strong> {{ $mataUang }} {{ number_format($order->diskon, 0, ',', '.') }}
                        </li>
                        <li><strong>Metode Pembayaran:</strong> {{ ucfirst($order->jenis_pembayaran) }}</li>
                        <li><strong>Total Bayar:</strong> {{ $mataUang }}
                            {{ number_format($order->jumlah_dibayar, 0, ',', '.') }}</li>
                    </ul>

                    <hr>

                    <h5 class="mb-3">Pembayaran Manual</h5>
                    <p>Silakan transfer sejumlah:</p>
                    <h3 class="text-success fw-bold mb-3">{{ $mataUang }}
                        {{ number_format($order->jumlah_dibayar, 0, ',', '.') }}</h3>

                    <p>Ke Virtual Account (VA) berikut:</p>
                    <div class="bg-light border rounded p-3 mb-3">
                        <span class="d-block fw-bold">Bank Tujuan:</span>
                        <p class="mb-2">BSI</p>

                        <span class="d-block fw-bold">Nomor VA:</span>
                        <h4 class="text-primary">028393583</h4>
                    </div>

                    <p class="text-muted small">
                        Setelah mengirim bukti pembayaran, admin akan memverifikasi dan status pesanan anda akan diperbarui
                        secara otomatis.
                    </p>
                    <hr class="my-4">

                    <h5 class="mb-3">Upload Bukti Pembayaran</h5>
                    <form action="{{ route('uploadBuktiPembayaran', $order->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="bukti_pembayaran" class="form-label">Unggah Bukti (JPG/PNG/PDF):</label>
                            <input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran"
                                accept="image/*,.pdf" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim Bukti Pembayaran</button>
                    </form>

                    @if ($order->bukti_pembayaran)
                        <div class="alert alert-success mt-3">
                            Bukti pembayaran telah diunggah. <a href="{{ asset('storage/' . $order->bukti_pembayaran) }}"
                                target="_blank">Lihat</a>
                        </div>
                    @endif


                    <a href="{{ route('riwayat') }}" class="btn btn-success w-100">Lihat Status Pembayaran</a>
                </div>
            </div>
        </div>
    </div>
@endsection
