<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiHutang extends Model
{
    use HasFactory;


    protected $casts = [
        'tanggal_hutang' => 'datetime',
        'tanggal_jatuh_tempo' => 'datetime',
    ];

    protected $guarded = ['id'];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }
}
