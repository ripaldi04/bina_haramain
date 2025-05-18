    @extends('layouts.user')

    @section('title', 'Detail Artikel')

    @section('style')
        @vite(['resources/css/user/detail_artikel.css'])
    @endsection


    @section('content')
        <div class="container mt-5">
            <h2 class="fw-bold" style="font-size: 40px; margin-top: 100px;">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.

                <div class="row mt-5 bg-white p-4 rounded">
                    <!-- Blog Content -->
                    <div class="col-md-12">
                        <p class="blog-meta">
                            Dipublikasi pada : <strong>04 Februari 2025, 22:10:39</strong>
                        </p>
                        <img src="asset/Musdalifah____.jpg" alt="humble" class="blog-image my-3">
                        <p class="image-caption text-center">
                            Foto oleh <strong>Magda Ehlers</strong> dari Pexels
                        </p>
                        <h5 class="fw-bold mt-4">MABIT DI ARAFAH</h5>
                        <p class="blog-isi">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cum quaerat voluptatem enim harum hic
                            doloremque incidunt, eius quae? Quo minus enim ut a maxime quisquam! Deleniti laborum quos
                            aliquid praesentium?
                            Distinctio placeat eligendi impedit nam et suscipit, rem, similique provident quo alias
                            laboriosam quibusdam ipsum minima officia molestiae fugit! Voluptatum consequatur autem cumque
                            et culpa sunt quo deserunt quibusdam esse.
                            Eaque natus soluta, modi praesentium laboriosam aut saepe quis? Rem vero excepturi maiores vitae
                            omnis labore hic architecto porro quis, nobis odit quae blanditiis? Repellendus itaque
                            voluptatem dolore! Excepturi, quasi.
                        </p>
                    </div>
                </div>
        </div>
    @endsection
