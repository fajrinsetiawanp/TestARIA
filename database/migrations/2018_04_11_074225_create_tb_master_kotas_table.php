<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbMasterKotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_master_kotas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kota');
            $table->char('nama');
            $table->char('tipe')->nullable();
            $table->integer('kode_pos');
            $table->integer('id_provinsi');
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
        Schema::dropIfExists('tb_master_kotas');
    }
}
