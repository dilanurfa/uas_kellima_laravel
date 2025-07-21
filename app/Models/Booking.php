<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking'; 

    protected $fillable = [
        'user_id',
        'ruangan_id',
        'nama',
        'tanggal',
        'jam',
        'durasi',
        'total_harga',
        'metode_bayar',
        'bukti_pembayaran',
        'status',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class);
    }

    
}
