<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Booking;

class StoreBookingRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'ruangan_id' => 'required|exists:Ruangan,id',
            'tanggal'    => 'required|date|after_or_equal:today',
            'jam'        => 'required|date_format:H:i',
            'durasi'     => 'required|integer|min:1|max:8',
            'pembayaran' => 'required|in:transfer_bank,cod,e_wallet',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $jam         = $this->jam;
            $durasi      = $this->durasi;
            $tanggal     = $this->tanggal;
            $ruangan_id  = $this->ruangan_id;

            // Hitung waktu selesai booking yang diajukan
            $requested_start = strtotime($jam);
            $requested_end   = strtotime("+{$durasi} hours", $requested_start);

            $bookings = Booking::where('ruangan_id', $ruangan_id)
                ->where('tanggal', $tanggal)
                ->whereIn('status', ['pending', 'approved'])
                ->get();

            foreach ($bookings as $booking) {
                $existing_start = strtotime($booking->jam);
                $existing_end   = strtotime("+{$booking->durasi} hours", $existing_start);

                // Logika tabrakan waktu
                if ($requested_start < $existing_end && $requested_end > $existing_start) {
                    $validator->errors()->add('jam', 'Waktu booking bertabrakan dengan jadwal yang sudah ada.');
                    break;
                }
            }
        });
    }
}
