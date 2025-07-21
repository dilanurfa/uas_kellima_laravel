<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = 'Ruangan'; 

    protected $fillable = [
        'nama_ruangan',
        'harga',
        'durasi',
        'deskripsi',
        'foto',
    ];

   
    public function booking() 
    {
        return $this->hasMany(Booking::class, 'ruangan_id', 'id');
    }
}
