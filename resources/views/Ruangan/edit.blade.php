@extends('layouts.admin')

@section('content')
<div class="container my-4">
    <div class="card shadow border-0">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0"><i class="fas fa-edit me-2"></i> Edit Ruangan</h4>
        </div>
        <div class="card-body bg-light">
            <form action="{{ route('admin.Ruangan.update', $Ruangan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Ruangan</label>
                    <input type="text" name="nama_ruangan" class="form-control" value="{{ $Ruangan->nama_ruangan }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Harga</label>
                    <input type="number" name="harga" class="form-control" value="{{ $Ruangan->harga }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Durasi</label>
                    <input type="text" name="durasi" class="form-control" value="{{ $Ruangan->durasi }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3">{{ $Ruangan->deskripsi }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Foto Saat Ini</label><br>
                    @if($Ruangan->foto)
                        <img src="{{ asset('storage/' . $Ruangan->foto) }}" class="rounded shadow mb-2" width="120"><br>
                    @else
                        <span class="text-muted fst-italic">Tidak ada foto</span><br>
                    @endif
                    <input type="file" name="foto" class="form-control mt-2">
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.Ruangan.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save me-1"></i> Perbarui
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
