<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BayarHutang extends Model
{
    use HasFactory;

    protected $casts = [
        'tanggal_bayar' => 'datetime'
    ];
    protected $guarded = ['id'];
}
