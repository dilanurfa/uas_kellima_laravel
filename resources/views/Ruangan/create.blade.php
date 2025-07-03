@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Tambah Ruangan Studio</h3>
            <a href="{{ route('Ruangan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('Ruangan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Nama Ruangan --}}
                <div class="form-group my-2">
                    <label for="nama_ruangan">Nama Ruangan <span class="text-danger">*</span></label>
                    <input type="text" 
                           name="nama_ruangan" 
                           id="nama_ruangan" 
                           class="form-control @error('nama_ruangan') is-invalid @enderror" 
                           value="{{ old('nama_ruangan') }}" 
                           placeholder="Masukkan nama ruangan" 
                           autofocus>
                    @error('nama_ruangan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Harga --}}
                <div class="form-group my-2">
                    <label for="harga">Harga (Rp) <span class="text-danger">*</span></label>
                    <input type="number" 
                           name="harga" 
                           id="harga" 
                           class="form-control @error('harga') is-invalid @enderror" 
                           value="{{ old('harga') }}" 
                           placeholder="Contoh: 50000">
                    @error('harga')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Durasi --}}
                <div class="form-group my-2">
                    <label for="durasi">Durasi <span class="text-danger">*</span></label>
                    <input type="text" 
                           name="durasi" 
                           id="durasi" 
                           class="form-control @error('durasi') is-invalid @enderror" 
                           value="{{ old('durasi') }}" 
                           placeholder="Contoh: 2 jam">
                    @error('durasi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Deskripsi --}}
                <div class="form-group my-2">
                    <label for="deskripsi">Deskripsi <span class="text-danger">*</span></label>
                    <textarea name="deskripsi" 
                              id="deskripsi" 
                              class="form-control @error('deskripsi') is-invalid @enderror" 
                              rows="3"
                              placeholder="Keterangan ruangan">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Foto --}}
                <div class="form-group my-2">
                    <label for="foto">Foto Ruangan <span class="text-danger">*</span></label>
                    <input type="file" 
                           name="foto" 
                           id="foto" 
                           class="form-control @error('foto') is-invalid @enderror">
                    @error('foto')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <small class="text-muted">Format: JPG, PNG | Maks: 2MB</small>
                </div>

                {{-- Tombol --}}
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('Ruangan.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan Ruangan
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
