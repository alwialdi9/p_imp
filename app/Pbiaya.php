<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pbiaya extends Model
{
    protected $table = 'biaya';
    protected $fillable = [
        'tanggal', 'penerima', 'jenis_biaya', 'status', 'referensi_akun', 'tag', 'keterangan', 'total'
    ];
}
