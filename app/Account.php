<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'account';
    protected $fillable = [
        'id',
        'nama_akun',
        'nomor_akun',
        'deskripsi',
        'nomor_kategori',
        'nama_kategori',
        'total',
        'nama_pajak',
    ];
}
