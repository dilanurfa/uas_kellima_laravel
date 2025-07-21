@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <h4 class="mb-4 fw-bold text-dark">✏️ Edit Data Ruangan</h4>

    <div class="card shadow-sm rounded-4 border-0">
        <div class="card-body px-5 py-4">
            <form action="{{ route('admin.Ruangan.update', $Ruangan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Ruangan</label>
                    <input type="text" name="nama_ruangan" class="form-control rounded-pill @error('nama_ruangan') is-invalid @enderror"
                        value="{{ old('nama_ruangan', $Ruangan->nama_ruangan) }}" placeholder="Nama Ruangan">
                    @error('nama_ruangan')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Harga</label>
                    <input type="number" name="harga" class="form-control rounded-pill @error('harga') is-invalid @enderror"
                        value="{{ old('harga', $Ruangan->harga) }}" placeholder="Harga">
                    @error('harga')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Durasi</label>
                    <input type="text" name="durasi" class="form-control rounded-pill @error('durasi') is-invalid @enderror"
                        value="{{ old('durasi', $Ruangan->durasi) }}" placeholder="Durasi sesi">
                    @error('durasi')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control rounded-3 @error('deskripsi') is-invalid @enderror"
                        rows="3" placeholder="Deskripsi">{{ old('deskripsi', $Ruangan->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Foto Saat Ini</label><br>
                    @if($Ruangan->foto)
                        <img src="{{ asset('storage/' . $Ruangan->foto) }}" class="rounded shadow-sm mb-2" width="150"><br>
                    @else
                        <span class="text-muted fst-italic">Tidak ada foto</span><br>
                    @endif
                    <input type="file" name="foto" class="form-control mt-2 rounded-pill">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.Ruangan.index') }}" class="btn btn-outline-danger rounded-pill px-4">
                        <i class="fas fa-times me-1"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-warning rounded-pill px-4">
                        <i class="fas fa-save me-1"></i> Perbarui
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
