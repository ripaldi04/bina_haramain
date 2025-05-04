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
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="m-0">Keunggulan</h5>
                <a href="javascript:void(0)" class="btn btn-primary btn-sm" onclick="openKeunggulanModal()">+ Tambah</a>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>Judul</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($keunggulan as $item)
                            <tr>
                                {{-- Judul dibuat ellipsis --}}
                                <td
                                    style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    {{ $item->title }}
                                </td>
                                <td>
                                    @if ($item->image_url)
                                        <img src="{{ asset('storage/' . $item->image_url) }}" width="100"
                                            class="img-fluid" />
                                    @else
                                        <span>No Image</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="javascript:void(0)" class="btn btn-warning btn-sm"
                                        onclick="openKeunggulanModal(
                                    {{ $item->id }},
                                    '{{ $item->title }}',
                                    '{{ $item->image_url ? asset('storage/' . $item->image_url) : '' }}'
                                )">
                                        Edit
                                    </a>
                                    <form action="{{ route('keunggulan.destroy', $item->id) }}" method="POST"
                                        style="display: inline;" id="delete-form-{{ $item->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="confirmDelete({{ $item->id }}, event)"
                                            class="btn btn-danger btn-sm btn-delete">
                                            Hapus
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Belum ada data keunggulan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>



        <!-- Modal Form -->
        <div class="modal fade" id="keunggulanModal" tabindex="-1" aria-labelledby="keunggulanModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <form method="POST" enctype="multipart/form-data" action="{{ route('keunggulan.storeOrUpdate') }}">

                    @csrf
                    <input type="hidden" name="id" id="keunggulan_id">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="keunggulanModalLabel">Tambah/Edit Keunggulan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Judul</label>
                                <input type="text" class="form-control" name="title" id="title" required>
                            </div>
                            <div class="mb-3">
                                <label>Gambar</label>
                                <input type="file" class="form-control" name="image_url" id="image_url">
                            </div>
                            <div id="previewImage" class="mb-3"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- Fasilitas --}}
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="m-0">Fasilitas</h5>
                <a href="javascript:void(0)" class="btn btn-primary btn-sm" onclick="openFasilitasModal()">+ Tambah</a>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($fasilitas as $item)
                            <tr>
                                <td><span class="ellipsis-judul" title="{{ $item->title }}">{{ $item->title }}</span>
                                </td>
                                <td><span class="ellipsis-deskripsi"
                                        title="{{ $item->deskripsi }}">{{ $item->deskripsi }}</span></td>
                                <td>
                                    @if ($item->image_url)
                                        <img src="{{ asset('storage/' . $item->image_url) }}" width="100"
                                            class="img-fluid" />
                                    @else
                                        <span>No Image</span>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-warning btn-sm"
                                        onclick="openFasilitasModal({{ $item->id }}, '{{ $item->title }}', `{{ $item->deskripsi }}`, '{{ $item->image_url }}')">
                                        Edit
                                    </button>
                                    <form action="{{ route('fasilitas.destroy', $item->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm btn-delete"
                                            data-id="{{ $item->id }}">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Belum ada data fasilitas</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal Tambah/Edit Fasilitas -->
        <div class="modal fade" id="fasilitasModal" tabindex="-1" aria-labelledby="fasilitasModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <form id="fasilitasForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="fasilitas_id">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="fasilitasModalLabel">Tambah/Edit Fasilitas</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Judul</label>
                                <input type="text" class="form-control" name="title" id="title" required>
                            </div>
                            <div class="mb-3">
                                <label>Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="deskripsi" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Gambar</label>
                                <input type="file" class="form-control" name="image_file" id="image_file">
                            </div>
                            <div id="previewImage" class="mb-3"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </form>
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
                            <th>Aksi</th> <!-- Tambahan kolom untuk tombol Edit -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($galeri as $item)
                            <tr>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>
                                    @for ($i = 1; $i <= 8; $i++)
                                        @php
                                            $imageField = 'image' . $i . '_url';
                                        @endphp
                                        @if (!empty($item->$imageField))
                                            <div style="width: 70px; height: 70px; overflow: hidden; margin: 3px;">
                                                <img src="{{ asset('storage/' . $item->$imageField) }}"
                                                    style="width: 100%; height: 100%; object-fit: cover;"
                                                    class="img-fluid" />
                                            </div>
                                        @endif
                                    @endfor
                                </td>
                                <td>
                                    @php
                                        $images = json_encode([
                                            $item->image1_url,
                                            $item->image2_url,
                                            $item->image3_url,
                                            $item->image4_url,
                                            $item->image5_url,
                                            $item->image6_url,
                                            $item->image7_url,
                                            $item->image8_url,
                                        ]);
                                    @endphp

                                    <button type="button" class="btn btn-sm btn-primary"
                                        onclick='openEditGaleri({{ $item->id }}, "{{ addslashes($item->title) }}", "{{ addslashes($item->deskripsi) }}", {!! $images !!})'
                                        data-bs-toggle="modal" data-bs-target="#editGaleriModal">
                                        Edit
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="modal fade" id="editGaleriModal" tabindex="-1" aria-labelledby="editGaleriModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <form method="POST" enctype="multipart/form-data" id="editGaleriForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="edit_id">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Galeri</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Judul</label>
                                <input type="text" class="form-control" name="title" id="edit_title" required>
                            </div>
                            <div class="mb-3">
                                <label>Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="edit_deskripsi" required></textarea>
                            </div>

                            <div class="row">
                                @for ($i = 1; $i <= 8; $i++)
                                    <div class="col-md-3 mb-3">
                                        <label>Gambar {{ $i }}</label>
                                        <input type="file" name="image{{ $i }}" class="form-control">
                                        <div id="preview_image{{ $i }}" class="mt-2"></div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </form>
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
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="m-0">Pertanyaan</h5>
                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addQuestionModal">
                    Tambah Pertanyaan
                </button>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th style="width: 20%;">Judul Pertanyaan</th>
                            <th style="width: 60%;">Deskripsi / Jawaban</th>
                            <th style="width: 20%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($questions as $item)
                            <tr>
                                <td>
                                    <span class="d-inline-block text-truncate w-100" style="max-width: 200px;"
                                        title="{{ $item->title }}">
                                        {{ $item->title }}
                                    </span>
                                </td>
                                <td>
                                    <span class="d-inline-block text-truncate w-100" style="max-width: 400px;"
                                        title="{{ $item->deskripsi }}">
                                        {{ $item->deskripsi }}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $item->id }}">Edit</button>
                                    <form action="{{ route('questions.destroy', $item->id) }}" method="POST"
                                        style="display:inline-block" id="delete-form-{{ $item->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger btn-delete">Hapus</button>
                                    </form>
                                </td>
                            </tr>

                            {{-- Modal Edit --}}
                            <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1"
                                aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form method="POST" action="{{ route('questions.update', $item->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Edit
                                                    Pertanyaan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Tutup"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group mb-2">
                                                    <label for="title">Judul</label>
                                                    <input type="text" name="title" class="form-control"
                                                        value="{{ $item->title }}" required>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="deskripsi">Deskripsi</label>
                                                    <textarea name="deskripsi" class="form-control" rows="3" required>{{ $item->deskripsi }}</textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
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

        {{-- Modal Tambah --}}
        <div class="modal fade" id="addQuestionModal" tabindex="-1" aria-labelledby="addQuestionModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <form method="POST" action="{{ route('questions.store') }}">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addQuestionModalLabel">Tambah Pertanyaan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group mb-2">
                                <label for="title">Judul</label>
                                <input type="text" name="title" class="form-control"
                                    placeholder="Masukkan judul pertanyaan" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" rows="3" placeholder="Masukkan deskripsi" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection
