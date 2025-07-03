@extends('layouts.app')

@section('content')
<div class="container-fluid py-5" style="background-color: #f0f0f0;">
    <div class="container">
        <div class="text-center mb-5">
            <h3 class="fw-bold text-dark">Riwayat Booking Saya</h3>
            <p class="text-muted">Lihat daftar semua booking studio yang telah Anda lakukan.</p>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-borderless shadow-sm rounded bg-white">
                <thead class="table-dark">
                    <tr>
                        <th>Studio</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Durasi</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($riwayat as $item)
                        <tr>
                            <td class="align-middle">{{ $item->ruangan->nama_ruangan }}</td>
                            <td class="align-middle">{{ $item->tanggal }}</td>
                            <td class="align-middle">{{ $item->jam }}</td>
                            <td class="align-middle">{{ $item->durasi }} jam</td>
                            <td class="align-middle">
                                @if ($item->status == 'pending')
                                    <span class="badge rounded-pill bg-warning text-dark px-3 py-2">Menunggu</span>
                                @elseif ($item->status == 'approved')
                                    <span class="badge rounded-pill bg-success px-3 py-2">Disetujui</span>
                                @else
                                    <span class="badge rounded-pill bg-danger px-3 py-2">Ditolak</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">Belum ada booking.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Custom Styles -->
<style>
    body {
        background-color: #f0f0f0;
    }
    .table {
        border-radius: 10px;
        overflow: hidden;
        font-size: 0.95rem;
    }
    .table th, .table td {
        vertical-align: middle !important;
    }
    .table-hover tbody tr:hover {
        background-color: #f9f9f9;
        transition: background-color 0.3s ease;
    }
    .badge {
        font-size: 0.85rem;
    }
    .table-responsive {
        border-radius: 10px;
        overflow-x: auto;
    }
</style>
@endsection
