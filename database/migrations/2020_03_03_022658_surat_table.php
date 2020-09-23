<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SuratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jenis');
            $table->integer('kategori_id');
            $table->string('nomor_surat');
            $table->string('tanggal_terima');
            $table->string('tanggal_surat');
            $table->string('asal_surat');
            $table->string('tujuan_surat');
            $table->string('perihal');
            $table->string('surat_path');
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
        Schema::dropIfExists('surat');
    }
}
