@extends('layouts.admin')

@section('content')
<div class="container my-4">
    <div class="card shadow border-0">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0"><i class="fas fa-plus me-2"></i> Tambah Ruangan</h4>
        </div>
        <div class="card-body bg-light">
            <form action="{{ route('admin.Ruangan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Ruangan</label>
                    <input type="text" name="nama_ruangan" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Harga</label>
                    <input type="number" name="harga" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Durasi</label>
                    <input type="text" name="durasi" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Foto</label>
                    <input type="file" name="foto" class="form-control">
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.Ruangan.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
