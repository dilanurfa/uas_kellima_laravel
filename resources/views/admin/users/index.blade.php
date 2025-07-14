@extends('layouts.admin')

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500;600&display=swap" rel="stylesheet">

@section('content')
<style>
    body {
        font-family: 'Quicksand', sans-serif;
        background-color: #b4c6dc;
    }

    .table th, .table td {
        vertical-align: middle;
    }

    .table thead th {
        background-color: #e8edf4;
        color: #2e3c55;
        font-weight: 600;
    }

    .card-header {
        background-color: #cad9ec !important;
        border-bottom: 1px solid #b9cbe0;
    }

    .card-header h5 {
        font-size: 1.25rem;
        font-weight: 600;
        color: #2c3e50;
        display: flex;
        align-items: center;
    }

    .card-footer {
        background-color: #f7f9fc;
    }

    .badge {
        font-size: 0.85rem;
        padding: 5px 10px;
        border-radius: 20px;
    }

    .highlighted {
        background-color: #fef3c7 !important;
        transition: background-color 0.3s ease;
    }

    select.form-select-sm,
    .input-group-sm .form-control,
    .input-group-sm .btn,
    .btn-sm {
        height: 30px !important;
        padding-top: 4px;
        padding-bottom: 4px;
        font-size: 0.875rem;
    }
</style>

<div class="container py-4">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-header">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-2">
                <h5 class="mb-0 d-flex align-items-center">
                    <i class="fas fa-users me-2 text-dark"></i> Manajemen Users
                </h5>

                <div class="d-flex flex-wrap align-items-center gap-2">
                    {{-- Form Pencarian dan Filter --}}
                    <form action="{{ route('admin.users.index') }}" method="GET" class="d-flex align-items-center gap-2 flex-wrap">
                        {{-- Filter Role --}}
                        <select name="role" class="form-select form-select-sm" style="width: auto;">
                            <option value="">Semua Role</option>
                            <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="user" {{ request('role') == 'user' ? 'selected' : '' }}>User</option>
                        </select>

                        {{-- Search --}}
                        <div class="input-group input-group-sm" style="width: 200px;">
                            <input type="text" name="search" class="form-control"
                                   placeholder="Cari nama..." value="{{ request('search') }}">
                            <button class="btn btn-outline-secondary" type="submit" title="Cari">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>

                        @if(request()->has('search') || request()->has('role'))
                            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-danger btn-sm" title="Reset">
                                <i class="fas fa-times"></i>
                            </a>
                        @endif
                    </form>

                    <a href="{{ route('admin.users.create') }}" class="btn btn-light btn-sm shadow-sm d-flex align-items-center" style="height: 30px;">
                        <i class="fas fa-plus me-1"></i> Tambah User
                    </a>
                </div>
            </div>
        </div>

        {{-- Table --}}
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center align-middle mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Terdaftar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                        <tr class="{{ request('search') && stripos($user->name, request('search')) !== false ? 'highlighted' : '' }}">
                            <td>{{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}</td>
                            <td class="text-start">{{ $user->name }}</td>
                            <td class="text-start">{{ $user->email }}</td>
                            <td>
                                <span class="badge bg-{{ $user->isAdmin() ? 'danger' : 'secondary' }}">
                                    {{ $user->role->name ?? 'No Role' }}
                                </span>
                            </td>
                            <td>{{ $user->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('admin.users.show', $user) }}" class="btn btn-sm btn-outline-info" title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-outline-primary" title="Edit User">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @if($user->id !== auth()->id())
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Yakin ingin menghapus user ini?')" title="Hapus User">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @empty
                            @if(request('search'))
                                <tr>
                                    <td colspan="6">
                                        <div class="alert alert-warning d-flex align-items-center justify-content-center mb-0" role="alert">
                                            <i class="fas fa-exclamation-triangle me-2"></i>
                                            Data tidak ditemukan untuk pencarian: <strong class="ms-1">{{ request('search') }}</strong>
                                        </div>
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="6" class="text-muted py-3">Tidak ada data user tersedia.</td>
                                </tr>
                            @endif
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Pagination --}}
        <div class="card-footer">
            <div class="d-flex justify-content-center">
                {{ $users->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const highlighted = document.querySelector('.highlighted');
        if (highlighted) {
            highlighted.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    });
</script>
@endsection