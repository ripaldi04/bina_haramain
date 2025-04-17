@extends('layouts.user')

@section('title', 'Haji Bintang 5')

@section('style')
    @vite(['resources/css/user/transaksi.css'])
@endsection

@section('script')
    @vite(['resources/js/user/transaksi.js'])
@endsection

@section('content')
    <div class="container my-5">
        <h4 class="mb-4 fw-bold">Transaksi Paket Haji – Selesaikan Pemesanan</h4>
        <div class="row">
            <!-- Form Data Pemesan dan Jamaah -->
            <div class="col-lg-8">
                <div class="p-4 mb-4">
                    <!-- Data Pemesan -->
                    <div class="d-flex flex-column align-items-center mb-4">
                        <span class="judul-pemesan">Data Pemesan</span>
                        <div class="garis-pemesan mt-1"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3">
                            <label>Nama Lengkap Pemesan</label>
                            <input type="text" class="form-control" placeholder="Nama Lengkap Pemesan" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Jenis Kelamin Pemesan</label>
                            <input type="text" class="form-control" placeholder="Jenis Kelamin Pemesan" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Nomor Telepon Pemesan</label>
                            <div class="input-group">
                                <span class="input-group-text kode-negara">+62</span>
                                <input type="text" class="form-control" placeholder="Masukkan Nomor telepon" />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Email Pemesan</label>
                            <input type="email" class="form-control" placeholder="Email Pemesan" />
                        </div>
                        <div class="col-12 mb-3">
                            <label>Catatan Pemesan</label>
                            <input type="text" class="form-control" placeholder="Catatan Pemesan" />
                        </div>
                    </div>

                    <!-- Data Jamaah -->
                    <div class="d-flex flex-column align-items-center mb-4">
                        <span class="judul-pemesan">Data Jamaah</span>
                        <div class="garis-pemesan mt-1"></div>
                    </div>

                    <div class="row" id="jamaahContainer">
                        @for ($i = 1; $i <= 1; $i++)
                            <div class="col-md-6 mb-4">
                                <div class="jamaah-box">
                                    <div class="jamaah-header">Jamaah {{ $i }} (Kamar Quad)</div>
                                    <div class="form-group mt-4">
                                        <label for="jenisJamaah{{ $i }}">Jenis Jamaah</label>
                                        <select id="jenisJamaah{{ $i }}">
                                            <option selected>Jamaah Baru</option>
                                            <option>Sesuai Pemesan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="namaJamaah{{ $i }}">Nama Lengkap Jamaah</label>
                                        <input type="text" id="namaJamaah{{ $i }}"
                                            placeholder="Nama Lengkap Jamaah" />
                                    </div>
                                    <div class="form-group">
                                        <label for="jenisKelamin{{ $i }}">Jenis Kelamin</label>
                                        <select id="jenisKelamin{{ $i }}">
                                            <option selected>Laki - Laki</option>
                                            <option>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>

                    <div class="text-center">
                        <button type="button" class="btn btn-outline-warning" id="btnTambahJamaah">+ Tambah Jamaah</button>
                    </div>

                    <small class="text-muted d-block mt-3">
                        <strong>Catatan:</strong><br>
                        Jika membutuhkan panduan transaksi atau pemesanan, silakan luangkan waktu sejenak untuk membacanya
                        dengan klik di sini.<br>
                        Pembayaran uang muka minimal USD 4.500,00.<br>
                        Tenggat waktu pembayaran uang muka adalah 2 jam sejak transaksi dilakukan. Jika melewati batas waktu
                        tersebut, transaksi akan otomatis dibatalkan oleh sistem.
                    </small>
                </div>
            </div>

            <!-- Review Pesanan -->
            <div class="col-lg-4">
                <div class="card p-0 overflow-hidden rounded">
                    <div class="review-header text-center text-white py-3">
                        <h5 class="mb-0 fw-semibold">Review Pesanan</h5>
                    </div>
                    <div class="p-4">
                        <ul class="list-unstyled mb-3">
                            <li>
                                <strong>Kode Paket:</strong>
                                <span class="kode-paket">HAJJ00265</span>
                            </li>
                            <li><strong>Nama Paket:</strong> Haji Furoda 2025</li>
                            <li><strong>Jenis Paket:</strong> Haji Furoda</li>
                            <li><strong>Musim Haji:</strong> 1446 Hijriah</li>
                            <li><strong>Hotel Makkah:</strong> Swiss Maqam</li>
                            <li><strong>Hotel Madinah:</strong> Sofitel</li>
                            <li><strong>Program Hari:</strong> 26 Hari</li>
                            <li><strong>Waktu Pelaksanaan:</strong><br>08 April 2025 s/d 29 April 2025</li>
                            <li><strong>Bandara Keberangkatan:</strong><br>Bandar Udara Internasional Soekarno–Hatta</li>
                            <li><strong>Maskapai Keberangkatan:</strong><br>Saudi Arabian Airlines</li>
                            <li><strong>Harga Paket:</strong> USD 22.500,00 (Quad)</li>
                            <li><strong>Kombinasi Kamar:</strong> Quad: 1 Pax</li>
                            <li><strong>Diskon:</strong> IDR 0,00</li>
                        </ul>
                        <div class="custom-total-box text-white p-3 text-center rounded mb-3">
                            <strong>Total : USD 22.500,00</strong>
                        </div>
                        <div class="p-3 border rounded bg-white">
                            <h6 class="fw-bold">Kode Voucher</h6>
                            <p class="small">Silakan masukkan kode voucher (jika ada) saat transaksi untuk
                                mendapatkan potongan harga spesial dari kami.</p>
                            <input type="text" class="form-control mb-2" placeholder="Kode Voucher" />
                            <button class="btn custom-voucher w-100">Gunakan Voucher</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection