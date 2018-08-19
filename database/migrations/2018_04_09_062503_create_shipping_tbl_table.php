<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingTblTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_tbl', function (Blueprint $table) {
            $table->increments('shipping_id');
            $table->string('shipping_email');
            $table->string('shipping_first_name');
            $table->string('shipping_last_name');
            $table->string('shipping_address');
            $table->string('shipping_mobile_number');
            $table->string('shipping_city');
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
        Schema::dropIfExists('shipping_tbl');
    }
}
