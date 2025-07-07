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
        background: #fff;
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
        text-align: center;
    }

    .payment-info h5 {
        font-size: 1rem;
        color: #0077b6;
        margin-bottom: 10px;
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
        <p class="text-muted">Isi form berikut supaya booking kamu lancar dan mudah</p>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}<br>
                <small>Tunggu ya konfirmasi dari admin.</small>
            </div>
        @endif

        <form id="bookingForm" action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            <input type="hidden" name="ruangan_id" value="{{ $Ruangan->id }}">

            <!-- Nama Lengkap -->
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Tulis nama lengkap kamu" required>
                <div class="text-danger" id="error-nama"></div>
            </div>

            <!-- Tanggal Booking -->
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal Booking <span class="text-danger">*</span></label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                <div class="text-danger" id="error-tanggal"></div>
            </div>

            <!-- Jam Booking -->
            <div class="mb-3">
                <label for="jam" class="form-label">Jam Booking <span class="text-danger">*</span></label>
                <input type="time" name="jam" id="jam" class="form-control" required>
                <div class="text-danger" id="error-jam"></div>
            </div>

            <!-- Durasi Booking -->
            <div class="mb-3">
                <label for="durasi" class="form-label">Durasi Booking (jam) <span class="text-danger">*</span></label>
                <select name="durasi" id="durasi" class="form-select" required>
                    <option value="" selected disabled>Pilih durasi jam</option>
                    @for ($i = 1; $i <= 8; $i++)
                        <option value="{{ $i }}">{{ $i }} jam</option>
                    @endfor
                </select>
                <div class="text-danger" id="error-durasi"></div>
            </div>

            <!-- Total Harga -->
            <div class="mb-3">
                <label for="total_harga" class="form-label">Total Harga</label>
                <input type="text" id="total_harga" class="form-control" disabled placeholder="Pilih durasi dulu ya">
            </div>

            <!-- Metode Pembayaran -->
            <div class="mb-3">
                <label for="pembayaran" class="form-label">Metode Pembayaran <span class="text-danger">*</span></label>
                <select name="pembayaran" id="pembayaran" class="form-select" required>
                    <option value="" selected disabled>Pilih metode pembayaran</option>
                    <option value="qris">QRIS</option>
                    <option value="transfer">Transfer Bank</option>
                </select>
                <div class="text-danger" id="error-pembayaran"></div>

                <!-- Info QRIS -->
                <div class="payment-info" id="qris-info">
                    <h5>Scan QRIS untuk pembayaran</h5>
                    <img src="{{ asset('assets/img/qris.jpg') }}" alt="QRIS" class="qris-img">
                </div>

                <!-- Info Transfer -->
                <div class="payment-info" id="transfer-info">
                    <h5>Transfer ke Rekening Berikut</h5>
                    <p><strong>Bank BCA</strong><br>No Rek: <strong>1234567890</strong><br>a.n. <strong>Studio Musik</strong></p>
                </div>
            </div>

            <!-- Upload Bukti Pembayaran -->
            <div class="mb-3" id="bukti-container" style="display: none;">
                <label for="bukti_pembayaran" class="form-label">Upload Bukti Pembayaran <span class="text-danger">*</span></label>
                <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="form-control" accept=".jpg,.jpeg,.png">
                <div class="text-danger" id="error-bukti"></div>
            </div>

            <button type="button" class="btn btn-primary w-100 mt-3" id="btnSubmit">Kirim Booking</button>
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
        Yakin mau pesan studio ini?
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
    const qrisInfo = document.getElementById('qris-info');
    const transferInfo = document.getElementById('transfer-info');
    const buktiContainer = document.getElementById('bukti-container');
    const buktiInput = document.getElementById('bukti_pembayaran');

    function formatRupiah(angka) {
        return 'Rp ' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    }

    durasiSelect.addEventListener('change', function () {
        const durasi = parseInt(this.value);
        if (!isNaN(durasi)) {
            const total = hargaPerJam * durasi;
            totalHargaInput.value = formatRupiah(total);
        } else {
            totalHargaInput.value = '';
        }
    });

    pembayaranSelect.addEventListener('change', function () {
        if (this.value === 'qris') {
            qrisInfo.style.display = 'block';
            transferInfo.style.display = 'none';
            buktiContainer.style.display = 'block';
        } else if (this.value === 'transfer') {
            transferInfo.style.display = 'block';
            qrisInfo.style.display = 'none';
            buktiContainer.style.display = 'block';
        } else {
            qrisInfo.style.display = 'none';
            transferInfo.style.display = 'none';
            buktiContainer.style.display = 'none';
        }
    });

    buktiInput.addEventListener('change', function () {
        const file = this.files[0];
        const allowedTypes = ['image/jpeg', 'image/png'];
        if (file && !allowedTypes.includes(file.type)) {
            this.value = '';
            document.getElementById('error-bukti').textContent = 'Hanya file JPG atau PNG yang diperbolehkan';
        } else {
            document.getElementById('error-bukti').textContent = '';
        }
    });

    btnSubmit.addEventListener('click', function () {
        // Reset semua pesan error
        document.querySelectorAll('.text-danger').forEach(el => el.textContent = '');

        let valid = true;

        // Validasi form
        if (!document.getElementById('nama').value.trim()) {
            document.getElementById('error-nama').textContent = 'Nama wajib diisi';
            valid = false;
        }
        if (!document.getElementById('tanggal').value) {
            document.getElementById('error-tanggal').textContent = 'Tanggal wajib diisi';
            valid = false;
        }
        if (!document.getElementById('jam').value) {
            document.getElementById('error-jam').textContent = 'Jam wajib diisi';
            valid = false;
        }
        if (!durasiSelect.value) {
            document.getElementById('error-durasi').textContent = 'Durasi wajib dipilih';
            valid = false;
        }
        if (!pembayaranSelect.value) {
            document.getElementById('error-pembayaran').textContent = 'Metode pembayaran wajib dipilih';
            valid = false;
        }
        if (buktiContainer.style.display === 'block' && !buktiInput.value) {
            document.getElementById('error-bukti').textContent = 'Bukti pembayaran wajib diunggah';
            valid = false;
        }

        if (valid) {
            confirmModal.show();
        }
    });

    confirmYes.addEventListener('click', function () {
        bookingForm.submit();
    });
});
</script>
@endsection
