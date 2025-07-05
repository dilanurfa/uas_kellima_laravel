@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<style>
    body {
        background-color: #f5faff;
        font-family: 'Poppins', sans-serif;
    }

    .booking-card {
        background: #ffffff;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(0, 70, 140, 0.1);
        padding: 40px 30px;
        text-align: center;
    }

    .booking-card h2 {
        font-weight: 700;
        color: #003566;
        margin-bottom: 15px;
    }

    .booking-card p {
        color: #6c757d;
        font-size: 1rem;
        margin-bottom: 25px;
    }

    .btn-primary {
        background-color: #0077b6;
        border: none;
        border-radius: 50px;
        padding: 10px 30px;
        font-weight: 600;
    }

    .btn-primary:hover {
        background-color: #005f99;
    }

    .btn-danger {
        background-color: #d62828;
        border: none;
        border-radius: 50px;
        padding: 10px 30px;
        font-weight: 600;
    }

    .btn-danger:hover {
        background-color: #a61e1e;
    }

    .btn-dark {
        background-color: #003566;
        border: none;
        border-radius: 50px;
        padding: 10px 30px;
        font-weight: 600;
        margin-top: 15px;
    }

    .btn-dark:hover {
        background-color: #002244;
    }

    .action-buttons {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 20px;
    }
</style>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="booking-card">
                <h2>🎉 Terima Kasih Sudah Memesan!</h2>
                <p>Pesanan Anda sedang diproses. Harap tunggu konfirmasi dari admin studio.</p>

                <div class="action-buttons">
                    <!-- Tombol Download Bukti -->
                    <a href="{{ route('klien.download', $booking->id) }}" class="btn btn-primary">
                        <i class="bi bi-download me-2"></i> Unduh Bukti
                    </a>

                    <!-- Tombol Batalkan Booking -->
                    <form action="{{ route('klien.cancel', $booking->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin membatalkan booking ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-x-circle me-2"></i> Batalkan
                        </button>
                    </form>
                </div>

                <a href="{{ route('klien.index') }}" class="btn btn-dark w-100">
                    <i class="bi bi-arrow-left-circle me-2"></i> Kembali ke Dashboard
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
