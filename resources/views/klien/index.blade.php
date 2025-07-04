@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container-fluid py-5" style="background-color: #f0f0f0;">
    <div class="text-center mb-5">
        <h2 class="fw-bold" style="color: #222;">Studio Tersedia</h2>
        <p class="text-muted">Pilih studio favorit Anda dan lakukan pemesanan sekarang.</p>
    </div>

    <div class="container">
        @if($Ruangan->count())
            <div class="row g-4">
                @foreach($Ruangan as $rgn)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card h-100 border-0 shadow-sm feature-card bg-white">
                            @if($rgn->foto)
                                <img src="{{ asset('storage/' . $rgn->foto) }}" class="card-img-top" alt="{{ $rgn->nama_ruangan }}" style="object-fit: cover; height: 180px;">
                            @else
                                <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top" alt="Tidak ada gambar" style="object-fit: cover; height: 180px;">
                            @endif
                            <div class="card-body text-center">
                                <h5 class="card-title text-dark">{{ $rgn->nama_ruangan }}</h5>
                                <p class="card-text text-muted small">{{ $rgn->deskripsi ?? 'Tidak ada deskripsi.' }}</p>
                                <p class="mb-1 text-dark"><strong>Harga:</strong> Rp {{ number_format($rgn->harga, 0, ',', '.') }}</p>
                                <p class="text-dark"><strong>Durasi:</strong> {{ $rgn->durasi }}</p>
                                <a href="{{ route('klien.booking', $rgn->id) }}" class="btn btn-dark w-100 rounded-pill">
                                    <i class="fas fa-calendar-check"></i> Booking
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-music fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">Belum ada studio tersedia saat ini</h5>
            </div>
        @endif

        <div class="mt-5">
            <a href="{{ route('klien.dashboard') }}" class="btn btn-dark rounded-pill px-4">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
        </div>
    </div>
</div>

<style>
    body {
        background-color: #f0f0f0;
    }
    .card {
        border-radius: 10px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card-img-top {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }
    .card:hover {
        transform: translateY(-5px);
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
