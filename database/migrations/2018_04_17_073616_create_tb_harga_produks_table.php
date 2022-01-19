<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbHargaProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_harga_produks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_produk');
            $table->integer('qty')->default(1);
            $table->bigInteger('harga')->unsigned();
            $table->integer('diskon')->nullable();
            $table->enum('jenis_harga',['Retail','Wholesale']);
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
        Schema::dropIfExists('tb_harga_produks');
    }
}
