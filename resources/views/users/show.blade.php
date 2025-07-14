@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow rounded-4">
                <div class="card-header bg-white border-bottom">
                    <h4 class="mb-0">
                        <i class="bi bi-person-circle me-2"></i> Detail Pengguna
                    </h4>
                </div>

                <div class="card-body py-4 px-5">
                    <div class="mb-3">
                        <strong>ID:</strong> {{ $user->id }}
                    </div>
                    <div class="mb-3">
                        <strong>Nama:</strong> {{ $user->name }}
                    </div>
                    <div class="mb-3">
                        <strong>Email:</strong> {{ $user->email }}
                    </div>
                    <div class="mb-3">
                        <strong>Role:</strong>
                        <span class="badge bg-{{ $user->isAdmin() ? 'danger' : 'primary' }}">
                            {{ $user->role->name ?? 'No Role' }}
                        </span>
                    </div>
                    <div class="mb-4">
                        <strong>Tanggal Daftar:</strong> {{ $user->created_at->translatedFormat('d F Y') }}
                    </div>

                    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection