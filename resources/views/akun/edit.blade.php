@extends('layouts.app')

@section('content')
<!-- Tambahkan style gradasi + splash -->
<style>
    body {
        background: radial-gradient(circle at top left, #74cdd9 0%, transparent 40%),
                    radial-gradient(circle at bottom right, #ffffff 0%, transparent 40%),
                    radial-gradient(circle at center, #a5d8f3 0%, transparent 50%),
                    linear-gradient(135deg, #3598bf, rgb(184, 227, 255));
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    .card.custom-card {
        backdrop-filter: blur(6px);
        background: rgb(168, 220, 255);
        border-radius: 20px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        border: none;
        padding: 5%;
        width: 100%;

    }

    .card-header h3 {
        font-weight: 600;
        color: #145DA0;
    }

    .btn-primary {
        background-color: #1b7ab5;
        border-color: #1b7ab5;
    }

    .btn-primary:hover {
        background-color: #155e8a;
        border-color: #155e8a;
    }

    .form-label {
        font-weight: 600;
    }
</style>

<div class="container pt-5 mt-4" style="max-width: 600px;">
    <div class="card custom-card shadow">
        <div class="card-header bg-transparent text-center">
            <h3>Edit Profil</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('akun.update') }}" method="POST">
                @csrf

                {{-- Nama --}}
                <div class="mb-3">
                    <label for="name" class="form-label">Nama <span class="text-danger">*</span></label>
                    <input type="text"
                           class="form-control @error('name') is-invalid @enderror"
                           name="name"
                           id="name"
                           value="{{ old('name', $user->name) }}"
                           placeholder="Masukkan nama">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email"
                           class="form-control @error('email') is-invalid @enderror"
                           name="email"
                           id="email"
                           value="{{ old('email', $user->email) }}"
                           placeholder="Masukkan email">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <hr class="my-4">
                <h6 class="fw-semibold mb-3">Ganti Password?</h6>

                {{-- Password Baru --}}
                <div class="mb-3">
                    <label for="password" class="form-label">Password Baru</label>
                    <input type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           name="password"
                           id="password"
                           autocomplete="new-password"
                           placeholder="Masukkan password baru">
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Konfirmasi Password --}}
                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input type="password"
                           class="form-control"
                           name="password_confirmation"
                           id="password_confirmation"
                           autocomplete="new-password"
                           placeholder="Konfirmasi password baru">
                </div>

                {{-- Tombol --}}
                <div class="d-flex justify-content-between">
                    <a href="{{ route('akun.show') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
