<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Petty extends Model
{
    //

    protected $table = 'petty';
    protected $fillable = [
        'tanggal', 'nilai_transaksi', 'jenis_transaksi', 'referensi_akun', 'keterangan'
    ];
}