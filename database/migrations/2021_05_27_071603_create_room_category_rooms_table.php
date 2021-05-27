<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomCategoryRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_category_rooms', function (Blueprint $table) {
            $table->bigInteger('roomsId')->unsigned();
            $table->bigInteger('roomCategoryId')->unsigned();

            $table->primary(['roomsId','roomCategoryId']);
            $table->foreign('roomsId')->references('id')->on('rooms');
            $table->foreign('roomCategoryId')->references('id')->on('room_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_category_rooms');
    }
}
