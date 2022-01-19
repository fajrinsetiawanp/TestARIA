<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbAlamatPengirimenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_alamat_pengirimen', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_order');
            $table->string('nama_depan');
            $table->string('nama_belakang')->nullable();
            $table->string('email')->nullable();
            $table->string('no_handphone')->nullable();
            $table->text('alamat')->nullable();
            $table->integer('id_kota')->nullable();
            $table->string('kota')->nullable();
            $table->integer('id_provinsi')->nullable();
            $table->string('provinsi')->nullable();
            $table->integer('kode_pos')->nullable();
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
        Schema::dropIfExists('tb_alamat_pengirimen');
    }
}
