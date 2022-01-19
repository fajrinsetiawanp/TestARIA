<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbArtikelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_artikels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul');
            $table->string('deskripsi_singkat')->nullable();
            $table->text('deskripsi');
            $table->string('gambar');
            $table->integer('id_kategori_artikel');
            $table->enum('status', ['Aktif','Draft','Tidak Aktif']);
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
        Schema::dropIfExists('tb_artikels');
    }
}
