@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-4">
        <h2 class="mb-4 fw-bold text-dark">📋 Manajemen Booking</h2>

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
                        <th>Klien</th>
                        <th>Studio</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Durasi</th>
                        <th>Total</th>
                        <th>Metode</th>
                        <th>Bukti</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse($bookings as $booking)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $booking->user->name ?? '-' }}</td>
                            <td>{{ $booking->ruangan->nama_ruangan ?? '-' }}</td>
                            <td>{{ $booking->tanggal }}</td>
                            <td>{{ $booking->jam }}</td>
                            <td>{{ $booking->durasi }} jam</td>
                            <td>Rp{{ number_format($booking->total_harga, 0, ',', '.') }}</td>
                            <td><span class="badge bg-secondary">{{ ucfirst($booking->metode_bayar) }}</span></td>
                            <td>
                                @if($booking->bukti_pembayaran)
                                    <button class="btn btn-outline-primary btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#buktiModal{{ $booking->id }}">
                                        Lihat
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="buktiModal{{ $booking->id }}" tabindex="-1" aria-labelledby="buktiLabel{{ $booking->id }}" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered modal-sm">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title">Bukti Pembayaran</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                          </div>
                                          <div class="modal-body text-center">
                                            <img src="{{ asset('storage/' . $booking->bukti_pembayaran) }}" class="img-fluid rounded">
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                @else
                                    <span class="text-muted">Belum ada</span>
                                @endif
                            </td>
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
                            <td>
                                @if($booking->status == 'pending')
                                    <form action="{{ route('admin.booking.confirm', $booking->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button class="btn btn-success btn-sm rounded-pill px-3" type="submit">✔</button>
                                    </form>
                                    <form action="{{ route('admin.booking.reject', $booking->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button class="btn btn-danger btn-sm rounded-pill px-3" type="submit">✖</button>
                                    </form>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="text-center text-muted py-5">Belum ada booking.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4 text-center">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-dark rounded-pill px-4">
                <i class="fas fa-arrow-left me-2"></i> Kembali ke Dashboard
            </a>
        </div>
    </div>
@endsection
