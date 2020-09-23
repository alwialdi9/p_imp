<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Neraca extends Model
{
    protected $table = 'neraca';
    protected $fillable = [
        'bulan_transaksi', 'kas', 'piutang', 'persediaan', 'jumlah_aktiva_lancar', 'tanah', 'bangunan', 'peralatan', 'kendaraan', 'jumlah_aktiva_tetap', 'jumlah_aktiva', 'hutang_usaha', 'hutang_jatuhtempo', 'uang_muka_proyek', 'jumlah_kewajiban_lancar', 'hutang_bank', 'hutang_lainnya', 'jumlah_kewajiban_jangkapanjang', 'modal_disetor', 'laba_ditahan', 'jumlah_modal', 'jumlah_passiva'
    ];
}
