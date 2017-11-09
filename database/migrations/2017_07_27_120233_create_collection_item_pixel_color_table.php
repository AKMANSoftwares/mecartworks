<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionItemPixelColorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pixel_pixel_color', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('pixel_id')->unsigned();
          $table->foreign('pixel_id')->references('id')->on('pixels')->onDelete('cascade')->onUpdate('cascade');
          $table->integer('pixel_color_id')->unsigned();
          $table->foreign('pixel_color_id')->references('id')->on('pixel_colors')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('pixel_pixel_color');
    }
}
