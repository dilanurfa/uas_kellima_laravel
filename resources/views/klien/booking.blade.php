@extends('layouts.nonav')

@section('content')
<section class="py-4 bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="card shadow-lg border-0 rounded-5 overflow-hidden">
          <div class="row g-0 position-relative">
            <div class="col-md-6 d-none d-md-block position-relative">
              <a href="{{ route('klien.index') }}#studios" class="btn btn-light position-absolute m-3 d-flex align-items-center shadow-sm" style="top: 0; left: 0; z-index: 10; border-radius: 50px; padding: 6px 12px; font-size: 14px;">
                <i class="bi bi-arrow-left me-1"></i>
              </a>
              <img src="{{ asset('storage/' . $Ruangan->foto) }}" alt="Gambar Studio" class="img-fluid h-100 w-100 object-fit-cover">
            </div>
            <div class="col-md-6 bg-white p-5">
              <h3 class="text-center mb-4 fw-bold text-dark">
                Booking Studio <br><span class="text-primary">{{ $Ruangan->nama_ruangan }}</span>
              </h3>
              @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif

              @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ session('error') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif

              {{-- Harga --}}
              <div class="text-center mb-4">
                <div class="text-muted">Harga per Jam</div>
                <div class="fs-4 fw-bold text-primary">
                  Rp {{ number_format($Ruangan->harga, 0, ',', '.') }}
                </div>
              </div>

              {{-- Form --}}
              <form action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="ruangan_id" value="{{ $Ruangan->id }}">
                <input type="hidden" id="harga_per_jam" value="{{ $Ruangan->harga }}">

                {{-- Nama --}}
                <div class="form-group mb-3">
                  <label for="nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                  <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                  @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- Tanggal dan Jam --}}
                <div class="row g-2">
                  <div class="col-md-6">
                    <label for="tanggal" class="form-label">Tanggal Booking <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal') }}">
                    @error('tanggal') <small class="text-danger">{{ $message }}</small> @enderror
                  </div>
                  <div class="col-md-6">
                    <label for="jam" class="form-label">Jam Mulai <span class="text-danger">*</span></label>
                    <input type="time" name="jam" class="form-control @error('jam') is-invalid @enderror" value="{{ old('jam') }}">
                    @error('jam') <small class="text-danger">{{ $message }}</small> @enderror
                  </div>
                </div>

                {{-- Durasi --}}
                <div class="form-group mt-3 mb-3">
                  <label for="durasi" class="form-label">Durasi (jam) <span class="text-danger">*</span></label>
                  <select name="durasi" id="durasi" class="form-select @error('durasi') is-invalid @enderror" onchange="hitungTotal()">
                    <option value="">-- Pilih Durasi --</option>
                    @for($i=1; $i<=8; $i++)
                      <option value="{{ $i }}" {{ old('durasi') == $i ? 'selected' : '' }}>{{ $i }} jam</option>
                    @endfor
                  </select>
                  @error('durasi') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- Total Harga --}}
                <div class="mb-3">
                  <label class="form-label">Total Harga</label>
                  <input type="text" id="total_harga_display" class="form-control bg-light border-0 fw-semibold" readonly>
                </div>

                {{-- Metode Pembayaran --}}
                <div class="form-group mb-3">
                  <label for="metode_bayar" class="form-label">Metode Pembayaran <span class="text-danger">*</span></label>
                  <select name="metode_bayar" id="metode_bayar" class="form-select @error('metode_bayar') is-invalid @enderror" onchange="toggleInfo()">
                    <option value="">-- Pilih Metode Pembayaran --</option>
                    <option value="qris" {{ old('metode_bayar') == 'qris' ? 'selected' : '' }}>QRIS</option>
                    <option value="transfer" {{ old('metode_bayar') == 'transfer' ? 'selected' : '' }}>Transfer Bank</option>
                  </select>
                  @error('metode_bayar') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- Info QRIS --}}
                <div class="mb-3" id="qris-info" style="display: none;">
                  <div class="bg-light p-3 rounded border text-center">
                    <img src="{{ asset('assets/img/qris.png') }}" alt="QRIS" class="img-fluid" style="max-width: 180px;">
                  </div>
                </div>

                {{-- Info Transfer --}}
                <div class="mb-3" id="transfer-info" style="display: none;">
                  <div class="bg-light p-3 rounded border">
                    <div class="text-dark">BCA - 1234567890</div>
                    <div class="text-dark">BRI - 50567890</div>
                    <div class="text-dark">Mandiri - 98765432</div>
                  </div>
                </div>

                {{-- Bukti Pembayaran --}}
                <div class="form-group mb-4">
                  <label for="bukti_pembayaran" class="form-label">Upload Bukti Pembayaran <span class="text-danger">*</span></label>
                  <input type="file" name="bukti_pembayaran" class="form-control @error('bukti_pembayaran') is-invalid @enderror" accept=".jpg,.jpeg,.png">
                  @error('bukti_pembayaran') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2 shadow-sm">Kirim Booking</button>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  function toggleInfo() {
    const metode = document.getElementById('metode_bayar').value;
    document.getElementById('qris-info').style.display = metode === 'qris' ? 'block' : 'none';
    document.getElementById('transfer-info').style.display = metode === 'transfer' ? 'block' : 'none';
  }

  function hitungTotal() {
    const durasi = parseInt(document.getElementById('durasi').value);
    const harga = parseInt(document.getElementById('harga_per_jam').value);
    const total = durasi * harga;
    const formatter = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0
    });
    document.getElementById('total_harga_display').value = durasi ? formatter.format(total) : '';
  }

  window.onload = function() {
    toggleInfo();
    hitungTotal();
  };
</script>
@endsection
