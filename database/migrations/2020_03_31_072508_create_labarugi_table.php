<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabarugiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labarugi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bulan_transaksi');
            $table->string('jasa_projek');
            $table->string('total_penerimaan');
            $table->string('svr');
            $table->string('transportasi');
            $table->string('laporan');
            $table->string('lain_lain_biayaprojek');
            $table->string('total_biaya_projek');
            $table->string('gaji_direktur');
            $table->string('gaji_staf');
            $table->string('biaya_penyusutan_labarugi');
            $table->string('total_biaya_tetap');
            $table->string('atk');
            $table->string('listrik_air_telepon');
            $table->string('internet');
            $table->string('lain_lain_administrasi');
            $table->string('total_biaya_administrasi');
            $table->string('laba_sb_pajak');
            $table->string('pajak_adm');
            $table->string('laba_bersih_adm');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('labarugi');
    }
}
