@extends('layouts.admin')

@section('script')
    @vite(['resources/js/admin/partials/sidebar.js', 'resources/js/admin/admin_pesanan.js'])
@endsection

@section('content')
    <div class="bg-light">
        <div class="d-flex">
            <!-- Main Content -->
            <div class="container-fluid p-4">
                {{-- <div class="d-flex justify-content-end align-items-center mb-4">
                    <div class="d-flex justify-content-end align-items-center mb-4">
                        @include('pages.admin.partials.profile')
                    </div>
                </div> --}}

                <h1 id="pageTitle" class="mb-4">Data Pemesanan</h1>



                <!-- Modal Edit pesanan -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit agen</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="editName" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="editName">
                                </div>
                                <div class="mb-3">
                                    <label for="editEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="editEmail">
                                </div>
                                <div class="mb-3">
                                    <label for="editPhone" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="editPhone">
                                </div>
                                <div class="mb-3">
                                    <label for="editPaket" class="form-label">Paket</label>
                                    <input type="text" class="form-control" id="editPaket">
                                </div>
                                <div class="mb-3">
                                    <label for="editJumlah" class="form-label">Jumlah</label>
                                    <input type="text" class="form-control" id="editJumlah">
                                </div>
                                <div class="mb-3">
                                    <label for="editJemaah" class="form-label">Jemaah</label>
                                    <input type="text" class="form-control" id="editJemaah">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="saveChanges">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-4 shadow rounded">
                    <!-- Search Field -->
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <div class="input-group">
                                <span class="input-group-text" id="searchIcon"><i class="fas fa-search"></i></span>
                                <input type="text" class="form-control" id="searchPaket"
                                    placeholder="Search name, email, or etc">
                            </div>
                        </div>
                    </div>



                    <button id="deleteAll" class="btn btn-danger mb-3">Hapus Semua</button>
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Nama Pemesan</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Paket</th>
                                <th>Jamaah</th>
                                <th>Jenis Pembayaran</th>
                                <th>Bukti Pembayaran</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->user->name ?? '-' }}</td>
                                    <td>{{ $order->user->email ?? '-' }}</td>
                                    <td>{{ $order->telepon_pemesan ?? '-' }}</td> {{-- atau $order->phone jika bukan dari users --}}
                                    <td>{{ $order->paket->nama_paket ?? '-' }}</td>
                                    <td>
                                        @foreach ($order->orderKamar as $kamar)
                                            @foreach ($kamar->jamaahs as $jamaah)
                                                {{ $jamaah->nama }} ({{ $jamaah->jenis_kelamin }})<br>
                                            @endforeach
                                        @endforeach
                                    </td>
                                    <td>{{ $order->jenis_pembayaran }}</td>
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
                                        </i></td>
                                </tr>
                                <!-- Modal Edit Order -->
                                <div class="modal fade" id="editOrderModal{{ $order->id }}" tabindex="-1"
                                    aria-labelledby="editOrderModalLabel{{ $order->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

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
                                                                value="{{ $order->user->name ?? '' }}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Email</label>
                                                            <input type="email" name="email" class="form-control"
                                                                value="{{ $order->user->email ?? '' }}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Telepon</label>
                                                            <input type="text" name="telepon_pemesan"
                                                                class="form-control"
                                                                value="{{ $order->telepon_pemesan }}">
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
