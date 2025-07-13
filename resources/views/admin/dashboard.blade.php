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

    {{-- Tabel Booking --}}
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            Daftar Booking Masuk
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-light text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama User</th>
                            <th>Ruangan</th>
                            <th>Tanggal Booking</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse($bookings as $index => $booking)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $booking->user->name }}</td>
                                <td>{{ $booking->ruangan->nama_ruangan }}</td>
                                <td>{{ $booking->tanggal_booking }}</td>
                                <td>
                                    <span class="badge bg-{{ $booking->status == 'diterima' ? 'success' : ($booking->status == 'ditolak' ? 'danger' : 'secondary') }}">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </td>
                                <td>
                                    @if($booking->status === 'menunggu')
                                        <form action="{{ route('admin.booking.confirm', $booking->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.booking.reject', $booking->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </form>
                                    @else
                                        <i class="text-muted">-</i>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">Belum ada data booking.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
