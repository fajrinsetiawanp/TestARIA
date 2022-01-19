<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_customers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->nullable();
            $table->string('nama_depan');
            $table->string('nama_belakang')->nullable();
            $table->string('email')->nullable();
            $table->string('no_handphone')->nullable();
            $table->string('fax')->nullable();
            $table->text('alamat')->nullable();
            $table->integer('id_kota')->nullable();
            $table->string('kota')->nullable();
            $table->integer('id_provinsi')->nullable();
            $table->string('provinsi')->nullable();
            $table->integer('kode_pos')->nullable();
            $table->enum('tipe', ['Member','Non Member'])->default('Non Member');
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
        Schema::dropIfExists('tb_customers');
    }
}
