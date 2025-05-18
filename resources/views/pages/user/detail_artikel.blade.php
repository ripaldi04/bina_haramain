    @extends('layouts.user')

    @section('title', 'Detail Artikel')

    @section('style')
        @vite(['resources/css/user/detail_artikel.css'])
    @endsection


    @section('content')
        <div class="container mt-5">
            <h2 class="fw-bold" style="font-size: 40px; margin-top: 100px;">
                {{ $artikel->judul }}
                <div class="row mt-5 bg-white p-4 rounded">
                    <!-- Blog Content -->
                    <div class="col-md-12">
                        <p class="blog-meta">
                            Dipublikasi pada :
                            <strong>{{ \Carbon\Carbon::parse($artikel->created_at)->format('d F Y, H:i:s') }}</strong>
                        </p>
                        <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}" class="blog-image my-3">
                        <p class="image-caption text-center">
                        </p>
                        <h5 class="fw-bold mt-4">{{$artikel->subjudul}}</h5>
                        <p class="blog-isi">
                            {{$artikel->isi}}
                        </p>
                    </div>
                </div>
        </div>
    @endsection
