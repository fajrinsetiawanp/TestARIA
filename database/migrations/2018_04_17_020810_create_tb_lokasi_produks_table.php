<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbLokasiProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_lokasi_produks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_lokasi');
            $table->text('alamat');
            $table->string('longitude');
            $table->string('latitude');
            $table->text('deskripsi')->nullable();
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
        Schema::dropIfExists('tb_lokasi_produks');
    }
}
