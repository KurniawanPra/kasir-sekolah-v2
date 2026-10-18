@extends('adminlte::page')

@section('title', 'Tambah Jurusan')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="m-0 text-dark">Tambah Jurusan</h1>
            <p class="text-muted mb-0">Formulir pendaftaran program keahlian baru.</p>
        </div>
        <ol class="breadcrumb float-sm-right mb-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('jurusan.index') }}">Jurusan</a></li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card card-outline card-primary shadow-sm">
                <div class="card-header">
                    <h3 class="card-title"><i class="bi bi-pencil-square me-2"></i> Data Jurusan Baru</h3>
                </div>

                <form action="{{ route('jurusan.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        {{-- Kode Jurusan --}}
                        <div class="mb-3">
                            <label for="kode_jurusan" class="form-label fw-bold">Kode Jurusan <span class="text-danger">*</span></label>
                            <input type="text"
                                class="form-control @error('kode_jurusan') is-invalid @enderror"
                                id="kode_jurusan"
                                name="kode_jurusan"
                                value="{{ old('kode_jurusan') }}"
                                placeholder="Contoh: RPL, TKJ, AKL"
                                maxlength="50"
                                required>
                            @error('kode_jurusan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Kode unik pengenal jurusan.</div>
                        </div>

                        {{-- Nama Jurusan --}}
                        <div class="mb-3">
                            <label for="nama_jurusan" class="form-label fw-bold">Nama Jurusan <span class="text-danger">*</span></label>
                            <input type="text"
                                class="form-control @error('nama_jurusan') is-invalid @enderror"
                                id="nama_jurusan"
                                name="nama_jurusan"
                                value="{{ old('nama_jurusan') }}"
                                placeholder="Contoh: Rekayasa Perangkat Lunak"
                                required>
                            @error('nama_jurusan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Keterangan --}}
                        <div class="mb-3">
                            <label for="keterangan" class="form-label fw-bold">Keterangan</label>
                            <textarea
                                class="form-control @error('keterangan') is-invalid @enderror"
                                id="keterangan"
                                name="keterangan"
                                rows="4"
                                placeholder="Deskripsi atau keterangan jurusan...">{{ old('keterangan') }}</textarea>
                            @error('keterangan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Status --}}
                        <div class="mb-3">
                            <label for="status" class="form-label fw-bold">Status <span class="text-danger">*</span></label>
                            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                <option value="aktif" {{ old('status', 'aktif') === 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="tidak aktif" {{ old('status') === 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer bg-light d-flex justify-content-between">
                        <a href="{{ route('jurusan.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-1"></i> Simpan Jurusan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
