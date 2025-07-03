@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h4>Detail User</h4>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $user->id }}</p>
            <p><strong>Nama:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Role:</strong> 
                <span class="badge bg-{{ $user->isAdmin() ? 'danger' : 'primary' }}">
                    {{ $user->role->name ?? 'No Role' }}
                </span>
            </p>
            <p><strong>Tanggal Daftar:</strong> {{ $user->created_at->translatedFormat('d F Y') }}</p>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
