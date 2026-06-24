<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $fillable = [
        'jadwal_id',
        'nama_penumpang',
        'nik',
        'telepon',
        'jumlah_tiket',
        'total_harga',
        'status'
    ];

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }
}