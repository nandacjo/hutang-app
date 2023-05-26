<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiHutang extends Model
{
    use HasFactory;

    public $table = 'table_transaski_hutang';

    protected $casts = [
        'tanggal' => 'datetime',
    ];

    protected $fillable = [
        'tanggal',
        'pelanggan_id',
        'jumlah',
        'keterangan',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }
}
