<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreBookingRequest;

class BookingController extends Controller
{
    // ✅ Form booking
    public function create(Ruangan $Ruangan)
    {
        return view('klien.booking', compact('Ruangan'));
    }

    // ✅ Simpan booking
    public function store(StoreBookingRequest $request)
    {
        $validated = $request->validated();

        // Jika ada bukti pembayaran yang diupload
        $buktiPembayaran = null;
        if ($request->hasFile('bukti_pembayaran')) {
            $buktiPembayaran = $request->file('bukti_pembayaran')->store('bukti', 'public');
        }

        $booking = Booking::create([
            'user_id'          => Auth::id(),
            'ruangan_id'       => $validated['ruangan_id'],
            'tanggal'          => $validated['tanggal'],
            'jam'              => $validated['jam'],
            'durasi'           => $validated['durasi'],
            'metode_bayar'     => $validated['pembayaran'],
            'bukti_pembayaran' => $buktiPembayaran,
            'status'           => 'pending',
        ]);

        return redirect()->route('booking.thanks', ['id' => $booking->id]);
    }

    // ✅ Halaman ucapan terima kasih + opsi unduh/cancel
    public function thanks($id)
    {
        $booking = Booking::with('ruangan')->findOrFail($id);

        return view('klien.thanks', compact('booking'));
    }

    // ✅ Admin melihat semua booking
    public function booking()
    {
        $bookings = Booking::with(['user', 'ruangan'])->orderBy('created_at', 'desc')->get();
        return view('admin.booking', compact('bookings'));
    }

    // ✅ Admin konfirmasi booking
    public function confirm($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'approved';
        $booking->save();

        return back()->with('success', 'Booking telah dikonfirmasi.');
    }

    // ✅ Admin tolak booking
    public function reject($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'rejected';
        $booking->save();

        return back()->with('success', 'Booking telah ditolak.');
    }

    // ✅ Riwayat booking user
    public function riwayat()
    {
        $riwayat = Booking::with('ruangan')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('klien.riwayat', compact('riwayat'));
    }

    // ✅ Download bukti pembayaran
    public function downloadBukti($id)
    {
        $booking = Booking::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        if ($booking->bukti_pembayaran && Storage::disk('public')->exists($booking->bukti_pembayaran)) {
            return Storage::disk('public')->download($booking->bukti_pembayaran);
        }

        return back()->with('error', 'Bukti pembayaran tidak ditemukan.');
    }

    // ✅ Batalkan booking
    public function cancel($id)
    {
        $booking = Booking::where('id', $id)
            ->where('user_id', Auth::id())
            ->where('status', 'pending')
            ->firstOrFail();

        $booking->status = 'cancelled';
        $booking->save();

        return redirect()->route('klien.riwayat')->with('success', 'Booking berhasil dibatalkan.');
    }
}
