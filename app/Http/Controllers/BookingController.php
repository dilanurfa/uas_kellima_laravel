<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class BookingController extends Controller
{
    // ✅ Tampilkan form booking studio
    public function create($id)
    {
        $Ruangan = Ruangan::findOrFail($id);
        return view('klien.booking', compact('Ruangan'));
    }

    // ✅ Proses booking & redirect ke halaman QRIS
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'ruangan_id'   => 'required|exists:ruangans,id',
            'nama'         => 'required|string|max:100',
            'tanggal'      => 'required|date|after_or_equal:today',
            'jam'          => 'required',
            'durasi'       => 'required|integer|min:1',
        ]);

        // Hitung total harga
        $ruangan = Ruangan::findOrFail($request->ruangan_id);
        $total_harga = $ruangan->harga * $request->durasi;

        // Simpan booking
        $booking = Booking::create([
            'ruangan_id'       => $ruangan->id,
            'nama'             => $request->nama,
            'tanggal'          => $request->tanggal,
            'jam'              => $request->jam,
            'durasi'           => $request->durasi,
            'total_harga'      => $total_harga,
            'status_pembayaran'=> 'pending',
        ]);

        // Redirect ke halaman QRIS statis
        return redirect()->route('booking.qris', $booking->id);
    }

    // ✅ Tampilkan halaman QRIS
    public function showQris($id)
    {
        $booking = Booking::findOrFail($id);
        return view('klien.qris', compact('booking'));
    }

    // ✅ Konfirmasi pembayaran → redirect ke sukses
    public function confirmPayment($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status_pembayaran = 'lunas';
        $booking->save();

        return redirect()->route('booking.success', $id);
    }

    // ✅ Halaman sukses
    public function success($id)
    {
        $booking = Booking::findOrFail($id);
        return view('klien.booking-sukses', compact('booking'));
    }

    // ✅ Unduh bukti pembayaran
    public function downloadReceipt($id)
    {
        $booking = Booking::findOrFail($id);
        $pdf = Pdf::loadView('klien.bukti-pembayaran', compact('booking'));
        return $pdf->download("Bukti-Pembayaran-Booking-{$booking->id}.pdf");
    }
}
