@extends('layouts.app')

@section('content')
<div class="container-fluid py-5" style="background-color: #f0f0f0;">
    <div class="container text-center">
        <div class="bg-white p-5 rounded shadow-sm">
            <h2 class="fw-bold text-dark mb-3">Terima Kasih Sudah Memesan!</h2>
            <p class="text-muted mb-4">Harap tunggu konfirmasi dari admin untuk booking Anda.</p>
            <a href="{{ route('klien.dashboard') }}" class="btn btn-dark px-4 py-2 rounded-pill">Kembali ke Dashboard</a>
        </div>
    </div>
</div>

<style>
    body {
        background-color: #f0f0f0;
    }
    .btn-dark {
        background-color: #333333;
        border: none;
    }
    .btn-dark:hover {
        background-color: #000000;
        color: #ffffff;
    }
</style>
@endsection
