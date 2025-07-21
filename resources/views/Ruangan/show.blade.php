@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <h4 class="mb-4 fw-bold text-dark">🏠 Detail Ruangan</h4>

    <div class="card shadow-sm rounded-4 border-0">
        <div class="card-body px-5 py-4">
            <div class="row mb-3">
                <div class="col-md-4 fw-semibold text-muted">Nama Ruangan</div>
                <div class="col-md-8">{{ $Ruangan->nama_ruangan }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 fw-semibold text-muted">Harga</div>
                <div class="col-md-8">Rp {{ number_format($Ruangan->harga, 0, ',', '.') }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 fw-semibold text-muted">Durasi</div>
                <div class="col-md-8">
                    <span class="badge bg-info text-dark">{{ $Ruangan->durasi }}</span>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 fw-semibold text-muted">Deskripsi</div>
                <div class="col-md-8">{{ $Ruangan->deskripsi ?? '-' }}</div>
            </div>
            <div class="row">
                <div class="col-md-4 fw-semibold text-muted">Foto Ruangan</div>
                <div class="col-md-8">
                    @if($Ruangan->foto)
                        <img src="{{ asset('storage/' . $Ruangan->foto) }}" class="img-fluid rounded shadow" width="200">
                    @else
                        <span class="text-muted fst-italic">Tidak ada foto</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4 text-center">
        <a href="{{ route('admin.Ruangan.index') }}" class="btn btn-dark rounded-pill px-4">
            <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar Ruangan
        </a>
    </div>
</div>
@endsection
