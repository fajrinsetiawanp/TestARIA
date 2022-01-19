<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbLokasiStokProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_lokasi_stok_produks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_produk');
            $table->integer('id_lokasi');
            $table->string('nama_lokasi');
            $table->integer('jumlah_stok');
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
        Schema::dropIfExists('tb_lokasi_stok_produks');
    }
}
