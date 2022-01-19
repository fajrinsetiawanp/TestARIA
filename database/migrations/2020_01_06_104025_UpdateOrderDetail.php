<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateOrderDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('tb_order_details', function (Blueprint $table) {
            $table->string('reward_percent')->nullable()->after('total');
            $table->string('reward_point')->nullable()->after('reward_percent');
            $table->bigInteger('reward_total')->nullable()->after('reward_point');
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
