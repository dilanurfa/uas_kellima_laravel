@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <h2 class="mb-4 fw-bold text-dark">🏠 Manajemen Ruangan</h2>

    @if(session('success'))
        <div class="alert alert-success text-center rounded-pill shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol Tambah Ruangan -->
    <div class="mb-3 text-end">
        <a href="{{ route('admin.Ruangan.create') }}" class="btn btn-success rounded-pill shadow-sm px-4">
            <i class="fas fa-plus me-2"></i>Tambah Ruangan
        </a>
    </div>

    <div class="table-responsive shadow-sm rounded-4 overflow-hidden">
        <table class="table table-hover table-striped align-middle table-borderless mb-0">
            <thead class="bg-dark text-white text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Ruangan</th>
                    <th>Harga</th>
                    <th>Durasi</th>
                    <th>Deskripsi</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @forelse($Ruangan as $index => $rgn)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $rgn->nama_ruangan }}</td>
                        <td>Rp{{ number_format($rgn->harga, 0, ',', '.') }}</td>
                        <td><span class="badge bg-info text-dark">{{ $rgn->durasi }}</span></td>
                        <td>{{ $rgn->deskripsi ?? '-' }}</td>
                        <td>
                            @if($rgn->foto)
                                <button class="btn btn-outline-primary btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#fotoModal{{ $rgn->id }}">
                                    Lihat
                                </button>

                                <!-- Modal Foto -->
                                <div class="modal fade" id="fotoModal{{ $rgn->id }}" tabindex="-1">
                                  <div class="modal-dialog modal-dialog-centered modal-sm">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title">Foto Ruangan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                      </div>
                                      <div class="modal-body text-center">
                                        <img src="{{ asset('storage/' . $rgn->foto) }}" class="img-fluid rounded">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.Ruangan.show', $rgn->id) }}" class="btn btn-outline-primary btn-sm rounded-pill px-3" title="Detail">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.Ruangan.edit', $rgn->id) }}" class="btn btn-outline-warning btn-sm rounded-pill px-3" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.Ruangan.destroy', $rgn->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus ruangan ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm rounded-pill px-3" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-muted py-5">Belum ada ruangan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
