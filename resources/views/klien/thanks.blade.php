@extends('layouts.app')

@section('content')
<div class="container text-center mt-5">
    <h1 class="text-success">✅ Booking Berhasil!</h1>
    <p>Terima kasih, pembayaran Anda sudah diterima.</p>
    <p><strong>Kode Booking:</strong> #{{ $booking->id }}</p>
    <a href="{{ route('booking.download.receipt', $booking->id) }}" class="btn btn-secondary mt-3">
        📄 Download Bukti Pembayaran
    </a>
    <a href="/" class="btn btn-primary mt-3">Kembali ke Beranda</a>
</div>
@endsection
