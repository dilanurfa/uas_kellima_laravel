@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <h4 class="mb-4 fw-bold text-dark">✏️ Edit Data Pengguna</h4>

    <div class="card shadow-sm rounded-4 border-0">
        <div class="card-body px-5 py-4">
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Nama</label>
                    <input type="text" name="name" class="form-control rounded-pill @error('name') is-invalid @enderror"
                        value="{{ old('name', $user->name) }}" placeholder="Nama lengkap">
                    @error('name')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control rounded-pill @error('email') is-invalid @enderror"
                        value="{{ old('email', $user->email) }}" placeholder="Alamat email">
                    @error('email')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="role_id" class="form-label fw-semibold">Role</label>
                    <select name="role_id" class="form-select rounded-pill @error('role_id') is-invalid @enderror">
                        <option value="">-- Pilih Role --</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}>
                                {{ $role->display_name ?? $role->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('role_id')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-danger rounded-pill px-4">
                        <i class="fas fa-times me-1"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-success rounded-pill px-4">
                        <i class="fas fa-save me-1"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
