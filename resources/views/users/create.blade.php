@extends('layouts.app')

@push('styles')
<style>
    body {
        background-color: #f4f8fb;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 51, 102, 0.1);
        background-color: #ffffff;
    }

    .card-header {
        background-color: #2c3e50;
        color: #ffffff;
        border-bottom: 2px solid #2980b9;
        border-radius: 10px 10px 0 0;
        padding: 15px 20px;
    }

    .card-title {
        font-weight: bold;
        font-size: 20px;
    }

    .btn-primary {
        background-color: #2980b9;
        border-color: #2980b9;
        color: #fff;
        transition: 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #1c5985;
        border-color: #1c5985;
    }

    .btn-secondary {
        background-color: #bdc3c7;
        border-color: #bdc3c7;
        color: #2c3e50;
    }

    input.form-control,
    select.form-control {
        border: 1px solid #ccd6dd;
        border-radius: 6px;
        padding: 10px;
        transition: border-color 0.3s;
    }

    input.form-control:focus,
    select.form-control:focus {
        border-color: #2980b9;
        box-shadow: 0 0 5px rgba(41, 128, 185, 0.5);
    }

    label {
        font-weight: 500;
        color: #34495e;
    }

    .text-danger {
        font-size: 0.875em;
    }
</style>
@endpush

@section('content')
<div class="container">
    <div class="card mt-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Tambah User</h3>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <div class="form-group my-2">
                    <label for="name">Nama <span class="text-danger">*</span></label>
                    <input type="text"
                           class="form-control @error('name') is-invalid @enderror"
                           name="name"
                           id="name"
                           value="{{ old('name') }}"
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
                           value="{{ old('email') }}"
                           placeholder="Masukan email">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <label for="password">Password <span class="text-danger">*</span></label>
                    <input type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           name="password"
                           id="password"
                           placeholder="Masukan password">
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <label for="role_id">Role <span class="text-danger">*</span></label>
                    <select name="role_id"
                            id="role_id"
                            class="form-control @error('role_id') is-invalid @enderror">
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
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
