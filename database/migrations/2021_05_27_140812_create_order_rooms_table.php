<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_rooms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('roomId')->unsigned();
            $table->bigInteger('orderId')->unsigned();
            $table->date('sDate');
            $table->date('fDate');

            $table->foreign('roomId')->references('id')->on('rooms');
            $table->foreign('orderId')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_rooms');
    }
}
