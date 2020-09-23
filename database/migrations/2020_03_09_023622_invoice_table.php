<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomor_faktur');
            $table->string('tanggal_invoice');
            $table->string('alamat');
            $table->integer('pelanggan_id');
            $table->string('jatuh_tempo');
            $table->string('metode_pembayaran');
            $table->integer('telepon');
            $table->string('keterangan');
            $table->string('pajak');
            $table->integer('kuantitas');
            $table->string('harga_satuan');
            $table->integer('harga_penjualan');
            $table->string('terbilang');
            $table->string('pelanggan');
            $table->string('faximile');
            $table->string('total_tagihan');
            $table->string('status_invoice');
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
        Schema::dropIfExists('invoice');
    }
}
