<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_transaksi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('akun_id');
            $table->date('tanggal');
            $table->date('jatuh_tempo');
            // $table->enum('jenis',[]);
            $table->string('keterangan');
            $table->string('jumlah');
            $table->enum('status', ['quote', 'berjalan', 'selesai']);
            $table->string('tag');
            $table->string('catatan');
            $table->integer('created_by');
            $table->integer('updated_by');
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
        Schema::dropIfExists('t_transaksi');
    }
}
