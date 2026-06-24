<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable = [
        'kapal_id',
        'rute_id',
        'tanggal_berangkat',
        'jam_berangkat',
        'stok_tiket'
    ];

    public function kapal()
    {
        return $this->belongsTo(Kapal::class);
    }

    public function rute()
    {
        return $this->belongsTo(Rute::class);
    }
}
