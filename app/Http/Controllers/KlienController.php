<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class KlienController extends Controller
{
    //ini tu biar ruangan sama ulasan muncul di index klien
    public function index()
    {
        $ruangan = Ruangan::all();

        $ulasanList = Booking::with('ruangan')
            ->whereNotNull('rating')
            ->whereNotNull('ulasan')
            ->latest()
            ->get();

        return view('klien.index', compact('ruangan', 'ulasanList'));
    }



    // ini klien.riwayat
    public function riwayat(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'booking_id' => 'required|exists:booking,id',
                'rating'     => 'required|integer|min:1|max:5',
                'ulasan'     => 'required|string|max:1000',
            ]);

            $booking = Booking::findOrFail($request->booking_id);

            if ($booking->user_id !== auth()->id()) {
                return back()->with('error', 'Tidak diizinkan.');
            }

            if ($booking->status !== 'lunas') {
                return back()->with('error', 'Booking belum selesai.');
            }

            $booking->rating = $request->rating;
            $booking->ulasan = $request->ulasan;
            $booking->save();

            return redirect()
                ->route('klien.riwayat')
                ->with('success', 'Terima kasih! Ulasan Anda tersimpan.');
        }

        $riwayat = Booking::with('ruangan')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('klien.riwayat', compact('riwayat'));
    }
}
