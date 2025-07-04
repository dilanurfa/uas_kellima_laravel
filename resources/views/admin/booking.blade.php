@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Daftar Booking Studio</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered mt-3">
        <thead>
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
                                <button class="btn btn-success btn-sm" type="submit">Setujui</button>
                            </form>
                            <form action="{{ route('admin.booking.reject', $booking->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button class="btn btn-danger btn-sm" type="submit">Tolak</button>
                            </form>
                        @else
                            -
                        @endif
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" class="text-center">Belum ada booking</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
