@extends('layouts.admin')

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500;600&display=swap" rel="stylesheet">

@section('content')
<style>
    body {
        font-family: 'Quicksand', sans-serif;
        background-color: #2c2c2c; 
        color: #dcdcdc; 
    }

    .table {
        color: #dcdcdc;
        border-color: #555;
    }

    .table th, .table td {
        vertical-align: middle;
        border-color: #555; 
    }

    .table thead th {
        background-color: #3d3d3d; 
        color: #f0f0f0; 
        font-weight: 500;
    }

    .table tbody tr:hover {
        background-color: #3a3a3a;
    }

    .card {
        background-color: #353535;
        color: #dcdcdc;
    }

    .card-header {
        background-color: #3f3f3f !important;
        border-bottom: 1px solid #555;
    }

    .badge {
        font-size: 0.85rem;
        padding: 3px 10px;
        border-radius: 20px;
    }


    .btn-outline-info {
        color: #3498db;
        border-color: #3498db;
    }

    .btn-outline-primary {
        color: #9b59b6;
        border-color: #9b59b6;
    }

    .btn-outline-danger {
        color: #e74c3c;
        border-color: #e74c3c;
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

                    <a href="{{ route('admin.users.create') }}" class="btn btn-light btn-sm shadow-sm d-flex align-items-center" style="height: 30px;">
                        <i class="fas fa-plus me-1"></i> Tambah User
                    </a>
                </div>
            </div>
        </div>

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