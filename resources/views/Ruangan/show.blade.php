@extends('layouts.admin')

@section('content')
<div class="container my-4">
    <div class="card shadow border-0">
        <div class="card-header bg-dark text-white d-flex justify-content-between">
            <h4 class="mb-0"><i class="fas fa-eye me-2"></i> Detail Ruangan</h4>
            <a href="{{ route('admin.Ruangan.index') }}" class="btn btn-light btn-sm">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
        <div class="card-body bg-light">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="fw-bold text-dark">Nama Ruangan</h5>
                    <p>{{ $Ruangan->nama_ruangan }}</p>

                    <h5 class="fw-bold text-dark">Harga</h5>
                    <p>Rp {{ number_format($Ruangan->harga, 0, ',', '.') }}</p>

                    <h5 class="fw-bold text-dark">Durasi</h5>
                    <p><span class="badge bg-info text-dark">{{ $Ruangan->durasi }}</span></p>

                    <h5 class="fw-bold text-dark mt-3">Deskripsi</h5>
                    <p>{{ $Ruangan->deskripsi ?? '-' }}</p>
                </div>
                <div class="col-md-6 text-center">
                    <h5 class="fw-bold text-dark">Foto Ruangan</h5>
                    @if($Ruangan->foto)
                        <img src="{{ asset('storage/' . $Ruangan->foto) }}" class="img-fluid rounded shadow" width="300">
                    @else
                        <p class="text-muted fst-italic">Tidak ada foto</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
