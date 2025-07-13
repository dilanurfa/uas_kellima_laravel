@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Detail User: {{ $user->name }}</h5>
        </div>
        <div class="card-body bg-light">
            <dl class="row">
                <dt class="col-sm-3">Nama</dt>
                <dd class="col-sm-9">{{ $user->name }}</dd>

                <dt class="col-sm-3">Email</dt>
                <dd class="col-sm-9">{{ $user->email }}</dd>

                <dt class="col-sm-3">Role</dt>
                <dd class="col-sm-9">
                    <span class="badge bg-{{ $user->isAdmin() ? 'danger' : 'primary' }}">
                        {{ $user->role->name ?? 'No Role' }}
                    </span>
                </dd>

                <dt class="col-sm-3">Tanggal Daftar</dt>
                <dd class="col-sm-9">{{ $user->created_at->format('d M Y') }}</dd>
            </dl>

            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>
@endsection
