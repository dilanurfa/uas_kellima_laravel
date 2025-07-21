@extends('layouts.nonav')

@section('content')
<section class="py-4 bg-light">
  <div class="container">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
      <a href="{{ route('klien.index') }}"
         class="btn btn-outline-secondary rounded-circle d-flex align-items-center justify-content-center"
         data-bs-toggle="tooltip" title="Kembali"
         style="width:45px;height:45px;">
        <i class="bi bi-arrow-left fs-5"></i>
      </a>
      <h3 class="fw-bold mb-0">Riwayat Booking Anda</h3>
      <div style="width:45px;"></div>
    </div>

    {{-- ✅ NOTIFIKASI SESSION --}}
    @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    @if (session('error'))
      <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    @forelse ($riwayat as $item)
      <div class="card border-0 shadow-sm rounded-4 mb-4 overflow-hidden">
        <div class="row g-0 align-items-stretch">

          {{-- FOTO --}}
          <div class="col-md-3">
            <div class="h-100 w-100 bg-light">
              @if($item->ruangan && $item->ruangan->foto)
                <img src="{{ asset('storage/' . $item->ruangan->foto) }}" class="img-fluid h-100 w-100 object-fit-cover" alt="Foto Studio">
              @else
                <div class="d-flex align-items-center justify-content-center h-100 text-muted">
                  <i class="bi bi-image fs-1"></i>
                </div>
              @endif
            </div>
          </div>

          {{-- DETAIL --}}
          <div class="col-md-6 p-3 d-flex flex-column justify-content-between">
            <div>
              <h5 class="fw-bold mb-1">{{ $item->ruangan->nama_ruangan ?? '-' }}</h5>
              <div class="small text-muted mb-1">
                <i class="bi bi-calendar-event me-1"></i>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}
                <i class="bi bi-clock ms-3 me-1"></i>{{ $item->jam }} ({{ $item->durasi }} jam)
              </div>
            </div>
            <div class="mt-2">
              <span class="fw-bold text-primary fs-5">Rp {{ number_format($item->total_harga,0,',','.') }}</span>
            </div>
          </div>

          {{-- STATUS + AKSI --}}
          <div class="col-md-3 d-flex flex-column justify-content-between p-3 bg-light">
            <div class="d-flex justify-content-end mb-2">
              @if($item->status === 'pending')
                <span class="badge bg-warning text-dark rounded-pill px-3 py-2">Menunggu</span>
              @elseif($item->status === 'approved')
                <span class="badge bg-success rounded-pill px-3 py-2">Disetujui</span>
              @elseif($item->status === 'rejected')
                <span class="badge bg-danger rounded-pill px-3 py-2">Ditolak</span>
              @elseif($item->status === 'lunas')
                <span class="badge bg-primary rounded-pill px-3 py-2">Selesai</span>
              @else
                <span class="badge bg-secondary rounded-pill px-3 py-2">{{ ucfirst($item->status) }}</span>
              @endif
            </div>

            {{-- Tombol Aksi --}}
            <div class="d-flex justify-content-center flex-wrap gap-2">
              {{-- Detail --}}
              <a href="{{ route('klien.show',$item->id) }}"
                 class="btn btn-outline-primary rounded-circle d-flex align-items-center justify-content-center"
                 data-bs-toggle="tooltip" title="Detail"
                 style="width:42px;height:42px;">
                <i class="bi bi-info-circle fs-6"></i>
              </a>

              {{-- Chat --}}
              <a href="#"
                 class="btn btn-outline-secondary rounded-circle d-flex align-items-center justify-content-center"
                 data-bs-toggle="tooltip" title="Chat"
                 style="width:42px;height:42px;">
                <i class="bi bi-chat-dots fs-6"></i>
              </a>

              {{-- Hapus (berdekatan dengan chat) --}}
              <form action="{{ route('klien.delete',$item->id) }}" method="POST"
                    onsubmit="return confirm('Hapus pesanan ini secara permanen?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="btn btn-outline-danger rounded-circle d-flex align-items-center justify-content-center"
                        data-bs-toggle="tooltip" title="Hapus"
                        style="width:42px;height:42px;">
                  <i class="bi bi-trash fs-6"></i>
                </button>
              </form>

              {{-- Batalkan jika pending --}}
              @if($item->status === 'pending')
                <form action="{{ route('klien.cancel',$item->id) }}" method="POST"
                      onsubmit="return confirm('Yakin membatalkan pesanan ini?');">
                  @csrf
                  <button type="submit"
                          class="btn btn-outline-warning rounded-circle d-flex align-items-center justify-content-center"
                          data-bs-toggle="tooltip" title="Batalkan"
                          style="width:42px;height:42px;">
                    <i class="bi bi-x-circle fs-6"></i>
                  </button>
                </form>
              @endif
            </div>
          </div>
        </div>

        {{-- RATING DAN ULASAN --}}
        @if($item->status === 'lunas')
          <div class="p-3 border-top bg-white">
            @if($item->rating)
              <div class="mb-2">
                <strong>Rating Anda:</strong><br>
                @for($i=1; $i<=5; $i++)
                  @if($i <= $item->rating)
                    <i class="bi bi-star-fill text-warning fs-5"></i>
                  @else
                    <i class="bi bi-star text-warning fs-5"></i>
                  @endif
                @endfor
              </div>
              @if($item->ulasan)
                <p class="mb-0"><strong>Ulasan:</strong> {{ $item->ulasan }}</p>
              @endif
            @else
              <form method="POST" action="{{ route('klien.riwayat') }}">
                @csrf
                <input type="hidden" name="booking_id" value="{{ $item->id }}">
                <div class="mb-2">
                  <strong>Beri Rating:</strong><br>
                  <div id="rating-{{ $item->id }}" class="mb-2">
                    @for($i=1; $i<=5; $i++)
                      <i class="bi bi-star text-warning fs-4" data-rate="{{ $i }}"></i>
                    @endfor
                  </div>
                  <input type="hidden" name="rating" id="rating-input-{{ $item->id }}" required>
                </div>
                <div class="mb-2">
                  <textarea class="form-control" name="ulasan" rows="2" placeholder="Tulis ulasan Anda..." required></textarea>
                </div>
                <button type="submit" class="btn btn-sm btn-primary rounded-pill">Kirim Ulasan</button>
              </form>
            @endif
          </div>
        @endif
      </div>
    @empty
      <div class="text-center py-5">
        <i class="bi bi-journal-x fs-1 text-muted"></i>
        <p class="mt-3 mb-0 text-muted">Belum ada riwayat booking.</p>
      </div>
    @endforelse

  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded',function(){
  var tooltipTriggerList=[].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  tooltipTriggerList.map(function(el){return new bootstrap.Tooltip(el)})

  // Rating interaktif
  document.querySelectorAll('[id^="rating-"]').forEach(function(container){
    const id=container.id.split('-')[1];
    const stars=container.querySelectorAll('i');
    stars.forEach(star=>{
      star.addEventListener('click',function(){
        const rate=this.getAttribute('data-rate');
        document.getElementById('rating-input-'+id).value=rate;
        stars.forEach((s,i)=>{
          if(i<rate){
            s.classList.remove('bi-star');
            s.classList.add('bi-star-fill');
          }else{
            s.classList.remove('bi-star-fill');
            s.classList.add('bi-star');
          }
        });
      });
    });
  });
});
</script>
@endsection
