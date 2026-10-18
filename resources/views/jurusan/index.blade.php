@extends('adminlte::page')

@section('title', 'Data Jurusan')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="m-0 text-dark">Data Jurusan</h1>
            <p class="text-muted mb-0">Kelola daftar jurusan dan program keahlian sekolah.</p>
        </div>
        <ol class="breadcrumb float-sm-right mb-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Jurusan</li>
        </ol>
    </div>
@stop

@section('content')
    {{-- Flash Notifications --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card card-outline card-primary shadow-sm">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-md-6 mb-2 mb-md-0">
                    <a href="{{ route('jurusan.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-1"></i> Tambah Jurusan
                    </a>
                </div>
                <div class="col-md-6">
                    <form method="GET" action="{{ route('jurusan.index') }}" class="d-flex justify-content-md-end">
                        <div class="input-group" style="max-width: 320px;">
                            <input type="text" name="search" class="form-control" placeholder="Cari kode atau nama..." value="{{ $search ?? '' }}">
                            <button class="btn btn-outline-secondary" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                            @if(!empty($search))
                                <a href="{{ route('jurusan.index') }}" class="btn btn-outline-danger" title="Reset pencarian">
                                    <i class="bi bi-x-lg"></i>
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 60px;" class="text-center">No</th>
                            <th style="width: 140px;">Kode Jurusan</th>
                            <th>Nama Jurusan</th>
                            <th>Keterangan</th>
                            <th style="width: 130px;" class="text-center">Status</th>
                            <th style="width: 160px;" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jurusans as $index => $jurusan)
                            <tr>
                                <td class="text-center fw-bold text-muted">
                                    {{ $jurusans->firstItem() + $index }}
                                </td>
                                <td>
                                    <span class="badge text-bg-primary fs-6">{{ $jurusan->kode_jurusan }}</span>
                                </td>
                                <td class="fw-semibold">
                                    {{ $jurusan->nama_jurusan }}
                                </td>
                                <td>
                                    @if($jurusan->keterangan)
                                        <span class="text-muted small">{{ Str::limit($jurusan->keterangan, 60) }}</span>
                                    @else
                                        <span class="text-muted fst-italic small">-</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($jurusan->status === 'aktif')
                                        <span class="badge text-bg-success"><i class="bi bi-check-circle me-1"></i> Aktif</span>
                                    @else
                                        <span class="badge text-bg-secondary"><i class="bi bi-dash-circle me-1"></i> Tidak Aktif</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('jurusan.show', $jurusan) }}" class="btn btn-info text-white" title="Lihat Detail">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('jurusan.edit', $jurusan) }}" class="btn btn-warning text-white" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger" title="Hapus" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $jurusan->id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>

                                    {{-- Delete Modal Confirmation --}}
                                    <div class="modal fade" id="deleteModal{{ $jurusan->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $jurusan->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $jurusan->id }}">
                                                        <i class="bi bi-exclamation-triangle-fill me-2"></i> Konfirmasi Hapus
                                                    </h5>
                                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-start">
                                                    Apakah Anda yakin ingin menghapus data jurusan <strong>{{ $jurusan->nama_jurusan }}</strong> ({{ $jurusan->kode_jurusan }})?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('jurusan.destroy', $jurusan) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Hapus Jurusan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <div class="text-muted">
                                        <i class="bi bi-folder2-open display-4"></i>
                                        <p class="mt-2 mb-0">Belum ada data jurusan yang tersedia.</p>
                                        @if(!empty($search))
                                            <a href="{{ route('jurusan.index') }}" class="btn btn-sm btn-outline-primary mt-2">Reset Pencarian</a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if ($jurusans->hasPages())
            <div class="card-footer clearfix bg-white">
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <div class="text-muted small">
                        Menampilkan {{ $jurusans->firstItem() }} sampai {{ $jurusans->lastItem() }} dari total {{ $jurusans->total() }} jurusan
                    </div>
                    <div>
                        {{ $jurusans->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        @endif
    </div>
@stop
