<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = "invoice";

    protected $fillable = [
        'nomor_faktur',
        'tanggal_invoice',
        'pelanggan_id',
        'alamat',
        'telepon',
        'faximile',
        'jatuh_tempo',
        'metode_pembayaran',
        'keterangan',
        'kuantitas',
        'harga_satuan',
        'harga_penjualan',
        'pajak',
        'total_tagihan',
        'terbilang',
        'pelanggan',
        'status_invoice',
    ];
}
