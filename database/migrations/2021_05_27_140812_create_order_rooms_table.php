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
            $table->bigInteger('userId')->unsigned();
            
            $table->timestamps();
            $table->date('sDate');
            $table->date('fDate');
            
            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('roomId')->references('id')->on('rooms');
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
