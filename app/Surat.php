<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $table = 'surat';
    protected $fillable = [
        'jenis', 'kategori_id', 'nomor_surat', 'tanggal_terima', 'tanggal_surat', 'asal_surat', 'tujuan_surat', 'perihal', 'surat_path',
    ];
}
