<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTbOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('tb_orders', function (Blueprint $table) {
            $table->string('nama_kupon')->after('id_kode_kupon')->nullable();
            $table->bigInteger('nominal_kupon')->after('nama_kupon')->nullable();
            $table->integer('lokasi_kirim')->after('tipe_order')->nullable();
            $table->integer('id_akun_bank')->after('metode_bayar')->nullable();
            $table->string('nama_bank')->after('id_akun_bank')->nullable();
            $table->integer('total_bayar')->after('nama_bank')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
