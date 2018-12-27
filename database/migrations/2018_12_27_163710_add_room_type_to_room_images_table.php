<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRoomTypeToRoomImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('room_images', function (Blueprint $table) {
            $table->integer('room_type_id')->unsigned()->nullable();
            $table->foreign('room_type_id')->references('id')->on('room_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('room_images', function (Blueprint $table) {
            //
        });
    }
}
