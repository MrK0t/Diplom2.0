<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('roomTypeId')->unsigned();
            $table->bigInteger('buildingId')->unsigned();
            $table->string('roomNumber', 5);
            $table->string('image', 101);
            $table->text('description', 301);
            $table->boolean('isFree');

            $table->foreign('roomTypeId')->references('id')->on('room_types');
            $table->foreign('buildingId')->references('id')->on('buildings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
