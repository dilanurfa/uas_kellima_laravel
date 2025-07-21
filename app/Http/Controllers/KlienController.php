<?php

namespace App\Http\Controllers; // ✅ ini yang benar

use App\Models\Booking;
use Illuminate\Http\Request; // ✅ gunakan request yang benar
use Illuminate\Support\Facades\Auth;
use App\Models\Ruangan;

class KlienController extends Controller
{

public function index() {
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

   public function riwayat(Request $request)
{
    // kalau POST berarti kirim ulasan
    if ($request->isMethod('post')) {
        $request->validate([
            'booking_id' => 'required|exists:booking,id',
            'rating'     => 'required|integer|min:1|max:5',
            'ulasan'     => 'required|string|max:1000',
        ]);

        $booking = \App\Models\Booking::findOrFail($request->booking_id);

        // pastikan milik user yang login
        if ($booking->user_id !== auth()->id()) {
            return back()->with('error','Tidak diizinkan.');
        }

        // pastikan statusnya lunas
        if ($booking->status !== 'lunas') {
            return back()->with('error','Belum selesai.');
        }

        // simpan rating & ulasan
        $booking->rating = $request->rating;
        $booking->ulasan = $request->ulasan;
        $booking->save();

        // setelah simpan → redirect ke klien.index
        return redirect()->route('klien.index')->with('success','Terima kasih! Ulasan Anda tersimpan.');
    }

    // kalau GET, tampilkan halaman riwayat
    $riwayat = \App\Models\Booking::with('ruangan')
                ->where('user_id', auth()->id())
                ->latest()
                ->get();

    return view('klien.riwayat', compact('riwayat'));
}

}
