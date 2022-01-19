<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTbToko extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_tokos', function (Blueprint $table) {
            $table->string('provinsi')->after('no_handphone')->nullable();
            $table->string('kota')->after('provinsi')->nullable();
            $table->integer('kode_pos')->after('kota')->nullable();
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
