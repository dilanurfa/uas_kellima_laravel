@extends('layouts.app')

@section('content')
<div class="container-fluid py-5" style="background-color: #f0f0f0;">
    <div class="text-center mb-5">
        <h2 class="fw-bold" style="color: #222;">Selamat Datang, {{ Auth::user()->name }}!</h2>
        <p class="text-muted">Silakan pilih menu berikut untuk melanjutkan aktivitas Anda.</p>
    </div>

    <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-md-4 col-lg-3">
                <div class="card h-100 text-center border-0 shadow feature-card bg-white">
                    <div class="card-body">
                        <div class="icon-circle mb-4">
                            <img src="https://i.pinimg.com/736x/38/1f/69/381f694e2ca328fce9a9a6dede117763.jpg" alt="Booking Studio" class="img-fluid rounded-circle" style="width:70px; height:70px; object-fit:cover;">
                        </div>
                        <h5 class="fw-bold text-dark">Booking Studio</h5>
                        <p class="text-muted small">Pesan studio dengan cepat dan mudah.</p>
                        <a href="{{ route('klien.index') }}" class="btn btn-dark btn-sm px-4 rounded-pill">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-3">
                <div class="card h-100 text-center border-0 shadow feature-card bg-white">
                    <div class="card-body">
                        <div class="icon-circle mb-4">
                            <img src="https://media.istockphoto.com/id/1673792134/pt/vetorial/order-list-doodle-icon-design-illustration-logistics-and-delivery-symbol-on-white.jpg?s=170667a&w=0&k=20&c=xooENKKDMruaVUFYL_FDRFxc0ew25Zj2VIj2KOyCYCI=" alt="Riwayat Pemesanan" class="img-fluid rounded-circle" style="width:70px; height:70px; object-fit:cover;">
                        </div>
                        <h5 class="fw-bold text-dark">Riwayat Pemesanan</h5>
                        <p class="text-muted small">Cek histori pemesanan studio Anda.</p>
                        <a href="{{ route('klien.riwayat') }}" class="btn btn-outline-dark btn-sm px-4 rounded-pill">Lihat Riwayat</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-3">
                <div class="card h-100 text-center border-0 shadow feature-card bg-white">
                    <div class="card-body">
                        <div class="icon-circle mb-4">
                            <img src="https://static.vecteezy.com/system/resources/previews/005/544/718/original/profile-icon-design-free-vector.jpg" alt="Akun Saya" class="img-fluid rounded-circle" style="width:70px; height:70px; object-fit:cover;">
                        </div>
                        <h5 class="fw-bold text-dark">Akun Saya</h5>
                        <p class="text-muted small">Lihat dan edit informasi akun Anda.</p>
                        <a href="{{ route('akun.show') }}" class="btn btn-dark btn-sm px-4 rounded-pill">Lihat Akun</a>
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
    .btn-outline-dark:hover {
        background-color: #333;
        color: #fff;
    }
</style>
@endsection
