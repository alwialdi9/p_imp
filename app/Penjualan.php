<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    //
    protected $table = 'penjualan';
    protected $fillable = [
        'tanggal', 'status_penjualan', 'nomor_faktur', 'referensi_akun', 'total', 'nama_pelanggan'
    ];
}
