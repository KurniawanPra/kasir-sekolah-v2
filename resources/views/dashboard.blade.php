@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="m-0 text-dark">Dashboard</h1>
            <p class="text-muted mb-0">Selamat datang di Aplikasi Kasir Sekolah.</p>
        </div>
        <ol class="breadcrumb float-sm-right mb-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>
@stop

@section('content')
    {{-- Info boxes / stats row --}}
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box shadow-sm">
                <span class="info-box-icon text-bg-primary elevation-1"><i class="bi bi-mortarboard"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Jurusan</span>
                    <span class="info-box-number">{{ \App\Models\Jurusan::count() }}</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box shadow-sm">
                <span class="info-box-icon text-bg-success elevation-1"><i class="bi bi-check-circle"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Jurusan Aktif</span>
                    <span class="info-box-number">{{ \App\Models\Jurusan::where('status', 'aktif')->count() }}</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box shadow-sm">
                <span class="info-box-icon text-bg-warning elevation-1 text-white"><i class="bi bi-people"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Pengguna Terdaftar</span>
                    <span class="info-box-number">{{ \App\Models\User::count() }}</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box shadow-sm">
                <span class="info-box-icon text-bg-info elevation-1"><i class="bi bi-cash-stack"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Status Kasir</span>
                    <span class="info-box-number">Aktif</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Welcome Card --}}
    <div class="card card-outline card-primary shadow-sm">
        <div class="card-header">
            <h3 class="card-title"><i class="bi bi-speedometer2 me-2"></i> Panel Utama Kasir Sekolah</h3>
        </div>
        <div class="card-body">
            <h5>Selamat datang kembali, <strong>{{ Auth::user()->name ?? 'Administrator' }}</strong>!</h5>
            <p class="text-muted">
                Sistem Informasi Kasir Sekolah ini dirancang untuk memudahkan administrasi keuangan, manajemen data jurusan, siswa, dan transaksi pembayaran sekolah secara efisien.
            </p>
            <div class="mt-4">
                <a href="{{ route('jurusan.index') }}" class="btn btn-outline-primary me-2">
                    <i class="bi bi-mortarboard me-1"></i> Kelola Data Jurusan
                </a>
                <a href="{{ route('profile.edit') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-person-circle me-1"></i> Pengaturan Akun
                </a>
            </div>
        </div>
    </div>
@stop
