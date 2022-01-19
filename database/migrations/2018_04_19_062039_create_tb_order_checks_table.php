<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbOrderChecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_order_checks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_order');
            $table->integer('id_jasa_kirim');
            $table->string('jasa_kirim');
            $table->string('tarif_ongkir')->nullable();
            $table->string('no_resi')->nullable();
            $table->string('tanggal_kirim')->nullable();
            $table->string('tanggal_terima')->nullable();
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
        Schema::dropIfExists('tb_order_checks');
    }
}
