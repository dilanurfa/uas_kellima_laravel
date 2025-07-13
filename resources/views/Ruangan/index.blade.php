@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container my-4">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-gradient bg-dark text-white py-3 d-flex justify-content-between align-items-center rounded-top">
            <h4 class="mb-0"><i class="fas fa-door-open me-2"></i> Daftar Ruangan Studio Cihuy</h4>
            <a href="{{ route('admin.Ruangan.create') }}" class="btn btn-light btn-sm shadow-sm">
                <i class="fas fa-plus me-1"></i> Tambah Ruangan
            </a>
        </div>

        <div class="card-body bg-light">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($Ruangan->count())
                <div class="table-responsive">
                    <table class="table table-hover align-middle shadow-sm bg-white rounded">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Durasi</th>
                                <th>Deskripsi</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Ruangan as $index => $rgn)
                                <tr>
                                    <td class="text-center fw-semibold text-secondary">{{ $index + 1 }}</td>
                                    <td class="fw-bold text-dark">{{ $rgn->nama_ruangan }}</td>
                                    <td class="text-success">Rp {{ number_format($rgn->harga, 0, ',', '.') }}</td>
                                    <td><span class="badge bg-info text-dark shadow-sm">{{ $rgn->durasi }}</span></td>
                                    <td class="text-muted small">{{ $rgn->deskripsi ?? '-' }}</td>
                                    <td>
                                        @if($rgn->foto)
                                            <img src="{{ asset('storage/' . $rgn->foto) }}" class="rounded shadow-sm" width="80">
                                        @else
                                            <span class="text-muted fst-italic">Tidak ada</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('admin.Ruangan.show', $rgn->id) }}" class="btn btn-outline-primary" title="Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.Ruangan.edit', $rgn->id) }}" class="btn btn-outline-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.Ruangan.destroy', $rgn->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus ruangan ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-danger" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-5 text-muted">
                    <i class="fas fa-music fa-3x mb-3"></i>
                    <h5>Belum ada data ruangan yang tersedia</h5>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
