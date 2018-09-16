<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReparasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reparasi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reparasi_id');
            $table->integer('barang_id');
            $table->foreign('barang_id')->references('id')->on('barang')->onDelete('CASCADE');
            $table->integer('jumlah_barang');
            $table->text('keterangan_reparasi');
            $table->integer('status');
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
        Schema::dropIfExists('reparasi');
    }
}
