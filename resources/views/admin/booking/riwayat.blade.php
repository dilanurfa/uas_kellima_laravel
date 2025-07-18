@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <h2 class="mb-4 fw-bold text-dark">📁 Riwayat Booking Selesai</h2>

    <div class="card shadow-sm rounded-4 overflow-hidden">
        <div class="card-header bg-dark text-white">
            <i class="fas fa-list me-2"></i>Daftar Booking Selesai
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle table-borderless mb-0 text-center">
                    <thead class="bg-light text-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama User</th>
                            <th>Ruangan</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $index => $booking)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $booking->user->name }}</td>
                                <td>{{ $booking->ruangan->nama_ruangan }}</td>
                                <td>{{ $booking->tanggal }}</td>
                                <td>
                                    <span class="badge bg-success">
                                        Selesai
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-muted py-4">Tidak ada booking selesai.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
