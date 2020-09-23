<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $table = 'pembelian';
    protected $fillable = [
        'tanggal', 'status_pembelian', 'nomor_faktur', 'referensi_akun', 'total', 'supplier'
    ];
}
