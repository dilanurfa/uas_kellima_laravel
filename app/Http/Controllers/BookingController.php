<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Booking;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function create($id)
    {
        $Ruangan = Ruangan::findOrFail($id);
        return view('klien.booking', compact('Ruangan'));
    }

    public function store(Request $request) //nyimpen data bukingg yg dikirim dr form
    {
        $request->validate([
            'ruangan_id'        => 'required|exists:ruangan,id',
            'nama'              => 'required|string|max:100',
            'tanggal'           => 'required|date',
            'jam'               => 'required',
            'durasi'            => 'required|integer|min:1|max:8',
            'metode_bayar'      => 'required|in:qris,transfer',
            'bukti_pembayaran'  => 'required|image|mimes:jpg,jpeg,png|max:2048',
            ], [
            'ruangan_id.required'       => 'Ruangan harus dipilih.',
            'ruangan_id.exists'         => 'Ruangan tidak tersedia.',
            'nama.required'             => 'Nama wajib diisi.',
            'nama.string'               => 'Nama harus berupa teks.',
            'nama.max'                  => 'Nama maksimal 100 karakter.',
            'tanggal.required'          => 'Tanggal wajib diisi.',
            'tanggal.date'              => 'Format tanggal tidak valid.',
            'jam.required'              => 'Jam wajib diisi.',
            'durasi.required'           => 'Durasi wajib diisi.',
            'durasi.integer'            => 'Durasi harus berupa angka.',
            'durasi.min'                => 'Durasi minimal 1 jam.',
            'durasi.max'                => 'Durasi maksimal 8 jam.',
            'metode_bayar.required'     => 'Metode pembayaran wajib dipilih.',
            'metode_bayar.in'           => 'Metode pembayaran tidak valid.',
            'bukti_pembayaran.required' => 'Bukti pembayaran wajib diunggah.',
            'bukti_pembayaran.image'    => 'Bukti harus berupa gambar.',
            'bukti_pembayaran.mimes'    => 'Format gambar harus JPG, JPEG, atau PNG.',
            'bukti_pembayaran.max'      => 'Ukuran gambar maksimal 2MB.',
            ]);

    try {
        $startTime = Carbon::createFromFormat('Y-m-d H:i', $request->tanggal.' '.$request->jam)
            ->setTimezone(config('app.timezone'));
    } catch (\Exception $e) {
        return back()->withErrors(['jam' => 'Format waktu tidak valid.'])->withInput();
    }

    $now = Carbon::now(config('app.timezone'));
    if ($startTime->isSameDay($now) && $startTime->lt($now)) {
        return back()->withErrors(['jam' => 'Maaf, waktu yang dipilih sudah berlalu.'])->withInput();
    } elseif ($startTime->lt($now)) {
        return back()->withErrors(['tanggal' => 'Maaf, tanggal yang dipilih sudah berlalu.'])->withInput();
    }

    // hitung waktu selesai dari durasi
    $endTime = (clone $startTime)->addHours((int)$request->durasi);

    // cek bentrok initu
    $bookings = Booking::where('ruangan_id', $request->ruangan_id)
        ->where('tanggal', $request->tanggal)
        ->get();

    foreach ($bookings as $b) {  //ngecek data booking yang nantinya disimpan sementara di $b
        $existingStart = Carbon::createFromFormat('H:i', $b->jam); //ngambil jam mulai  ($b->jam itu buking yg diisi klien) , terus diubah ke format waktu (Carbon) biar bisa dibandingin
        $existingEnd   = (clone $existingStart)->addHours((int)$b->durasi); //dia buat ngitung jam selese dari booking lama. caranya teh: jam mulai + durasi booking



        if ($startTime->lt($existingEnd) && $endTime->gt($existingStart)) {  //intinya klo jam buking baru lebih awal dr jam lama dan jam lama selese buking baru lebi lambat dr jam buking lama pasti eror
            return back()->withInput()->with('error', 'Maaf, waktu booking sudah didahului orang lain.');
        }
    }
    $ruangan = Ruangan::findOrFail($request->ruangan_id);   //nyari data ruangan berdasarkan data yang diterima dan ruangan id
    $total_harga = $ruangan->harga * $request->durasi;    // total harga itu = harga per jam dikali banyak durasi
    $buktiPath = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');  //inima nyimpen file gambar bukti pembayaran


    $booking = Booking::create([   //bikin data baru ke database
        'user_id'           => Auth::id(),    //buat user yg lg login
        'ruangan_id'        => $request->ruangan_id,
        'nama'              => $request->nama,
        'tanggal'           => $request->tanggal,
        'jam'               => $request->jam,
        'durasi'            => $request->durasi,
        'metode_bayar'      => $request->metode_bayar,
        'bukti_pembayaran'  => $buktiPath,
        'total_harga'       => $total_harga,
        'status'            => 'pending',
    ]);

    ////Ini nyimpen id booking ke sesi (session), biar di halaman lain bisa ada kalo mau liat atau dipake
    session()->put('last_booking_id', $booking->id); 
    return redirect()->route('booking.success', $booking->id)
                     ->with('success', 'Booking berhasil, silakan tunggu konfirmasi admin.');
    }


    public function success($id)
    {
        $booking = Booking::findOrFail($id);
        return view('klien.thanks', compact('booking'));
    }

    //ini tu klien.thanks
    public function show($id)
    {
        $booking = Booking::where('id', $id)
                          ->where('user_id', Auth::id())
                          ->firstOrFail();
        return view('klien.show', compact('booking'));
    }


    public function updateStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = $request->status;
        $booking->save();

        return redirect()->route('admin.dashboard')->with('success', 'Status booking diperbarui.');
    }

    public function riwayatAdmin()
    {
        $bookings = Booking::with(['user', 'ruangan'])
                        ->where('status', 'lunas')
                        ->latest()
                        ->get();

        return view('admin.booking.riwayat', compact('bookings'));
    }


    public function download($id)
    {
        $booking = Booking::findOrFail($id);
        $pdf = Pdf::loadView('klien.show-unduh', compact('booking'));
        return $pdf->download('bukti-pembayaran-' . $id . '.pdf');
    }

    //klien riwayat
    public function riwayat()
    {
        $riwayat = Booking::with('ruangan')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('klien.riwayat', compact('riwayat'));
    }

    public function destroy($id) {
    $booking = Booking::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
    $booking->delete();
    return back()->with('success','Pesanan berhasil dihapus.');
    }

    public function cancel($id) {
    $booking = Booking::where('id',$id)->where('user_id',Auth::id())->firstOrFail();
    if($booking->status === 'pending'){
        $booking->delete();
        return back()->with('success','Pesanan berhasil dibatalkan.');
    }
    return back()->with('error','Pesanan sudah diproses, tidak bisa dibatalkan.');
    }
}
