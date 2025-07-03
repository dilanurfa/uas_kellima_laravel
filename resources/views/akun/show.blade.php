@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">

            @if (session('success'))
                <div class="alert d-flex justify-content-between align-items-center bg-dark text-white border-0 rounded-3 shadow-sm px-4 py-3 mb-4 animate__animated animate__fadeInDown"
                     role="alert" style="font-size: 0.95rem;">
                    <div class="d-flex align-items-center gap-3">
                        <i class="fas fa-circle-check text-success fa-lg"></i>
                        <div>{{ session('success') }}</div>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card border-0 shadow rounded-4 overflow-hidden">
                <div class="row g-0">

                    <div class="col-md-5 bg-light p-4 text-center d-flex flex-column align-items-center justify-content-center">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=343a40&color=fff&size=120"
                             class="rounded-circle shadow-sm mb-3"
                             alt="Avatar" width="110" height="110">
                        <h4 class="mb-0">{{ $user->name }}</h4>
                        <small class="text-muted">{{ $user->email }}</small>

                        <div class="mt-4">
                            <span class="badge bg-secondary px-3 py-2">
                                {{ $user->role->name ?? 'Tidak ada Role' }}
                            </span>
                        </div>
                    </div>

                    <div class="col-md-7 p-4">
                        <h5 class="mb-4 fw-semibold border-bottom pb-2">Profile</h5>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama</label>
                            <div class="text-muted">{{ $user->name }}</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Email</label>
                            <div class="text-muted">{{ $user->email }}</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Tanggal Daftar</label>
                            <div class="text-muted">
                                {{ \Carbon\Carbon::parse($user->created_at)->translatedFormat('d F Y') }}
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <a href="{{ route('akun.edit') }}" class="btn btn-dark">
                                <i class="fas fa-user-edit me-1"></i> Edit Profil
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
