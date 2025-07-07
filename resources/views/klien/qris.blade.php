@extends('layouts.app')

@section('content')
<div class="container mt-5 text-center">
    <h3>Scan QRIS untuk Membayar</h3>
    <p>Total yang harus dibayar:</p>
    <h2 class="text-primary">Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</h2>

    <img src="{{ asset('assets/img/qris.jpg') }}" alt="QRIS" class="img-fluid mt-3" style="max-width: 300px;">

    <p class="mt-3">Setelah melakukan pembayaran, klik tombol di bawah untuk konfirmasi.</p>

    <form action="{{ route('booking.confirm', $booking->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success">Saya Sudah Bayar</button>
    </form>
</div>
@endsection
