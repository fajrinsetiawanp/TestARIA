<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestDokusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_dokus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_invoice');
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('customer_email');
            $table->string('customer_address');
            $table->string('total');
            $table->string('payment_status');
            $table->string('payment_date');
            $table->string('payment_channel');
            $table->string('payment_approval_code');
            $table->string('payment_session_id');
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
        Schema::dropIfExists('test_dokus');
    }
}
