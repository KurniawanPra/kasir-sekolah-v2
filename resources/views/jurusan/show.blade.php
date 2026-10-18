@extends('adminlte::page')

@section('title', 'Detail Jurusan')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="m-0 text-dark">Detail Jurusan</h1>
            <p class="text-muted mb-0">Informasi lengkap data jurusan <strong>{{ $jurusan->nama_jurusan }}</strong>.</p>
        </div>
        <ol class="breadcrumb float-sm-right mb-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('jurusan.index') }}">Jurusan</a></li>
            <li class="breadcrumb-item active">{{ $jurusan->kode_jurusan }}</li>
        </ol>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card card-outline card-info shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title"><i class="bi bi-info-circle me-2"></i> Informasi Program Keahlian</h3>
                    <div>
                        @if ($jurusan->status === 'aktif')
                            <span class="badge text-bg-success fs-6"><i class="bi bi-check-circle me-1"></i> Aktif</span>
                        @else
                            <span class="badge text-bg-secondary fs-6"><i class="bi bi-dash-circle me-1"></i> Tidak Aktif</span>
                        @endif
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th style="width: 200px;" class="bg-light">ID</th>
                                <td>#{{ $jurusan->id }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Kode Jurusan</th>
                                <td>
                                    <span class="badge text-bg-primary fs-6">{{ $jurusan->kode_jurusan }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light">Nama Jurusan</th>
                                <td class="fw-bold">{{ $jurusan->nama_jurusan }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Keterangan</th>
                                <td>
                                    @if($jurusan->keterangan)
                                        <p class="mb-0 text-break">{{ $jurusan->keterangan }}</p>
                                    @else
                                        <span class="text-muted fst-italic">Tidak ada keterangan.</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light">Status</th>
                                <td>
                                    @if ($jurusan->status === 'aktif')
                                        <span class="text-success fw-bold"><i class="bi bi-check-circle-fill me-1"></i> Aktif</span>
                                    @else
                                        <span class="text-secondary fw-bold"><i class="bi bi-dash-circle-fill me-1"></i> Tidak Aktif</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light">Dibuat Pada</th>
                                <td>{{ $jurusan->created_at ? $jurusan->created_at->format('d F Y - H:i') : '-' }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Terakhir Diperbarui</th>
                                <td>{{ $jurusan->updated_at ? $jurusan->updated_at->format('d F Y - H:i') : '-' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="card-footer bg-light d-flex justify-content-between">
                    <a href="{{ route('jurusan.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar
                    </a>
                    <div>
                        <a href="{{ route('jurusan.edit', $jurusan) }}" class="btn btn-warning text-white">
                            <i class="bi bi-pencil-square me-1"></i> Edit Data
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
