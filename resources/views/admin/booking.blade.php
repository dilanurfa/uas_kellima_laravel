@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container-fluid py-5" style="background-color: #f0f0f0;">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="fw-bold" style="color: #222;">Daftar Booking Studio</h2>
        </div>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover align-middle bg-white rounded shadow-sm overflow-hidden">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Klien</th>
                        <th>Studio</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                        <tr>
                            <td>{{ $booking->id }}</td>
                            <td>{{ $booking->user->name ?? 'Unknown' }}</td>
                            <td>{{ $booking->ruangan->nama_ruangan ?? 'Unknown' }}</td>
                            <td>{{ $booking->tanggal }}</td>
                            <td>{{ $booking->jam }}</td>
                            <td>
                                @if($booking->status == 'pending')
                                    <span class="badge bg-warning text-dark">Tertunda</span>
                                @elseif($booking->status == 'approved')
                                    <span class="badge bg-success">Disetujui</span>
                                @else
                                    <span class="badge bg-danger">Ditolak</span>
                                @endif
                            </td>
                            <td>
                                @if($booking->status == 'pending')
                                    <form action="{{ route('admin.booking.confirm', $booking->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        <button class="btn btn-success btn-sm rounded-pill px-3" type="submit">Setujui</button>
                                    </form>
                                    <form action="{{ route('admin.booking.reject', $booking->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        <button class="btn btn-danger btn-sm rounded-pill px-3" type="submit">Tolak</button>
                                    </form>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">Belum ada booking</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
       <div class="mt-4">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-dark rounded-pill px-4">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
        </div>
    </div>
</div>

<style>
    body {
        background-color: #f0f0f0;
    }
    .table th, .table td {
        vertical-align: middle;
    }
    .btn-dark {
        background-color: #333;
        border: none;
    }
    .btn-dark:hover {
        background-color: #000;
        color: #fff;
    }
</style>
@endsection
