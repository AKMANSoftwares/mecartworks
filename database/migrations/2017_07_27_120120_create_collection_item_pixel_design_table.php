<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionItemPixelDesignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pixel_pixel_design', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('pixel_id')->unsigned();
          $table->foreign('pixel_id')->references('id')->on('pixels')->onDelete('cascade')->onUpdate('cascade');
          $table->integer('pixel_design_id')->unsigned();
          $table->foreign('pixel_design_id')->references('id')->on('pixel_designs')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('pixel_pixel_design');
    }
}
