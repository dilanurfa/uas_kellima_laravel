@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<div class="container mt-4">
    <h2>Booking Studio: <strong>{{ $Ruangan->nama_ruangan }}</strong></h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
            <br>
            <small>Mohon tunggu konfirmasi dari admin.</small>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Ada masalah dengan input Anda:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="bookingForm" action="{{ route('booking.store') }}" method="POST">
        @csrf
        <input type="hidden" name="ruangan_id" value="{{ $Ruangan->id }}">

        <div class="mb-3">
            <label>Harga per Jam</label>
            <input type="text" class="form-control" id="harga_per_jam" value="Rp {{ number_format($Ruangan->harga, 0, ',', '.') }}" disabled>
        </div>

        <div class="mb-3">
            <label for="durasi" class="form-label">Durasi Booking (jam)</label>
            <select name="durasi" id="durasi" class="form-select" required>
                @for ($i = 1; $i <= 8; $i++)
                    <option value="{{ $i }}">{{ $i }} jam</option>
                @endfor
            </select>
        </div>

        <div class="mb-3">
            <label for="total_harga" class="form-label">Total Harga</label>
            <input type="text" class="form-control" id="total_harga" value="Rp {{ number_format($Ruangan->harga, 0, ',', '.') }}" disabled>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal Booking</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="jam" class="form-label">Jam Booking</label>
            <input type="time" name="jam" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="pembayaran" class="form-label">Metode Pembayaran</label>
            <select name="pembayaran" id="pembayaran" class="form-select" required>
                <option value="" selected disabled>-- Pilih Metode Pembayaran --</option>
                <option value="transfer_bank">Transfer Bank</option>
                <option value="cod">Cash on Delivery (COD)</option>
                <option value="e_wallet">E-Wallet</option>
            </select>
        </div>

        <button type="button" class="btn btn-primary" id="btnSubmit">Kirim Booking</button>
    </form>
</div>

<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmModalLabel">Konfirmasi Booking</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin memesan studio ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="confirmYes">Ya, Pesan</button>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const hargaPerJam = {{ $Ruangan->harga }};
    const durasiSelect = document.getElementById('durasi');
    const totalHargaInput = document.getElementById('total_harga');
    const btnSubmit = document.getElementById('btnSubmit');
    const confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));
    const confirmYes = document.getElementById('confirmYes');
    const bookingForm = document.getElementById('bookingForm');

    function formatRupiah(angka) {
        return 'Rp ' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    }

    durasiSelect.addEventListener('change', function () {
        const durasi = parseInt(this.value);
        const total = hargaPerJam * durasi;
        totalHargaInput.value = formatRupiah(total);
    });

    btnSubmit.addEventListener('click', function () {
        confirmModal.show();
    });

    confirmYes.addEventListener('click', function () {
        bookingForm.submit();
    });
});
</script>
@endsection
