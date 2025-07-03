@extends('layouts.app')

@section('content')
<div class="container mt-5 text-center">
    <h2>Terima Kasih Sudah Memesan!</h2>
    <p>Harap tunggu konfirmasi dari admin.</p>
    <a href="{{ route('klien.index') }}" class="btn btn-primary mt-3">Kembali ke Dashboard</a>
</div>
@endsection
