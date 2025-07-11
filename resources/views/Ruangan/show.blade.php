@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h4>Detail Data Ruangan</h4>
        </div>
        <div class="card-body">
            <p><strong>Nama Ruangan:</strong> {{ $Ruangan->nama_ruangan }}</p>
            <p><strong>Harga:</strong> Rp {{ number_format($Ruangan->harga, 0, ',', '.') }}</p>
            <p><strong>Durasi:</strong> {{ $Ruangan->durasi }}</p>
            <p><strong>Deskripsi:</strong> {{ $Ruangan->deskripsi ?? '-' }}</p>
            <p><strong>Foto:</strong><br>
                @if($Ruangan->foto)
                    <img src="{{ asset('storage/' . $Ruangan->foto) }}" width="200" class="img-thumbnail mt-2">
                @else
                    <span class="text-muted">Tidak ada foto</span>
                @endif
            </p>
            <p><strong>Tanggal Dibuat:</strong> 
                {{ $Ruangan->created_at->format('d/m/Y') }}
            </p>

            <a href="{{ route('admin.Ruangan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
