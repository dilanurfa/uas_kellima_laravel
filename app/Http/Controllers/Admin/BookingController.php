<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['user', 'ruangan'])->latest()->get();
        return view('admin.booking.index', compact('bookings'));
    }

    public function confirm($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'lunas';
        $booking->save();

        return redirect()->route('admin.booking.index')->with('success', 'Booking disetujui.');
    }

    public function reject($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'ditolak';
        $booking->save();

        return redirect()->route('admin.booking.index')->with('success', 'Booking ditolak.');
    }
}
