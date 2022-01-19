<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbMasterKuponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_master_kupons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_kupon');
            $table->string('kode_kupon');
            $table->string('tanggal_awal');
            $table->string('tanggal_akhir');
            $table->integer('diskon');
            $table->integer('jumlah_kupon');
            $table->integer('jumlah_kupon_customer');
            $table->enum('status',['Aktif','Tidak Aktif']);
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
        Schema::dropIfExists('tb_master_kupons');
    }
}
