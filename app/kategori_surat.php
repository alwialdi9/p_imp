<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori_surat extends Model
{
    protected $table = "kategori_surat";
    protected $fillable = [
        'nama_kategori',
    ];
}
