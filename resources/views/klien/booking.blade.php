@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<style>
    body {
        background-color: #f5faff;
        font-family: 'Poppins', sans-serif;
    }

    h2 {
        font-weight: 700;
        color: #003566;
        border-bottom: 3px solid #0077b6;
        display: inline-block;
        padding-bottom: 5px;
    }

    .booking-card {
        background: #ffffff;
        border: 1px solid #cfe2ff;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 70, 140, 0.1);
        padding: 30px;
    }

    label {
        font-weight: 600;
        color: #003566;
    }

    .form-control, .form-select {
        border-radius: 10px;
        border: 1px solid #90e0ef;
    }

    .btn-primary {
        background-color: #0077b6;
        border: none;
        border-radius: 10px;
    }

    .btn-primary:hover {
        background-color: #005f99;
    }

    .text-danger {
        font-size: 0.9rem;
        margin-top: 5px;
    }

    .payment-info {
        background-color: #e0f4ff;
        border: 1px solid #90e0ef;
        border-radius: 10px;
        padding: 15px;
        margin-top: 10px;
        display: none;
    }

    .payment-info h5 {
        font-size: 1rem;
        color: #0077b6;
        margin-bottom: 10px;
    }

    .payment-info p {
        margin: 0;
        font-size: 0.95rem;
        color: #003566;
    }

    .qris-img {
        max-width: 200px;
        display: block;
        margin: 10px auto;
    }
</style>

<div class="container mt-5">
    <div class="booking-card">
        <h2>Booking Studio: <strong>{{ $Ruangan->nama_ruangan }}</strong></h2>
        <p class="text-muted">Lengkapi form berikut untuk memesan studio dengan nyaman</p>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                <br>
                <small>Mohon tunggu konfirmasi dari admin.</small>
            </div>
        @endif

        <form id="bookingForm" action="{{ route('booking.store') }}" method="POST" novalidate>
            @csrf
            <input type="hidden" name="ruangan_id" value="{{ $Ruangan->id }}">

            <!-- Harga per jam -->
            <div class="mb-3">
                <label>Harga per Jam</label>
                <input type="text" class="form-control" value="Rp {{ number_format($Ruangan->harga, 0, ',', '.') }}" disabled>
            </div>

            <!-- Durasi -->
            <div class="mb-3">
                <label for="durasi" class="form-label">Durasi Booking (jam)</label>
                <select name="durasi" id="durasi" class="form-select" required>
                    <option value="" selected disabled>-- Pilih Durasi --</option>
                    @for ($i = 1; $i <= 8; $i++)
                        <option value="{{ $i }}">{{ $i }} jam</option>
                    @endfor
                </select>
                <div class="text-danger" id="error-durasi"></div>
            </div>

            <!-- Total harga -->
            <div class="mb-3">
                <label for="total_harga" class="form-label">Total Harga</label>
                <input type="text" class="form-control" id="total_harga" value="Rp {{ number_format($Ruangan->harga, 0, ',', '.') }}" disabled>
            </div>

            <!-- Tanggal -->
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal Booking</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                <div class="text-danger" id="error-tanggal"></div>
            </div>

            <!-- Jam -->
            <div class="mb-3">
                <label for="jam" class="form-label">Jam Booking</label>
                <input type="time" name="jam" id="jam" class="form-control" required>
                <div class="text-danger" id="error-jam"></div>
            </div>

            <!-- Pembayaran -->
            <div class="mb-3">
                <label for="pembayaran" class="form-label">Metode Pembayaran</label>
                <select name="pembayaran" id="pembayaran" class="form-select" required>
                    <option value="" selected disabled>-- Pilih Metode Pembayaran --</option>
                    <option value="transfer_bank">Transfer Bank</option>
                    <option value="e_wallet">E-Wallet</option>
                </select>
                <div class="text-danger" id="error-pembayaran"></div>

                <!-- Info Transfer Bank -->
                <div class="payment-info" id="bank-info">
                    <h5>Transfer ke Rekening</h5>
                    <p>Bank BCA: <strong>1234567890</strong></p>
                    <p>Atas Nama: <strong>The Sound Project</strong></p>
                </div>

                <!-- Info QRIS -->
                <div class="payment-info" id="qris-info">
                    <h5>Scan QRIS untuk Pembayaran</h5>
                    <img src="{{ asset('assets/img/qris2.jpg') }}" alt="QRIS" class="qris-img">
                </div>
            </div>

            <button type="button" class="btn btn-primary w-100 mt-3" id="btnSubmit">
                <i class="bi bi-calendar-check"></i> Kirim Booking
            </button>
        </form>
    </div>
</div>

<!-- Modal Konfirmasi -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="confirmModalLabel">Konfirmasi Booking</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
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
    const pembayaranSelect = document.getElementById('pembayaran');
    const bankInfo = document.getElementById('bank-info');
    const qrisInfo = document.getElementById('qris-info');

    function formatRupiah(angka) {
        return 'Rp ' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    }

    durasiSelect.addEventListener('change', function () {
        const durasi = parseInt(this.value);
        const total = hargaPerJam * durasi;
        totalHargaInput.value = formatRupiah(total);
    });

    pembayaranSelect.addEventListener('change', function () {
        bankInfo.style.display = "none";
        qrisInfo.style.display = "none";

        if (pembayaranSelect.value === "transfer_bank") {
            bankInfo.style.display = "block";
        } else if (pembayaranSelect.value === "e_wallet") {
            qrisInfo.style.display = "block";
        }
    });

    btnSubmit.addEventListener('click', function () {
        let isValid = true;

        document.querySelectorAll('.text-danger').forEach(el => el.textContent = '');
        const tanggalInput = document.getElementById('tanggal');
        const jamInput = document.getElementById('jam');
        const tanggalValue = tanggalInput.value;
        const jamValue = jamInput.value;
        const now = new Date();
        const tanggalBooking = new Date(tanggalValue + 'T' + jamValue);

        if (!durasiSelect.value) {
            document.getElementById('error-durasi').textContent = "Wajib diisi";
            isValid = false;
        }

        if (!tanggalValue) {
            document.getElementById('error-tanggal').textContent = "Wajib diisi";
            isValid = false;
        }

        if (!jamValue) {
            document.getElementById('error-jam').textContent = "Wajib diisi";
            isValid = false;
        }

        if (!pembayaranSelect.value) {
            document.getElementById('error-pembayaran').textContent = "Wajib diisi";
            isValid = false;
        }

        if (tanggalValue && jamValue && tanggalBooking < now) {
            alert("❌ Pesanan tidak bisa dilakukan karena tanggal/jam sudah terlewat.");
            isValid = false;
        }

        if (isValid) {
            confirmModal.show();
        }
    });

    confirmYes.addEventListener('click', function () {
        bookingForm.submit();
    });
});
</script>
@endsection
