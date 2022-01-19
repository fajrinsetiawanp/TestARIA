<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelsTbOrderDetailTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_order_detail_teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_order');
            $table->integer('id_produk');
            $table->integer('qty');
            $table->bigInteger('harga_satuan');
            $table->integer('diskon')->nullable();
            $table->bigInteger('total');
            $table->string('reward_percent')->nullable();
            $table->string('reward_point')->nullable();
            $table->bigInteger('reward_total')->nullable();
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
        Schema::dropIfExists('tb_order_detail_teachers');
    }
}
