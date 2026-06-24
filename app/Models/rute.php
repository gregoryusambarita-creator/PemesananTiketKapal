<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rute extends Model
{
    protected $fillable = [
        'asal',
        'tujuan',
        'jarak',
        'harga',
        'status'
    ];
}