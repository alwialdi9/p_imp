<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRencanaruskasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rencanaruskas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bulan_transaksi_aruskas');
            $table->string('jasa_projek_aruskas');
            $table->string('total_penerimaan_aruskas');
            $table->string('biaya_server_aruskas');
            $table->string('biaya_transportasi_aruskas');
            $table->string('biaya_laporan_aruskas');
            $table->string('gaji_direktur_aruskas');
            $table->string('gaji_staf_aruskas');
            $table->string('biaya_penyusutan_aruskas');
            $table->string('biaya_adm_aruskas');
            $table->string('bunga_bank_aruskas');
            $table->string('biaya_pajak_aruskas');
            $table->string('total_pengeluaran_aruskas');
            $table->string('total_biaya_aruskas');
            $table->string('laba_sblm_pajak_aruskas');
            $table->string('pajak_aruskas');
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
        Schema::dropIfExists('rencanaruskas');
    }
}
