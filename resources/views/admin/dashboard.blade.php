@extends('layouts.admin')

@section('content')
    <h2 class="mb-4 fw-bold">Dashboard</h2>

    {{-- Kartu Statistik --}}
    <div class="row mb-4">
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-info shadow-sm">
                <div class="card-body">
                    <h5>Total Booking</h5>
                    <h3>{{ $totalBooking ?? 0 }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-success shadow-sm">
                <div class="card-body">
                    <h5>Booking Diterima</h5>
                    <h3>{{ $totalAccepted ?? 0 }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-warning shadow-sm">
                <div class="card-body">
                    <h5>Booking Menunggu</h5>
                    <h3>{{ $totalPending ?? 0 }}</h3>
                </div>
            </div>
        </div>
    </div>

    {{-- Preview Tabel Booking --}}
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <span>Daftar Booking Terbaru</span>
            <a href="{{ route('admin.booking.index') }}" class="btn btn-sm btn-light">Lihat Semua</a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0 text-center">
                    <thead class="table-light">
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
                                    <span class="badge bg-{{ $booking->status == 'lunas' ? 'success' : ($booking->status == 'pending' ? 'warning text-dark' : 'danger') }}">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-muted py-3">Belum ada data booking.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
