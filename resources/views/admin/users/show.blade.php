@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <h4 class="mb-4 fw-bold text-dark">👤 Detail Pengguna</h4>

    <div class="card shadow-sm rounded-4 border-0">
        <div class="card-body px-5 py-4">
            <div class="row mb-3">
                <div class="col-md-4 fw-semibold text-muted">ID</div>
                <div class="col-md-8">{{ $user->id }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 fw-semibold text-muted">Nama</div>
                <div class="col-md-8">{{ $user->name }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 fw-semibold text-muted">Email</div>
                <div class="col-md-8">{{ $user->email }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 fw-semibold text-muted">Role</div>
                <div class="col-md-8">
                    <span class="badge bg-secondary">{{ $user->role->name ?? 'No Role' }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 fw-semibold text-muted">Tanggal Daftar</div>
                <div class="col-md-8">{{ $user->created_at->translatedFormat('d F Y') }}</div>
            </div>
        </div>
    </div>

    <div class="mt-4 text-center">
        <a href="{{ route('admin.users.index') }}" class="btn btn-dark rounded-pill px-4">
            <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar User
        </a>
    </div>
</div>
@endsection
    