@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Edit Profil</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('akun.update') }}" method="POST">
                @csrf

                <div class="form-group my-2">
                    <label for="name">Nama <span class="text-danger">*</span></label>
                    <input type="text"
                           class="form-control @error('name') is-invalid @enderror"
                           name="name"
                           id="name"
                           value="{{ old('name', $user->name) }}"
                           placeholder="Masukan nama">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <input type="email"
                           class="form-control @error('email') is-invalid @enderror"
                           name="email"
                           id="email"
                           value="{{ old('email', $user->email) }}"
                           placeholder="Masukan email">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <hr class="my-4">
                <h6 class="fw-semibold">Ganti Password?</h6>

                <div class="form-group my-2">
                    <label for="password">Password Baru</label>
                    <input type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           name="password"
                           id="password"
                           autocomplete="new-password"
                           placeholder="Masukan password baru">
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password"
                           class="form-control"
                           name="password_confirmation"
                           id="password_confirmation"
                           autocomplete="new-password"
                           placeholder="Konfirmasi password baru">
                </div>

<div class="d-flex justify-content-between mt-4">
    <a href="{{ route('akun.show') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-1"></i> Batal
    </a>
    <button type="submit" class="btn bg-dark text-white">
        <i class="fas fa-save me-1"></i> Simpan
    </button>
</div>

                </div>

            </form>
        </div>
    </div>
</div>
@endsection
