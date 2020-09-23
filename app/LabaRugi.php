<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LabaRugi extends Model
{
    //
    protected $table = 'labarugi';
    protected $fillable = [
        'bulan_transaksi', 'jasa_projek', 'total_penerimaan', 'svr', 'transportasi', 'laporan', 'lain_lain_biayaprojek', 'total_biaya_projek', 'gaji_direktur', 'gaji_staf', 'biaya_penyusutan_labarugi', 'total_biaya_tetap', 'atk', 'listrik_air_telepon', 'internet', 'lain_lain_administrasi', 'total_biaya_administrasi', 'laba_sb_pajak', 'pajak_adm', 'laba_bersih_adm',
    ];
}
