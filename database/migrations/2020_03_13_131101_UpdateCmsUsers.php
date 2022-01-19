<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCmsUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('cms_users', function (Blueprint $table) {
            //
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->string('account_number')->nullable();
            $table->string('bank')->nullable();
            $table->string('location_branch')->nullable();
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
