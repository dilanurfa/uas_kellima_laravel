@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Booking Studio: <strong>{{ $Ruangan->nama_ruangan }}</strong></h3>
            <a href="{{ route('home') }}" class="btn btn-secondary">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="ruangan_id" value="{{ $Ruangan->id }}">

                <!-- Nama Lengkap -->
                <div class="form-group my-2">
                    <label for="nama">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" 
                           name="nama" 
                           id="nama" 
                           class="form-control @error('nama') is-invalid @enderror" 
                           value="{{ old('nama') }}" 
                           placeholder="Tulis nama lengkap kamu">
                    @error('nama')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Tanggal Booking -->
                <div class="form-group my-2">
                    <label for="tanggal">Tanggal Booking <span class="text-danger">*</span></label>
                    <input type="date" 
                           name="tanggal" 
                           id="tanggal" 
                           class="form-control @error('tanggal') is-invalid @enderror" 
                           value="{{ old('tanggal') }}">
                    @error('tanggal')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Jam Booking -->
                <div class="form-group my-2">
                    <label for="jam">Jam Booking <span class="text-danger">*</span></label>
                    <input type="time" 
                           name="jam" 
                           id="jam" 
                           class="form-control @error('jam') is-invalid @enderror" 
                           value="{{ old('jam') }}">
                    @error('jam')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Durasi Booking -->
                <div class="form-group my-2">
                    <label for="durasi">Durasi (jam) <span class="text-danger">*</span></label>
                    <select name="durasi" 
                            id="durasi" 
                            class="form-select @error('durasi') is-invalid @enderror">
                        <option value="">-- Pilih Durasi --</option>
                        @for ($i = 1; $i <= 8; $i++)
                            <option value="{{ $i }}" {{ old('durasi') == $i ? 'selected' : '' }}>
                                {{ $i }} jam
                            </option>
                        @endfor
                    </select>
                    @error('durasi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Metode Pembayaran -->
                <div class="form-group my-2">
                    <label for="metode_bayar">Metode Pembayaran <span class="text-danger">*</span></label>
                    <select name="metode_bayar" 
                            id="metode_bayar" 
                            class="form-select @error('metode_bayar') is-invalid @enderror" onchange="tampilkanMetode()">
                        <option value="">-- Pilih Metode Pembayaran --</option>
                        <option value="qris" {{ old('metode_bayar') == 'qris' ? 'selected' : '' }}>QRIS</option>
                        <option value="transfer" {{ old('metode_bayar') == 'transfer' ? 'selected' : '' }}>Transfer Bank</option>
                    </select>
                    @error('metode_bayar')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Info QRIS -->
                <div class="my-3" id="qris-info" style="display: none;">
                    <h5>Silakan Scan QRIS berikut untuk pembayaran:</h5>
                    <img src="{{ asset('assets/img/qris.jpg') }}" alt="QRIS" class="img-fluid" style="max-width: 200px;">
                </div>

                <!-- Info Transfer -->
                <div class="my-3" id="transfer-info" style="display: none;">
                    <h5>Silakan Transfer ke rekening berikut:</h5>
                    <p><strong>Bank BCA</strong><br>No Rek: <strong>1234567890</strong><br>a.n. <strong>Studio Musik</strong></p>
                </div>

                <!-- Upload Bukti Pembayaran -->
                <div class="form-group my-2">
                    <label for="bukti_pembayaran">Bukti Pembayaran (JPG/PNG) <span class="text-danger">*</span></label>
                    <input type="file" 
                           name="bukti_pembayaran" 
                           id="bukti_pembayaran" 
                           class="form-control @error('bukti_pembayaran') is-invalid @enderror"
                           accept=".jpg,.jpeg,.png">
                    @error('bukti_pembayaran')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('home') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Kirim Booking</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function tampilkanMetode() {
        let metode = document.getElementById('metode_bayar').value;
        let qrisInfo = document.getElementById('qris-info');
        let transferInfo = document.getElementById('transfer-info');

        if (metode === 'qris') {
            qrisInfo.style.display = 'block';
            transferInfo.style.display = 'none';
        } else if (metode === 'transfer') {
            transferInfo.style.display = 'block';
            qrisInfo.style.display = 'none';
        } else {
            qrisInfo.style.display = 'none';
            transferInfo.style.display = 'none';
        }
    }

    // Jalankan sekali saat halaman dimuat jika user sudah pilih sebelumnya
    window.onload = tampilkanMetode;
</script>
@endsection
