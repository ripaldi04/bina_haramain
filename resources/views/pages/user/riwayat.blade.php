@extends('layouts.user')

@section('title', 'Riwayat')

@section('style')
    @vite(['resources/css/user/riwayat.css'])
@endsection

@section('content')
    <!--table-->
    <div class="container container-history w-90 mt-5 mx-auto">
        <h2 class="fw-bold">History</h2>
        <div class="card p-3 shadow-sm">
            <div class="input-group search-box mb-3 d-flex align-items-center">
                <span class="input-group-text">
                    <i class="bi bi-search"></i>
                </span>
                <input type="text" class="form-control" placeholder="Search">
            </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Nama Pemesan</th>
                            <th>Kontak</th>
                            <th>Paket</th>
                            <th>Jama'ah</th>
                            <th>Pembayaran</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                            <tr>
                                <td>{{ $order->nama_pemesan }}</td>
                                <td>+62{{ $order->telepon_pemesan }}<br>{{ $order->email_pemesan }}</td>
                                <td>{{ $order->paket->nama_paket ?? '-' }}</td>
                                <td>
                                    @foreach ($order->orderKamar as $kamar)
                                        @foreach ($kamar->jamaahs as $jamaah)
                                            {{ $jamaah->nama }}<br>
                                        @endforeach
                                    @endforeach
                                </td>
                                <td>{{ ucfirst($order->jenis_pembayaran) }}</td>
                                <td>
                                    @if ($order->status === 'pending')
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @elseif($order->status === 'diterima')
                                        <span class="badge bg-success">Diterima</span>
                                    @elseif($order->status === 'ditolak')
                                        <span class="badge bg-danger">Ditolak</span>
                                    @else
                                        <span class="badge bg-secondary">{{ ucfirst($order->status) }}</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada riwayat pemesanan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
