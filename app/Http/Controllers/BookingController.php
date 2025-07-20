<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
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

        // Gabungkan tanggal dan jam
        try {
            $waktuBooking = Carbon::createFromFormat('Y-m-d H:i', $request->tanggal . ' ' . $request->jam)
                                  ->setTimezone(config('app.timezone'));
        } catch (\Exception $e) {
            return back()->withErrors(['jam' => 'Format waktu tidak valid.'])->withInput();
        }

        $now = Carbon::now(config('app.timezone'));

        if ($waktuBooking->isSameDay($now)) {
            if ($waktuBooking->lt($now)) {
                return back()->withErrors(['jam' => 'Maaf, waktu yang dipilih sudah berlalu.'])->withInput();
            }
        } elseif ($waktuBooking->lt($now)) {
            return back()->withErrors(['tanggal' => 'Maaf, tanggal yang dipilih sudah berlalu.'])->withInput();
        }

        $ruangan = Ruangan::findOrFail($request->ruangan_id);
        $total_harga = $ruangan->harga * $request->durasi;

        $buktiPath = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');

        $booking = Booking::create([
            'user_id'           => Auth::id(),
            'ruangan_id'        => $request->ruangan_id,
            'nama'              => $request->nama,
            'tanggal'           => $request->tanggal,
            'jam'               => $request->jam,
            'durasi'            => $request->durasi,
            'metode_bayar'      => $request->metode_bayar,
            'bukti_pembayaran'  => $request->buktipath,
            'total_harga'       => $request->total_harga,
            'status'            => 'pending',
        ]);

        session()->put('last_booking_id', $booking->id);

        return redirect()->route('booking.success', $booking->id)
                         ->with('success', 'Booking berhasil, silakan tunggu konfirmasi admin.');
    }

    public function success($id)
    {
        $booking = Booking::findOrFail($id);
        return view('klien.thanks', compact('booking'));
    }

    public function show($id)
    {
        $booking = Booking::where('id', $id)
                          ->where('user_id', Auth::id())
                          ->firstOrFail();
        return view('klien.show', compact('booking'));
    }

    public function riwayat()
    {
        $bookings = Booking::where('user_id', Auth::id())->latest()->get();
        return view('klien.riwayat', compact('bookings'));
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

}
