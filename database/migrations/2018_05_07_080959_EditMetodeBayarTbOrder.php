<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditMetodeBayarTbOrder extends Migration
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
            $table->dropColumn('metode_bayar');
            $table->dropColumn('id_akun_bank');
            $table->dropColumn('nama_bank');
            $table->string('payment_type')->after('keterangan')->nullable();
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
