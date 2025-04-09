@extends('layouts.user')

@section('title', 'Riwayat')

@section('style')
    @vite(['resources/css/riwayat.css'])
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
                        <tr>
                            <td>Muhammad Sumbul</td>
                            <td>+628983863672<br>sumbulmuhammad@gmail.com</td>
                            <td>Haji Furoda</td>
                            <td>Khalid Kashmiri</td>
                            <td>Cash</td>
                            <td>Lunas</td>
                        </tr>
                        <tr>
                            <td colspan="6">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="6">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="6">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="6">&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
