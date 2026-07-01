<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rute extends Model
{
    // Memastikan Laravel membaca tabel bernama 'rutes' di database Anda
    protected $table = 'rutes';

    protected $fillable = [
        'asal',
        'tujuan',
        'jarak',
        'harga',
        'status'
    ];

    /**
     * Relasi ke Jadwal (Satu rute bisa memiliki banyak jadwal kapal)
     */
    public function jadwals()
    {
        return $this->hasMany(Jadwal::class, 'rute_id');
    }
}