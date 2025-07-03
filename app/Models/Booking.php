<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'Booking'; 

    protected $fillable = [
        'user_id',
        'ruangan_id',
        'tanggal',
        'jam',
        'durasi',
        'metode_bayar',
        'status',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'ruangan_id');
    }
}
