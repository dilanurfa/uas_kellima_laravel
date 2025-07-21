<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class KlienController extends Controller
{
    // ✅ Halaman utama klien (menampilkan ruangan + ulasan)
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

    public function dashboard()
    {
        return view('klien.dashboard');
    }

    // ✅ Halaman riwayat + proses kirim ulasan
    public function riwayat(Request $request)
    {
        // Jika POST → simpan ulasan
        if ($request->isMethod('post')) {
            $request->validate([
                'booking_id' => 'required|exists:booking,id',
                'rating'     => 'required|integer|min:1|max:5',
                'ulasan'     => 'required|string|max:1000',
            ]);

            $booking = Booking::findOrFail($request->booking_id);

            // pastikan milik user login
            if ($booking->user_id !== auth()->id()) {
                return back()->with('error', 'Tidak diizinkan.');
            }

            // pastikan statusnya lunas
            if ($booking->status !== 'lunas') {
                return back()->with('error', 'Booking belum selesai.');
            }

            // simpan rating & ulasan
            $booking->rating = $request->rating;
            $booking->ulasan = $request->ulasan;
            $booking->save();

            // redirect ke halaman index dengan notifikasi
            return redirect()
                ->route('klien.riwayat')
                ->with('success', 'Terima kasih! Ulasan Anda tersimpan.');
        }

        // Jika GET → tampilkan riwayat
        $riwayat = Booking::with('ruangan')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('klien.riwayat', compact('riwayat'));
    }
}
