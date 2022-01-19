<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_produks', function (Blueprint $table) {
            $table->increments('id_produk');
            $table->string('kode_produk')->unique();
            $table->string('kode_sku')->unique();
            $table->string('judul');
            $table->mediumText('deskripsi_singkat')->nullable();
            $table->text('spesifikasi_produk');
            $table->string('berat');
            $table->integer('id_sub_kategori');
            $table->string('kategori');
            $table->integer('id_manufaktur');
            $table->string('manufaktur');
            $table->enum('label_produk', ['Baru','Promo','Populer','Harga Terbaik','Standar']);
            $table->enum('status', ['Aktif','Tidak Aktif']);
            $table->string('gambar');
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
        Schema::dropIfExists('tb_produks');
    }
}
