@extends('layouts.admin')

@section('script')
    @vite(['resources/js/admin/admin_agen.js', 'resources/js/admin/partials/sidebar.js'])
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

                <h1 id="pageTitle" class="mb-4">Agen</h1>


                <div class="bg-white p-4 shadow rounded">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                <input type="text" class="form-control" id="searchPaket"
                                    placeholder="Search name, email, or etc">
                            </div>
                        </div>
                    </div>
                    <!-- Modal Create Agen -->
                    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <form id="createForm" class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="createModalLabel">Tambah Agen</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="kode" class="form-label">Kode</label>
                                        <input type="text" class="form-control" id="kode" name="kode" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Modal Edit agen -->
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit agen</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <input type="hidden" id="editId">
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
                                        <label for="editKode" class="form-label">Kode</label>
                                        <input type="text" class="form-control" id="editKode">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="saveChanges">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <form id="filterForm" method="GET">
                                    <select name="year" class="form-select"
                                        onchange="document.getElementById('filterForm').submit()">
                                        <option value="">Semua Tahun</option>
                                        @foreach (range(now()->year, now()->year - 5) as $y)
                                            <option value="{{ $y }}"
                                                {{ request('year') == $y ? 'selected' : '' }}>{{ $y }}</option>
                                        @endforeach
                                    </select>
                                </form>
                            </div>
                        </div>
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>

                    <div class="bg-white p-4 shadow rounded">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Kode</th>
                                    <th>Total Jamaah dan Bukti</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                @foreach ($agens as $agen)
                                    <tr data-row-id="{{ $agen->id }}">
                                        <td>{{ $agen->name }}</td>
                                        <td>{{ $agen->email }}</td>
                                        <td>{{ $agen->phone }}</td>
                                        <td>{{ $agen->kode }}</td>
                                        <td>
                                            @php
                                                $yearFilter = request('year');
                                            @endphp
                                            @foreach ($agen->orderPaket as $order)
                                                @if (!$yearFilter || $order->created_at->format('Y') == $yearFilter)
                                                    <div class="mb-2">
                                                        <strong>{{ $order->jamaah->count() }} jamaah</strong> -
                                                        <span>{{ ucfirst($order->status) }}</span><br>
                                                        @if ($order->bukti_pembayaran)
                                                            <a href="{{ asset('storage/' . $order->bukti_pembayaran) }}"
                                                                target="_blank">Lihat Bukti</a>
                                                        @else
                                                            <span class="text-danger">Belum ada bukti</span>
                                                        @endif
                                                    </div>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            <i class="fas fa-edit text-primary me-2 cursor-pointer"></i>
                                            <i class="fas fa-trash text-danger cursor-pointer btn-delete"
                                                data-id="{{ $agen->id }}"></i>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
