@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Edit Ruangan</h3>
            <a href="{{ route('Ruangan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('Ruangan.update', $ruangan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Nama Ruangan --}}
                <div class="form-group my-2">
                    <label for="nama_ruangan">Nama Ruangan <span class="text-danger">*</span></label>
                    <input type="text" 
                           name="nama_ruangan" 
                           id="nama_ruangan" 
                           class="form-control @error('nama_ruangan') is-invalid @enderror"
                           value="{{ old('nama_ruangan', $ruangan->nama_ruangan) }}"
                           placeholder="Masukkan nama ruangan">
                    @error('nama_ruangan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Harga --}}
                <div class="form-group my-2">
                    <label for="harga">Harga <span class="text-danger">*</span></label>
                    <input type="number" 
                           name="harga" 
                           id="harga" 
                           class="form-control @error('harga') is-invalid @enderror"
                           value="{{ old('harga', $ruangan->harga) }}"
                           placeholder="Masukkan harga">
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
                           value="{{ old('durasi', $ruangan->durasi) }}"
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
                              rows="3">{{ old('deskripsi', $ruangan->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Foto Lama --}}
                <div class="form-group my-3">
                    <label>Foto Lama</label><br>
                    @if($ruangan->foto)
                        <img src="{{ asset('storage/' . $ruangan->foto) }}" class="img-thumbnail mb-2" width="150">
                    @else
                        <p class="text-muted">Belum ada foto</p>
                    @endif
                </div>

                {{-- Ganti Foto --}}
                <div class="form-group my-2">
                    <label for="foto">Ganti Foto (opsional)</label>
                    <input type="file" 
                           name="foto" 
                           id="foto" 
                           class="form-control @error('foto') is-invalid @enderror">
                    @error('foto')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <small class="text-muted">Hanya JPG/PNG, max 2MB</small>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('Ruangan.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
