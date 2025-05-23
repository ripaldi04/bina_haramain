@extends('layouts.user')

@section('title', 'Artikel')

@section('style')
    @vite(['resources/css/user/artikel.css'])
@endsection

{{-- @section('script')
    @vite(['resources/js/user/detail_layanan.js'])
@endsection --}}

@section('content')
    <!--Container Memasukan jenis-->
    <div class="container mt-4">
        <h3 class="fw-bold" style="margin-top: 70px;">Artikel BinaHaramain</h3>


        <!-- Konten Artikel (Placeholder) -->
        <div class="row">
            <!-- Isi artikel di sini -->
        </div>
    </div>
    </div>

    <div class="container mt-5">
        <div class="row g-4">
            @foreach ($artikels as $artikel)
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="artikel-card mb-3">
                            <img src="{{ asset('storage/' . $artikel->gambar) }}" class="artikel-img"
                                alt="{{ $artikel->judul }}">
                        </div>
                        <div class="card-body">
                            <h6 class="fw-bold text-center">{{ $artikel->judul }}</h6>
                            <hr>
                            <p class="blog-meta">
                                Dipublikasi pada : {{ \Carbon\Carbon::parse($artikel->created_at)->format('d F Y H:i:s') }}
                            </p>
                            <p class="blog-spill">
                                {{ \Illuminate\Support\Str::limit($artikel->isi, 200, '...') }}
                            </p>
                            <a href="{{ route('detail_artikel', $artikel->id) }}" class="btn btn-dark w-100 fw-bolder">Baca
                                Artikel</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </div>
@endsection
