<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // ✅ Tampilkan form booking untuk klien
    public function create($id)
    {
        $Ruangan = Ruangan::findOrFail($id);
        return view('klien.booking', compact('Ruangan'));
    }

    // ✅ Simpan booking dari klien
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ruangan_id'        => 'required|exists:ruangan,id',
            'nama'              => 'required|string|max:100',
            'tanggal'           => 'required|date|after_or_equal:today',
            'jam'               => 'required',
            'durasi'            => 'required|integer|min:1|max:8',
            'metode_bayar'      => 'required|in:qris,transfer',
            'bukti_pembayaran'  => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $ruangan = Ruangan::findOrFail($validated['ruangan_id']);
        $total_harga = $ruangan->harga * $validated['durasi'];

        $buktiPath = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');

        $booking = Booking::create([
            'user_id'           => Auth::id(),
            'ruangan_id'        => $validated['ruangan_id'],
            'nama'              => $validated['nama'],
            'tanggal'           => $validated['tanggal'],
            'jam'               => $validated['jam'],
            'durasi'            => $validated['durasi'],
            'metode_bayar'      => $validated['metode_bayar'],
            'bukti_pembayaran'  => $buktiPath,
            'total_harga'       => $total_harga,
            'status' => 'pending',
        ]);

        return redirect()->route('booking.success', $booking->id)
                         ->with('success', 'Booking berhasil, silakan tunggu konfirmasi admin.');
    }

    // ✅ Halaman sukses setelah booking
    public function success($id)
    {
        $booking = Booking::findOrFail($id);
        return view('klien.thanks', compact('booking'));
    }

    // ✅ Menampilkan bukti booking (untuk klien)
    public function show($id)
    {
        $booking = Booking::where('id', $id)
                          ->where('user_id', Auth::id())
                          ->firstOrFail();
        return view('klien.show', compact('booking'));
    }

    // ✅ Riwayat booking klien
    public function riwayat()
    {
        $bookings = Booking::where('user_id', Auth::id())->latest()->get();
        return view('klien.riwayat', compact('bookings'));
    }

    // ✅ Admin: tampilkan semua booking
    public function booking()
    {
        $bookings = Booking::with(['user', 'ruangan'])->latest()->get();
        return view('admin.booking', compact('bookings'));
    }

    // ✅ Admin: untuk tombol tolak dan terima
    public function updateStatus(Request $request, $id)
    {
    $booking = Booking::findOrFail($id);
    $booking->status = $request->status;
    $booking->save();

    return redirect()->route('admin.dashboard')->with('success', 'Status booking diperbarui.');
    }

    // ✅ Admin: konfirmasi booking
    public function confirm($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'approved';
        $booking->save();

        return redirect()->route('admin.booking')->with('success', 'Booking telah dikonfirmasi.');
    }

    // ✅ Admin: tolak booking
    public function reject($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'rejected';
        $booking->save();

        return redirect()->route('admin.booking')->with('success', 'Booking telah ditolak.');
    }
}
