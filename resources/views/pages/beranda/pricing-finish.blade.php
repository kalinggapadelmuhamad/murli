@extends('layouts.beranda')

@section('title', 'Pemesanan')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/chocolat/dist/css/chocolat.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
@endpush

@section('main')
    <div class="list-project mt-5">
        <div class="container-fluid">
            <div class="row px-1 px-md-5 py-3 py-md-5">
                <div class="col-md-12">
                    <form method="get" action="{{ route('pemesanans.index') }}">
                        @csrf
                        <div class="card p-2" style="border: none">
                            <div class="card-header bg-white d-flex justify-content-between" style="border: none">
                                <div>
                                    <span class="d-block fw-bold">Diterbitkan Oleh</span>
                                    <span>Penyedia Jasa : <span class="fw-bold">MKDesign</span></span>
                                </div>
                                <div>
                                    Tanggal : {{ $pemesanan->created_at }}
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-borderless">
                                    <tr>
                                        <td style="width: 3%">
                                            To
                                        </td>
                                        <td style="width: 1%">:</td>
                                        <td>
                                            {{ $pemesanan->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Project
                                        </td>
                                        <td>:</td>
                                        <td>
                                            {{ $pemesanan->projectName }}
                                        </td>
                                    </tr>
                                </table>
                                <hr>
                                <p class="d-flex justify-content-between fw-bold">Jumlah Tingkat :
                                    <span id="summary-jumlah_tingkat" class="summary-value">0</span>
                                </p>
                                <p class="d-flex justify-content-between fw-bold">Luas Bangunan (m2) :
                                    <span id="summary-luas_bangunan" class="summary-value">0</span>
                                </p>
                                <p class="d-flex justify-content-between fw-bold">Design Type :
                                    <span id="summary-type" class="summary-value">Paket A</span>
                                </p>
                                <hr>
                                <p class="d-flex justify-content-between fw-bold">Harga :
                                    <span id="summary-harga" class="summary-value">-</span>
                                </p>
                            </div>
                        </div>
                        <div class="mt-3 d-flex justify-content-end">
                            <button class="btn btn-md btn-primary">
                                Pesan Layanan
                            </button>
                        </div>
                    </form>
                    {{-- <form method="post" action="{{ route('storePemesanan.index') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card py-3" style="border: none">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="name" class="form-label">Customer Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" required>
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="jumlah_tingkat" class="form-label">Jumlah
                                            Tingkat</label>
                                        <input type="number"
                                            class="form-control @error('jumlah_tingkat') is-invalid @enderror"
                                            id="jumlah_tingkat" name="jumlah_tingkat" required
                                            value="{{ $request->jumlah_tingkat }}">
                                        @error('jumlah_tingkat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="project" class="form-label">Project Name</label>
                                        <input type="text" class="form-control @error('project') is-invalid @enderror"
                                            id="project" name="project" required>
                                        @error('project')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Luas Bangunan (m2)</label>
                                        <input type="number"
                                            class="form-control @error('luas_bangunan') is-invalid @enderror"
                                            id="luas_bangunan" name="luas_bangunan" required
                                            value="{{ $request->luas_bangunan }}">
                                        @error('luas_bangunan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="email" class="form-label">Customer Email</label>
                                        <input type="email" class="form-control mb-3 @error('email') is-invalid @enderror"
                                            id="email" name="email" required>
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                        <label for="phone" class="form-label">Customer Phone</label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                            id="phone" name="phone" required>
                                        @error('phone')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Design Type</label>
                                        <div class="selectgroup w-100">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="radio" name="type" value="Paket A"
                                                        class="selectgroup-input"
                                                        {{ $request->paketType == 'Paket A' ? 'checked=' : '' }}>
                                                    <span class="selectgroup-button">Paket A</span>
                                                    <ul>
                                                        <li>Design 3D</li>
                                                        <li>Design Exterior (FASAD)</li>
                                                        <li>Lay Out</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="radio" name="type" value="Paket B"
                                                        class="selectgroup-input"
                                                        {{ $request->paketType == 'Paket B' ? 'checked=' : '' }}>
                                                    <span class="selectgroup-button">Paket B</span>
                                                    <ul>
                                                        <li>Design 3D</li>
                                                        <li>Design Exterior (FASAD)</li>
                                                        <li>Lay Out</li>
                                                        <li>
                                                            <span class="badge text-bg-primary text-wrap">
                                                                Design Interior
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="radio" name="type" value="Paket C"
                                                        class="selectgroup-input"
                                                        {{ $request->paketType == 'Paket C' ? 'checked=' : '' }}>
                                                    <span class="selectgroup-button">Paket C</span>
                                                    <ul>
                                                        <li>Design 3D</li>
                                                        <li>Design Exterior (FASAD)</li>
                                                        <li>Lay Out</li>
                                                        <li>
                                                            <span class="badge text-bg-primary text-wrap">
                                                                Design Interior
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <span class="badge text-bg-primary text-wrap">
                                                                Rancangan Anggaran Biaya (RAB)
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="radio" name="type" value="Paket D"
                                                        class="selectgroup-input"
                                                        {{ $request->paketType == 'Paket D' ? 'checked=' : '' }}>
                                                    <span class="selectgroup-button">Paket D</span>
                                                    <ul>
                                                        <li>Design 3D</li>
                                                        <li>Design Exterior (FASAD)</li>
                                                        <li>Lay Out</li>
                                                        <li>
                                                            <span class="badge text-bg-primary text-wrap">
                                                                Design Interior
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <span class="badge text-bg-primary text-wrap">
                                                                Rancangan Anggaran Biaya (RAB)
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <span class="badge text-bg-primary text-wrap">
                                                                Detail Engineering Design (DED)
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        @error('type')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-lg m-2">
                                Pesan Layanan
                            </button>
                        </div>
                    </form> --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
@endpush
