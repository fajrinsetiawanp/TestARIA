<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbOrderTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_order_teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tanggal_order');
            $table->string('no_order')->unique();
            $table->string('no_invoice')->unique();
            $table->text('keterangan')->nullable();
            $table->string('metode_bayar')->nullable();
            $table->string('status');
            $table->string('order_by')->nullable();
            $table->string('nama_customer');
            $table->string('email_customer')->nullable();
            $table->string('phone_customer')->nullable();
            $table->string('alamat_customer');
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
        Schema::dropIfExists('tb_order_teachers');
    }
}
