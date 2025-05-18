@extends('layouts.admin')

@section('script')
    @vite(['resources/js/admin/partials/sidebar.js', 'resources/js/admin/admin_pesanan.js'])
@endsection

@section('content')
    <div class="bg-light">
        <div class="d-flex">
            <!-- Main Content -->
            <div class="container-fluid p-4">
                <h1 id="pageTitle" class="mb-4">Data Pemesanan</h1>
                <div class="bg-white p-4 shadow rounded">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Nama Pemesan</th>
                                <th>Email Pemesan</th>
                                <th>Phone Pemesan</th>
                                <th>Paket dan Tanggal berangkat</th>
                                <th>Jamaah</th>
                                <th>Jenis Pembayaran dan Harga Pembayaran</th>
                                <th>Bukti Pembayaran</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->nama_pemesan ?? '-' }}</td>
                                    <td>{{ $order->email_pemesan ?? '-' }}</td>
                                    <td>+62{{ $order->telepon_pemesan ?? '-' }}</td> {{-- atau $order->phone jika bukan dari users --}}
                                    <td>{{ $order->paket->nama_paket ?? '-' }}({{ $order->detailPaket->tanggal_keberangkatan ?? '-' }})
                                    </td>
                                    <td>
                                        @foreach ($order->orderKamar as $kamar)
                                            @foreach ($kamar->jamaahs as $jamaah)
                                                • {{ $jamaah->nama }} ({{ $jamaah->jenis_kelamin }})<br>
                                            @endforeach
                                        @endforeach
                                    </td>
                                    <td>
                                        {{ $order->jenis_pembayaran }} -
                                        @if ($order->paket->jenis === 'haji')
                                            $ {{ number_format($order->jumlah_dibayar, 0, ',', '.') }}
                                        @else
                                            Rp {{ number_format($order->jumlah_dibayar, 0, ',', '.') }}
                                        @endif
                                    </td>

                                    <td>
                                        @if ($order->bukti_pembayaran)
                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#buktiModal{{ $order->id }}">
                                                Lihat Bukti
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="buktiModal{{ $order->id }}" tabindex="-1"
                                                aria-labelledby="buktiModalLabel{{ $order->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="buktiModalLabel{{ $order->id }}">
                                                                Bukti Pembayaran</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body text-center">
                                                            <img src="{{ asset('storage/' . $order->bukti_pembayaran) }}"
                                                                class="img-fluid" alt="Bukti Pembayaran">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <span class="text-muted">Belum Ada</span>
                                        @endif
                                    </td>
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
                                    <td> <i class="fas fa-edit text-primary me-2 cursor-pointer btn-edit"
                                            data-bs-toggle="modal" data-bs-target="#editOrderModal{{ $order->id }}">
                                        </i>
                                        <i class="fas fa-trash text-danger cursor-pointer delete-order"
                                            data-id="{{ $order->id }}"></i>
                                    </td>
                                </tr>
                                <!-- Modal Edit Order -->
                                <div class="modal fade" id="editOrderModal{{ $order->id }}" tabindex="-1"
                                    aria-labelledby="editOrderModalLabel{{ $order->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST"
                                            enctype="multipart/form-data" id="editOrderModal{{ $order->id }}">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="detail_paket_id"
                                                value="{{ $order->detail_paket_id }}">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editOrderModalLabel{{ $order->id }}">
                                                        Edit Order</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Tutup"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row g-3">
                                                        <div class="col-md-6">
                                                            <label>Nama Pemesan</label>
                                                            <input type="text" name="name" class="form-control"
                                                                value="{{ $order->nama_pemesan ?? '' }}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Email</label>
                                                            <input type="email" name="email" class="form-control"
                                                                value="{{ $order->email_pemesan ?? '' }}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Telepon</label>
                                                            <input type="text" name="telepon_pemesan"
                                                                class="form-control" value="{{ $order->telepon_pemesan }}">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label>Daftar Jamaah</label>
                                                            @forelse($order->jamaah as $index => $j)
                                                                <div class="mb-3">
                                                                    <label>Nama Jamaah {{ $index + 1 }}</label>
                                                                    <input type="text"
                                                                        name="jamaah[{{ $j->id }}][nama]"
                                                                        class="form-control" value="{{ $j->nama }}">
                                                                </div>
                                                            @empty
                                                                <div class="mb-3">
                                                                    <label>Jamaah</label>
                                                                    <input type="text" class="form-control"
                                                                        value="Tidak ada jamaah" disabled>
                                                                </div>
                                                            @endforelse
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Jenis Pembayaran</label>
                                                            <select name="jenis_pembayaran" class="form-select">
                                                                <option value="dp"
                                                                    {{ $order->jenis_pembayaran == 'dp' ? 'selected' : '' }}>
                                                                    dp</option>
                                                                <option value="cash"
                                                                    {{ $order->jenis_pembayaran == 'cash' ? 'selected' : '' }}>
                                                                    Cash</option>
                                                                <option value="booking"
                                                                    {{ $order->jenis_pembayaran == 'booking' ? 'selected' : '' }}>
                                                                    Booking</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Status</label>
                                                            <select name="status" class="form-select">
                                                                <option value="pending"
                                                                    {{ $order->status == 'pending' ? 'selected' : '' }}>
                                                                    Pending</option>
                                                                <option value="diterima"
                                                                    {{ $order->status == 'diterima' ? 'selected' : '' }}>
                                                                    Diterima
                                                                </option>
                                                                <option value="ditolak"
                                                                    {{ $order->status == 'ditolak' ? 'selected' : '' }}>
                                                                    Ditolak</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            @if ($order->bukti_pembayaran)
                                                                <small class="d-block mt-1">Saat ini: <a
                                                                        href="{{ asset('storage/' . $order->bukti_pembayaran) }}"
                                                                        target="_blank">Lihat Bukti</a></small>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer mt-3">
                                                    <button type="submit" class="btn btn-primary">Simpan
                                                        Perubahan</button>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
