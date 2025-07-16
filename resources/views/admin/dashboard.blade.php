@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <h2 class="mb-4 fw-bold text-dark">📊 Dashboard Admin</h2>

    {{-- Statistik --}}
    <div class="row mb-4">
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm text-white bg-info rounded-4">
                <div class="card-body">
                    <h5 class="mb-1">Total Booking</h5>
                    <h3 class="fw-bold">{{ $totalBooking ?? 0 }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm text-white bg-success rounded-4">
                <div class="card-body">
                    <h5 class="mb-1">Booking Diterima</h5>
                    <h3 class="fw-bold">{{ $totalAccepted ?? 0 }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm text-dark bg-warning rounded-4">
                <div class="card-body">
                    <h5 class="mb-1">Booking Pending</h5>
                    <h3 class="fw-bold">{{ $totalPending ?? 0 }}</h3>
                </div>
            </div>
        </div>
    </div>

    {{-- Tabel Booking Terbaru --}}
    <div class="card shadow-sm rounded-4 overflow-hidden">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <span><i class="fas fa-clock me-2"></i>Daftar Booking Terbaru</span>
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
                        @forelse($bookings->take(5) as $index => $booking)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $booking->user->name }}</td>
                                <td>{{ $booking->ruangan->nama_ruangan }}</td>
                                <td>{{ $booking->tanggal }}</td>
                                <td>
                                    @php
                                        $statusClass = match($booking->status) {
                                            'lunas' => 'success',
                                            'pending' => 'warning text-dark',
                                            'ditolak' => 'danger',
                                            default => 'secondary'
                                        };
                                    @endphp
                                    <span class="badge bg-{{ $statusClass }}">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-muted py-4">Belum ada data booking.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
