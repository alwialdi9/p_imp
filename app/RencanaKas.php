<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RencanaKas extends Model
{
    protected $table = 'rencanaruskas';
    protected $fillable = [
        'bulan_transaksi_aruskas', 'jasa_projek_aruskas', 'total_penerimaan_aruskas', 'biaya_server_aruskas', 'biaya_transportasi_aruskas', 'biaya_laporan_aruskas', 'gaji_direktur_aruskas', 'gaji_staf_aruskas', 'biaya_penyusutan_aruskas', 'biaya_adm_aruskas', 'bunga_bank_aruskas', 'biaya_pajak_aruskas', 'total_pengeluaran_aruskas', 'total_biaya_aruskas', 'laba_sblm_pajak_aruskas', 'pajak_aruskas',
    ];
}
