<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tanggal_order');
            $table->string('no_order');
            $table->integer('id_customer');
            $table->string('nama_customer');
            $table->integer('id_kode_kupon')->nullable();
            $table->enum('tipe_order', ['Delivery Service','Self Pickup']);
            $table->text('keterangan')->nullable();
            $table->enum('metode_bayar', ['Transfer','Credit Card','Cicilan']);
            $table->enum('status', ['Pending','Approve Admin','Approve Super Admin','Process','Finish','Cancel']);
            $table->string('tanggal_approve')->nullable();
            $table->string('tanggal_bayar')->nullable();
            $table->string('no_so')->unique()->nullable();
            $table->string('no_invoice')->unique()->nullable();
            $table->integer('id_privilleges')->nullable();
            $table->string('order_by')->nullable();
            $table->enum('tipe_harga_jual', ['Retail','Wholesale']);
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
        Schema::dropIfExists('tb_orders');
    }
}
