<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNeracaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('neraca', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bulan_transaksi');
            $table->string('kas');
            $table->string('piutang');
            $table->string('persediaan');
            $table->string('jumlah_aktiva_lancar');
            $table->string('tanah');
            $table->string('bangunan');
            $table->string('peralatan');
            $table->string('kendaraan');
            $table->string('jumlah_aktiva_tetap');
            $table->string('jumlah_aktiva');
            $table->string('hutang_usaha');
            $table->string('hutang_jatuhtempo');
            $table->string('uang_muka_proyek');
            $table->string('jumlah_kewajiban_lancar');
            $table->string('hutang_bank');
            $table->string('hutang_lainnya');
            $table->string('jumlah_kewajiban_jangkapanjang');
            $table->string('modal_disetor');
            $table->string('laba_ditahan');
            $table->string('jumlah_modal');
            $table->string('jumlah_passiva');
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
        Schema::dropIfExists('neraca');
    }
}
