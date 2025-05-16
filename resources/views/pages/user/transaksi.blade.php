@extends('layouts.user')

@section('title', 'Transaksi')

@section('style')
    @vite(['resources/css/user/transaksi.css'])
@endsection
@section('script')
    @vite(['resources/js/user/transaksi.js'])
@endsection

@section('content')
    <div class="container my-5">
        <h4 class="mb-4 fw-bold">Transaksi Paket {{ $order->paket->nama_paket }} – Selesaikan Pemesanan</h4>
        <div class="row">
            <!-- Form Data Pemesan dan Jamaah -->
            <div class="col-lg-8">
                <div class="p-4 mb-4">
                    <!-- Data Pemesan -->
                    <form action="{{ route('prosesTransaksi', $order->id) }}" method="POST">
                        @csrf
                        <div class="d-flex flex-column align-items-center mb-4">
                            <span class="judul-pemesan">Data Pemesan</span>
                            <div class="garis-pemesan mt-1"></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <label>Nama Lengkap Pemesan</label>
                                <input type="text" class="form-control" placeholder="Nama Lengkap Pemesan"
                                    name="nama_pemesan" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Jenis Kelamin Pemesan</label>
                                <select class="form-control" name="jenis_kelamin_pemesan" id="jenis_kelamin_pemesan"
                                    required>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Nomor Telepon Pemesan</label>
                                <div class="input-group">
                                    <span class="input-group-text kode-negara">+62</span>
                                    <input type="text" class="form-control" placeholder="Masukkan Nomor telepon"
                                        name="telepon_pemesan" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Email Pemesan</label>
                                <input type="email" class="form-control" placeholder="Email Pemesan"
                                    name="email_pemesan" />
                            </div>
                            <div class="col-12 mb-3">
                                <label>Catatan Pemesan</label>
                                <input type="text" class="form-control" placeholder="Catatan Pemesan" name="catatan" />
                            </div>
                        </div>

                        <!-- Data Jamaah -->
                        <div class="d-flex flex-column align-items-center mb-4">
                            <span class="judul-pemesan">Data Jamaah</span>
                            <div class="garis-pemesan mt-1"></div>
                        </div>

                        <div class="row" id="jamaahContainer">
                            @php
                                $jamaahCount = 1;
                            @endphp

                            @foreach ($order->orderKamar as $orderKamar)
                                @for ($i = 0; $i < $orderKamar->jumlah_kamar; $i++)
                                    <div class="col-md-6 mb-4">
                                        <div class="jamaah-box">
                                            <div class="jamaah-header">Jamaah {{ $jamaahCount }} (Kamar
                                                {{ ucfirst($orderKamar->tipeKamar->tipe) }})</div>
                                            <div class="form-group mt-4">
                                                <label for="jenisJamaah{{ $jamaahCount }}">Jenis Jamaah</label>
                                                <select id="jenisJamaah{{ $jamaahCount }}" name="jenis_jamaah[]">
                                                    <option selected>Jamaah Baru</option>
                                                    <option>Sesuai Pemesan</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="namaJamaah{{ $jamaahCount }}">Nama Lengkap Jamaah</label>
                                                <input type="text" id="namaJamaah{{ $jamaahCount }}"
                                                    name="nama_jamaah[]" placeholder="Nama Lengkap Jamaah"
                                                    class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <label for="jenisKelamin{{ $jamaahCount }}">Jenis Kelamin</label>
                                                <select id="jenisKelamin{{ $jamaahCount }}" name="jenis_kelamin_jamaah[]"
                                                    class="form-control">
                                                    <option value="Laki-Laki" selected>Laki - Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $jamaahCount++;
                                    @endphp
                                @endfor
                            @endforeach
                        </div>
                        <div class="col-12 mb-3">
                            <label for="jenis_pembayaran">Pilih Jenis Pembayaran</label>
                            <select class="form-control" name="jenis_pembayaran" id="jenis_pembayaran"
                                data-total-harga="{{ $order->total_harga }}" required>
                                <option value="" disabled selected>Pilih salah satu</option>
                                <option value="booking">Booking (20%)</option>
                                <option value="dp">DP (50%)</option>
                                <option value="cash">Cash (100%)</option>
                            </select>
                        </div>
                        <!-- Tambahkan dalam <form> yang sudah ada -->
                        <div class="col-12 mb-3">
                            <label for="kode_referral">Kode Referral</label>
                            <input type="text" class="form-control" id="kode_referral" name="kode_referral"
                                placeholder="Masukkan kode referral (jika ada)" value="{{ old('kode_referral') }}">
                        </div>
                        <button class="btn btn-warning" type="submit">Selesai</button>
                    </form>
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
                                <span class="kode-paket">{{ $order->paket->kode_paket ?? '-' }}*</span>
                            </li>
                            <li><strong>Nama Paket:</strong>{{ $order->paket->nama_paket ?? '-' }}</li>
                            <li><strong>Jenis Paket:</strong> {{ $order->paket->jenis ?? '-' }}</li>
                            <li><strong>Hotel Makkah:</strong>{{ $order->paket->hotel_mekkah ?? '-' }}</li>
                            <li><strong>Hotel Madinah:</strong> {{ $order->paket->hotel_madinah ?? '-' }}</li>
                            <li><strong>Program Hari:</strong> {{ $order->paket->program_hari ?? '-' }} Hari</li>
                            <li><strong>Waktu Pelaksanaan:</strong><br>
                                @if ($order->detailPaket && $order->paket)
                                    @php
                                        $tanggalKeberangkatan = \Carbon\Carbon::parse(
                                            $order->detailPaket->tanggal_keberangkatan,
                                        );
                                        $tanggalKepulangan = $tanggalKeberangkatan
                                            ->copy()
                                            ->addDays($order->paket->program_hari - 1);
                                    @endphp
                                    {{ $tanggalKeberangkatan->format('d F Y') }} s/d
                                    {{ $tanggalKepulangan->format('d F Y') }}
                                @else
                                    -
                                @endif
                            <li><strong>Bandara Keberangkatan:</strong><br>{{ $order->paket->bandara ?? '-' }}</li>
                            <li><strong>Maskapai Keberangkatan:</strong><br>{{ $order->paket->maskapai ?? '-' }}</li>
                            <li><strong>Harga Paket:</strong>$ {{ number_format($order->paket->harga) }}</li>
                            <li><strong>Kombinasi Kamar:</strong><br>
                                @foreach ($order->orderKamar as $kamar)
                                    {{ ucfirst($kamar->tipeKamar->tipe) }}: {{ $kamar->jumlah_kamar }} kamar<br>
                                @endforeach
                            </li>
                            <li><strong>Diskon:</strong> $ 0,00</li>
                        </ul>
                        <div class="custom-total-box text-white p-3 text-center rounded mb-3" id="totalBayarBox">
                            <strong>Total : $ <span
                                    id="totalBayarValue">{{ number_format($order->total_harga, 0, ',', '.') }}
                                </span></strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
