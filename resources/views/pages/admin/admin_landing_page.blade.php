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
                                <td><img src="{{ asset('images/v146_30.png') }}" width="100" class="img-fluid" /></td>
                                <td>
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
                        <form action="{{ route('admin.banner.update', '$banner->id') }}" method="POST"
                            enctype="multipart/form-data" id="editBannerForm">
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
        <div class="card mb-5">
            <div class="card-header">
                <h5 class="m-0 font-weight-bold">Highlight 1</h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="thead-light">
                        <tr>
                            <th style="width: 10%">Header</th>
                            <th style="width: 30%">Deskripsi</th>
                            <th style="width: 30%">Points</th>
                            <th style="width: 15%">Gambar</th>
                            <th style="width: 10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($highlights1 as $item)
                            <tr>
                                <td>
                                    <div style="white-space: pre-line; line-height: 1.6; margin-bottom: 5px;">
                                        {{ $item->header }}
                                    </div>
                                </td>
                                <td>
                                    <div style="white-space: pre-line; line-height: 1.6; margin-bottom: 5px;">
                                        {{ $item->deskripsi }}
                                    </div>
                                </td>
                                <td>
                                    <ul class="mb-0 pl-3">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if (!empty($item->{'point' . $i}))
                                                <li>{{ $item->{'point' . $i} }}</li>
                                            @endif
                                        @endfor
                                    </ul>
                                </td>
                                <td>
                                    <img src="{{ Str::startsWith($item->image_url, ['http', 'storage']) ? asset($item->image_url) : asset('storage/' . $item->image_url) }}"
                                        width="100" class="img-fluid rounded shadow-sm" />
                                </td>
                                <td class="text-center">
                                    <!-- Tombol Edit -->
                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                        data-target="#editModal{{ $item->id }}">
                                        Edit
                                    </button>
                                </td>
                            </tr>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <form action="{{ route('highlight1.update', $item->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-content">
                                            <div class="modal-header bg-light">
                                                <h5 class="modal-title font-weight-bold">Edit Highlight</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body row g-3 px-3 py-2">
                                                <div class="col-md-6 mb-3">
                                                    <label class="font-weight-bold">Header</label>
                                                    <input type="text" name="header" class="form-control"
                                                        id="header{{ $item->id }}" value="{{ $item->header }}" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="font-weight-bold">Deskripsi</label>
                                                    <textarea name="deskripsi" class="form-control"
                                                        id="deskripsi{{ $item->id }}" rows="3"
                                                        required>{{ $item->deskripsi }}</textarea>
                                                </div>

                                                @for ($i = 1; $i <= 5; $i++)
                                                    <div class="col-md-6 mb-3">
                                                        <label class="font-weight-bold">Point {{ $i }}</label>
                                                        <input type="text" name="point{{ $i }}" class="form-control"
                                                            id="point{{ $i }}{{ $item->id }}" value="{{ $item->{'point' . $i} }}">
                                                    </div>
                                                @endfor

                                                <div class="col-md-6 mb-3">
                                                    <label class="font-weight-bold">Gambar (Opsional)</label>
                                                    <input type="file" name="image" class="form-control-file mb-2"
                                                        id="image{{ $item->id }}">
                                                    <img src="{{ $item->image_url }}" width="100"
                                                        class="img-fluid rounded shadow-sm mt-1"
                                                        id="currentImage{{ $item->id }}">
                                                        <small class="form-text text-muted">Format: jpg, jpeg, png, gif.
                                                                </small>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Batal</button>
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($highlights2 as $item)
                            <tr>
                                <td>{{ $item->header }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td><img src="{{ $item->image_url }}" width="100" class="img-fluid" /></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
                                        <img src="{{ $item->{'image' . $i . '_url'} }}" width="70" class="m-1 img-fluid" />
                                    @endfor
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- LandingHotDeal --}}
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="m-0">Hot Deal</h5>
            </div>

                <table class="table table-bordered table-striped text-center align-middle">
                    <thead class="thead-light">
                        <tr>
                            <th>Judul</th>
                            <th>Sub Judul</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hotDeals as $item)
                            <tr>
                                <td style="white-space: pre-line;">{{ $item->title }}</td>
                                <td style="white-space: pre-line;">{{ $item->subtitle }}</td>
                                <td class="text-start" style="white-space: pre-line;">
                                    {{ $item->deskripsi }}
                                </td>
                                <td>
                                    @if ($item->image_url && file_exists(public_path($item->image_url)))
                                        <img src="{{ asset($item->image_url) }}" alt="gambar" width="50" height="50">
                                    @else
                                        <img src="https://via.placeholder.com/50?text=No+Image" alt="no image">
                                    @endif
                                </td>

                                <td>
                                    {{-- Tombol Edit --}}
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#editHotDealModal{{ $item->id }}">
                                        Edit
                                    </button>

                                    {{-- Modal Edit --}}
                                    <div class="modal fade" id="editHotDealModal{{ $item->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="editHotDealModalLabel{{ $item->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                {{-- Tampilkan error validasi --}}
                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul class="mb-0">
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif

                                                <form action="{{ route('admin.hotdeal.update', $item->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editHotDealModalLabel{{ $item->id }}">
                                                            Edit Hot Deal
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>Judul</label>
                                                            <input type="text" name="title" class="form-control"
                                                                value="{{ $item->title }}" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Sub Judul</label>
                                                            <input type="text" name="subtitle" class="form-control"
                                                                value="{{ $item->subtitle }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Deskripsi (gunakan enter untuk membuat list)</label>
                                                            <textarea name="deskripsi" class="form-control"
                                                                rows="4">{{ $item->deskripsi }}</textarea>
                                                        </div>

                                                        {{-- Preview gambar saat ini --}}
                                                        <div class="form-group">
                                                            <label>Gambar Saat Ini</label><br>
                                                            @if ($item->image_url)
                                                                <img src="{{ asset($item->image_url) }}" alt="Hot Deal Image"
                                                                    class="img-thumbnail" style="max-width: 200px;">
                                                            @else
                                                                <p>Tidak ada gambar</p>
                                                            @endif
                                                        </div>

                                                        {{-- Upload gambar baru --}}
                                                        <div class="form-group">
                                                            <label>Upload Gambar Baru</label>
                                                            <input type="file" name="image" class="form-control">
                                                            <small class="form-text text-muted">Format: jpg, jpeg, png, gif.
                                                                </small>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    {{-- End Modal --}}
                                </td>
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