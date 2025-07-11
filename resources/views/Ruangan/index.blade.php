@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container my-4">
    <div class="card shadow">
        <div class="card-header d-flex justify-content-between align-items-center bg-dark text-white">
            <h4 class="mb-0">Daftar Ruangan Studio Cihuy</h4>
            <a href="{{ route('admin.Ruangan.create') }}" class="btn btn-light">
                <i class="fas fa-plus"></i> Tambah Ruangan
            </a>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($Ruangan->count())
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
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
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td><strong>{{ $rgn->nama_ruangan }}</strong></td>
                                    <td>Rp {{ number_format($rgn->harga, 0, ',', '.') }}</td>
                                    <td><span class="badge bg-info">{{ $rgn->durasi }}</span></td>
                                    <td>{{ $rgn->deskripsi ?? '-' }}</td>
                                    <td>
                                        @if($rgn->foto)
                                            <img src="{{ asset('storage/' . $rgn->foto) }}" class="img-thumbnail" width="100">
                                        @else
                                            <span class="text-muted">Tidak ada</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('admin.Ruangan.show', $rgn->id) }}" 
                                               class="btn btn-outline-info" title="Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.Ruangan.edit', $rgn->id) }}" 
                                               class="btn btn-outline-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.Ruangan.destroy', $rgn->id) }}" method="POST" class="d-inline"
                                                  onsubmit="return confirm('Hapus ruangan ini?')">
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
                <div class="text-center py-5">
                    <i class="fas fa-music fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">Belum ada data ruangan yang tersedia</h5>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
