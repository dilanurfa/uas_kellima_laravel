<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['user', 'ruangan'])
            ->whereNotIn('status', ['lunas']) // agar tidak tampilkan riwayat
            ->latest()
            ->get();

        return view('admin.booking.index', compact('bookings'));
    }

    public function confirm($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'approved';
        $booking->save();

        return redirect()->route('admin.booking.index')->with('success', 'Booking disetujui.');
    }

    public function reject($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'rejected';
        $booking->save();

        return redirect()->route('admin.booking.index')->with('success', 'Booking ditolak.');
    }
    
    public function selesaikan($id)
    {
        $booking = Booking::findOrFail($id);

        if ($booking->status === 'approved') {
            $booking->status = 'lunas';
            $booking->save();

            return back()->with('success', 'Booking telah ditandai sebagai selesai.');
        }

        return back()->with('error', 'Hanya booking yang sudah disetujui bisa ditandai selesai.');
    }

}
