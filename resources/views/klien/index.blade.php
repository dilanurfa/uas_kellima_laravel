@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container my-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Studio Tersedia</h4>
        </div>

        <div class="card-body">
            @if($Ruangan->count())
                <div class="row">
                    @foreach($Ruangan as $rgn)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 shadow-sm">
                                @if($rgn->foto)
                                    <img src="{{ asset('storage/' . $rgn->foto) }}" class="card-img-top" alt="{{ $rgn->nama_ruangan }}">
                                @else
                                    <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top" alt="Tidak ada gambar">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $rgn->nama_ruangan }}</h5>
                                    <p class="card-text text-muted">{{ $rgn->deskripsi ?? 'Tidak ada deskripsi.' }}</p>
                                    <p class="mb-1"><strong>Harga:</strong> Rp {{ number_format($rgn->harga, 0, ',', '.') }}</p>
                                    <p><strong>Durasi:</strong> {{ $rgn->durasi }}</p>
                                    <a href="{{ route('klien.booking', $rgn->id) }}" class="btn btn-outline-primary w-100">
                                        <i class="fas fa-calendar-check"></i>Booking
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
        </div>
    </div>
</div>
@endsection
