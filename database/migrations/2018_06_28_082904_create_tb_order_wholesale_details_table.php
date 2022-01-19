<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbOrderWholesaleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_order_wholesale_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_produk');
            $table->bigInteger('harga_satuan');
            $table->integer('qty');
            $table->integer('diskon_1')->null();
            $table->integer('diskon_2')->null();
            $table->integer('diskon_3')->null();
            $table->bigInteger('jumlah_total');
            // $table->text('status');
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
        Schema::dropIfExists('tb_order_wholesale_details');
    }
}
