<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = 'Ruangan'; // WAJIB: nama tabel case-sensitive (jika SQLite)

    protected $fillable = [
        'nama_ruangan',
        'harga',
        'durasi',
        'deskripsi',
        'foto',
    ];

    // Relasi ke Booking
    public function bookings() // nama method bebas, best practice: lowercase jamak
    {
        return $this->hasMany(Booking::class, 'ruangan_id', 'id');
    }
}
