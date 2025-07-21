@extends('layouts.admin')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

<style>
    body {
        background-color: #f8f9fc;
    }
    .card {
        border: none;
        border-radius: 16px;
    }
    .form-floating > label {
        padding-left: 2.5rem;
    }
    .form-control::placeholder {
        color: #59626a;
    }
    .input-icon {
        position: absolute;
        top: 50%;
        left: 15px;
        transform: translateY(-50%);
        color: #82878a;
    }
    .form-floating .form-control {
        padding-left: 2.5rem;
    }
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-5">
            <div class="card shadow-lg">
                <div class="card-header bg-gradient-primary text-white rounded-top-3 d-flex justify-content-between align-items-center" style="background: linear-gradient(to right, #3b4048, #3b4048);">
                    <h5 class="mb-0"><i class="fas fa-user-plus me-2"></i> Tambah User</h5>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-light shadow-sm">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                </div>
                <div class="card-body px-4 py-4 bg-white rounded-bottom-3">

                    <form action="{{ route('admin.users.store') }}" method="POST">
                        @csrf

                        <div class="form-floating mb-3 position-relative">
                            <i class="fas fa-user input-icon"></i>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror"
                                   id="name"
                                   name="name"
                                   placeholder="Nama Lengkap"
                                   value="{{ old('name') }}">
                            <label for="name">Nama Lengkap</label>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-floating mb-3 position-relative">
                            <i class="fas fa-envelope input-icon"></i>
                            <input type="email" 
                                   class="form-control @error('email') is-invalid @enderror"
                                   id="email"
                                   name="email"
                                   placeholder="Email"
                                   value="{{ old('email') }}">
                            <label for="email">Alamat Email</label>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-floating mb-3 position-relative">
                            <i class="fas fa-lock input-icon"></i>
                            <input type="password" 
                                   class="form-control @error('password') is-invalid @enderror"
                                   id="password"
                                   name="password"
                                   placeholder="Password">
                            <label for="password">Password</label>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="role_id" class="form-label fw-semibold">Role <span class="text-danger">*</span></label>
                            <select class="form-select @error('role_id') is-invalid @enderror" name="role_id" id="role_id">
                                <option value="">-- Pilih Role --</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                        {{ $role->display_name ?? $role->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('role_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-1"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-primary shadow-sm">
                                <i class="fas fa-save me-1"></i> Simpan
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection