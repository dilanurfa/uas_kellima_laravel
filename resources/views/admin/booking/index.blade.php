@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manajemen Booking</li>
            </ol>
        </nav>

        <h2 class="mb-4 fw-bold">Manajemen Booking Studio</h2>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover align-middle bg-white rounded shadow-sm">
                <thead class="table-dark text-center">
                    <tr>
                        <th>No</th>
                        <th>Klien</th>
                        <th>Studio</th>
                        <th>Tanggal Booking</th>
                        <th>Jam Mulai</th>
                        <th>Durasi</th>
                        <th>Total Harga</th>
                        <th>Metode Bayar</th>
                        <th>Bukti Pembayaran</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse($bookings as $booking)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $booking->user->name ?? 'Unknown' }}</td>
                            <td>{{ $booking->ruangan->nama_ruangan ?? 'Unknown' }}</td>
                            <td>{{ $booking->tanggal }}</td>
                            <td>{{ $booking->jam }}</td>
                            <td>{{ $booking->durasi }} jam</td>
                            <td>Rp{{ number_format($booking->total_harga, 0, ',', '.') }}</td>
                            <td>{{ ucfirst($booking->metode_bayar) ?? '-' }}</td>
                            <td>
                                @if($booking->bukti_pembayaran)
                                    <a href="{{ asset('storage/' . $booking->bukti_pembayaran) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $booking->bukti_pembayaran) }}" width="80" class="img-thumbnail">
                                    </a>
                                @else
                                    <span class="text-muted">Belum ada</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-{{ $booking->status == 'lunas' ? 'success' : ($booking->status == 'pending' ? 'warning text-dark' : 'danger') }}">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </td>
                            <td>
                                @if($booking->status == 'pending')
                                    <form action="{{ route('admin.booking.confirm', $booking->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button class="btn btn-success btn-sm rounded-pill px-3" type="submit">Setujui</button>
                                    </form>
                                    <form action="{{ route('admin.booking.reject', $booking->id) }}" method="POST" class="d-inline">
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
                            <td colspan="11" class="text-muted text-center py-4">Belum ada booking</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-dark rounded-pill px-4">
                <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
            </a>
        </div>
    </div>
@endsection
