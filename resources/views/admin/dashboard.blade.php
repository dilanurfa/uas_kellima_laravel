@extends('layouts.app')

@section('content')
<div class="container-fluid py-5" style="background-color: #f0f0f0;">
    <div class="text-center mb-5">
        <h2 class="fw-bold" style="color: #222;">Selamat Datang, {{ Auth::user()->name }}!</h2>
        <p class="text-muted">Anda masuk sebagai <strong>Administrator</strong>. Silakan pilih menu berikut untuk mengelola sistem.</p>
    </div>

    <div class="container">
        <div class="row g-4 justify-content-center">

            <div class="col-md-4 col-lg-3">
                <div class="card h-100 text-center border-0 shadow feature-card bg-white">
                    <div class="card-body">
                        <div class="icon-circle mb-4">
                            <i class="fas fa-users fa-2x text-dark"></i>
                        </div>
                        <h5 class="fw-bold text-dark">Manajemen User</h5>
                        <p class="text-muted small">Kelola data pengguna sistem.</p>
                        <a href="{{ route('users.index') }}" class="btn btn-dark btn-sm px-4 rounded-pill">Kelola User</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-3">
                <div class="card h-100 text-center border-0 shadow feature-card bg-white">
                    <div class="card-body">
                        <div class="icon-circle mb-4">
                            <i class="fas fa-door-open fa-2x text-dark"></i>
                        </div>
                        <h5 class="fw-bold text-dark">Manajemen Ruangan</h5>
                        <p class="text-muted small">Kelola data studio/ruangan.</p>
                        <a href="{{ route('Ruangan.index') }}" class="btn btn-dark btn-sm px-4 rounded-pill">Kelola Ruangan</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-3">
                <div class="card h-100 text-center border-0 shadow feature-card bg-white">
                    <div class="card-body">
                        <div class="icon-circle mb-4">
                            <i class="fas fa-calendar-check fa-2x text-dark"></i>
                        </div>
                        <h5 class="fw-bold text-dark">Daftar Booking</h5>
                        <p class="text-muted small">Lihat semua pemesanan studio.</p>
                        <a href="{{ route('admin.booking') }}" class="btn btn-dark btn-sm px-4 rounded-pill">Lihat Booking</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background-color: #f0f0f0;
    }
    .icon-circle {
        width: 70px;
        height: 70px;
        overflow: hidden;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background-color: #fff;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .feature-card:hover {
        transform: translateY(-5px);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }
    .btn-dark {
        background-color: #333;
        border: none;
    }
    .btn-dark:hover {
        background-color: #000;
        color: #fff;
    }
</style>
@endsection
