<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBookingRequest;


class BookingController extends Controller
{
    // Form booking untuk klien
    public function create(Ruangan $Ruangan)
    {
        return view('klien.booking', compact('Ruangan'));
    }

    // Simpan booking oleh klien
    public function store(StoreBookingRequest $request)
{
    $validated = $request->validated();
     //dd($validated); 

    Booking::create([
        'user_id'      => Auth::id(),
        'ruangan_id'   => $validated['ruangan_id'],
        'tanggal'      => $validated['tanggal'],
        'jam'          => $validated['jam'],
        'durasi'       => $validated['durasi'],
        'metode_bayar' => $validated['pembayaran'],
        'status'       => 'pending',
        
    ]);

    return redirect()->route('booking.thanks');
}

    // Halaman thanks setelah booking
    public function thanks()
    {
        return view('klien.thanks');
    }

    // Tampilkan semua booking ke admin (bukan index, method nama booking)
    public function booking()
    {
        $bookings = Booking::with(['user', 'ruangan'])->orderBy('created_at', 'desc')->get();
        return view('admin.booking', compact('bookings'));
    }

    // Konfirmasi booking oleh admin
    public function confirm($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'approved';
        $booking->save();

        return back()->with('success', 'Booking telah dikonfirmasi.');
    }

    // Tolak booking oleh admin
    public function reject($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'rejected';
        $booking->save();

        return back()->with('success', 'Booking telah ditolak.');
    }
    public function riwayat()
{
    $riwayat = Booking::with('ruangan')
                ->where('user_id', Auth::id())
                ->orderBy('created_at', 'desc')
                ->get();

    return view('klien.riwayat', compact('riwayat'));
}
}
