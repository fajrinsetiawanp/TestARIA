<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbOrderWholesalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_order_wholesales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_to');
	    $table->integer('id_sales);
            $table->string('nama_sales');
            $table->string('no_so');
            $table->string('no_order')->null();
            $table->string('tanggal');
            $table->integer('id_customer');
            $table->string('payment_terms');
            $table->string('payment_type');
            $table->string('jasa_kirim');
            $table->string('kota_tujuan');
            $table->bigInteger('tarif_ongkir');
            $table->bigInteger('total_bayar')->null();
            $table->enum('status', ['Approved', 'Rejected', 'Hold']);
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
        Schema::dropIfExists('tb_order_wholesales');
    }
}
