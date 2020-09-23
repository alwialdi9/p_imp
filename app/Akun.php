<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    protected $table = 'm_akun';
    protected $fillable = [
        'id','kode_akun','nama_akun','kategori_akun',
    ];
}
