@extends('layouts.admin')


@section('script')
    @vite(['resources/js/admin/admin_landing_page.js'])
@endsection

@section('content')
    {{-- Main Content --}}
    <div class="container-fluid p-4">
        <h1 class="mb-4">Manajemen Landing Page</h1>

        {{-- Banner Section --}}
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="m-0">Banner</h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>Header 1</th>
                            <th>Header 2</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banners as $banner)
                            <tr>
                                <td class="text-wrap">{{ $banner->header1 }}</td>
                                <td class="text-wrap">{{ $banner->header2 }}</td>
                                <td class="text-wrap">{{ $banner->deskripsi }}</td>
                                <td><img src="{{ asset('storage/' . $banner->image_url) }}" class="img-fluid" alt="Banner">
                                </td>
                                <td>
                                    <!-- Tombol Edit -->
                                    <button class="btn btn-warning btn-sm" id="editButton" data-id="{{ $banner->id }}"
                                        data-header1="{{ $banner->header1 }}" data-header2="{{ $banner->header2 }}"
                                        data-deskripsi="{{ $banner->deskripsi }}" data-image_url="{{ $banner->image_url }}">
                                        Edit
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Modal Edit Banner -->
        <div class="modal fade" id="editBannerModal" tabindex="-1" role="dialog" aria-labelledby="editBannerModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editBannerModalLabel">Edit Banner</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form action="{{ route('admin.banner.update', ['id' => 0]) }}" method="POST" enctype="multipart/form-data" id="editBannerForm">
                            @csrf
                            <input type="hidden" id="banner_id" name="banner_id">

                            <div class="form-group">
                                <label for="header1">Header 1</label>
                                <input type="text" class="form-control" id="header1" name="header1" required>
                            </div>

                            <div class="form-group">
                                <label for="header2">Header 2</label>
                                <input type="text" class="form-control" id="header2" name="header2" required>
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="image_url">Gambar Banner</label>
                                <input type="file" class="form-control" id="image_url" name="image_url">
                            </div>
                            <button type="submit" class="btn btn-primary">Update Banner</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        {{-- Highlight 1 --}}
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="m-0">Highlight 1</h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>Header</th>
                            <th>Deskripsi</th>
                            <th>Points</th>
                            <th>Gambar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($highlights1 as $item)
                            <tr>
                                <td>{{ $item->header }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>
                                    {{ $item->point1 }}, {{ $item->point2 }}, {{ $item->point3 }},
                                    {{ $item->point4 }}, {{ $item->point5 }}
                                </td>
                                <td><img src="{{ $item->image_url }}" width="100" class="img-fluid" /></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Highlight 2 --}}
<div class="card mb-4">
    <div class="card-header">
        <h5 class="m-0">Highlight 2</h5>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-light">
                <tr>
                    <th>Header</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($highlights2 as $item)
                    <tr>
                        <td>{{ $item->header }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td><img src="{{ asset('storage/' . $item->image_url) }}" width="100" class="img-fluid" /></td>
                        <td>
                            <!-- Tombol Edit -->
                            <button class="btn btn-sm btn-primary edit-highlight2" data-id="{{ $item->id }}" 
                                    data-header="{{ $item->header }}" 
                                    data-deskripsi="{{ $item->deskripsi }}" 
                                    data-image_url="{{ $item->image_url }}">
                                Edit
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Edit Highlight 2 -->
<div class="modal fade" id="editHighlight2Modal" tabindex="-1" aria-labelledby="editHighlight2ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editHighlight2ModalLabel">Edit Highlight 2</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="highlight2-edit-form" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="modal-body">
        <input type="hidden" name="id" id="highlight2-id">
        <div class="mb-3">
            <label for="header" class="form-label">Header</label>
            <input type="text" class="form-control" id="header" name="header" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="image_url" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="image_url" name="image_url">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>

        </div>
    </div>
</div>



        {{-- Highlight Points --}}
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="m-0">Highlight Points</h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($highlightPoints as $item)
                            <tr>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td><img src="{{ $item->image_url }}" width="100" class="img-fluid" /></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Keunggulan --}}
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="m-0">Keunggulan</h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>Judul</th>
                            <th>Gambar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($keunggulan as $item)
                            <tr>
                                <td>{{ $item->title }}</td>
                                <td><img src="{{ $item->image_url }}" width="100" class="img-fluid" /></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Fasilitas --}}
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="m-0">Fasilitas</h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fasilitas as $item)
                            <tr>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td><img src="{{ $item->image_url }}" width="100" class="img-fluid" /></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Muthawif --}}
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="m-0">Muthawif</h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>Nama</th>
                            <th>Daerah</th>
                            <th>Gambar</th>
                            <th>Background</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($muthawif as $item)
                            <tr>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->daerah }}</td>
                                <td><img src="{{ $item->image_url }}" width="100" class="img-fluid" /></td>
                                <td><img src="{{ $item->background_image_url }}" width="100" class="img-fluid" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Galeri --}}
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="m-0">Galeri</h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Galeri Gambar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($galeri as $item)
                            <tr>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>
                                    @for ($i = 1; $i <= 8; $i++)
                                        <img src="{{ $item->{'image' . $i . '_url'} }}" width="70"
                                            class="m-1 img-fluid" />
                                    @endfor
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Hot Deal --}}
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="m-0">Hot Deal</h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>Judul</th>
                            <th>Sub Judul</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hotDeals as $item)
                            <tr>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->subtitle }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td><img src="{{ $item->image_url }}" width="100" class="img-fluid" /></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Pertanyaan --}}
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="m-0">Pertanyaan</h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>Pertanyaan</th>
                            <th>Jawaban</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($questions as $item)
                            <tr>
                                <td>{{ $item->question }}</td>
                                <td>{{ $item->answer }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
