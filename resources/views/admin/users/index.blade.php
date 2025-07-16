@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <h2 class="mb-4 fw-bold text-dark">👤 Manajemen User</h2>

    @if(session('success'))
        <div class="alert alert-success text-center rounded-pill shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive shadow-sm rounded-4 overflow-hidden">
        <table class="table table-hover table-striped align-middle table-borderless mb-0">
            <thead class="bg-dark text-white text-center">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Terdaftar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @forelse($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <span class="badge bg-{{ $user->isAdmin() ? 'danger' : 'secondary' }}">
                                {{ $user->role->name ?? '-' }}
                            </span>
                        </td>
                        <td>{{ $user->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('admin.users.show', $user) }}" class="btn btn-outline-primary btn-sm rounded-pill px-3" title="Detail">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-outline-warning btn-sm rounded-pill px-3" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            @if($user->id !== auth()->id())
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger btn-sm rounded-pill px-3" title="Hapus" onclick="return confirm('Yakin ingin menghapus user ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-muted py-5">Belum ada user.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
