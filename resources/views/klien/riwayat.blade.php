@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Riwayat Booking Saya</h3>
    <table class="table table-bordered mt-3">
        <thead>
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
                    <td>{{ $item->ruangan->nama_ruangan }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->jam }}</td>
                    <td>{{ $item->durasi }} jam</td>
                    <td>
                        @if ($item->status == 'pending')
                            <span class="badge bg-warning text-dark">Menunggu</span>
                        @elseif ($item->status == 'approved')
                            <span class="badge bg-success">Disetujui</span>
                        @else
                            <span class="badge bg-danger">Ditolak</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Belum ada booking.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
