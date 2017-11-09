<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePixelPixelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pixel_pixel', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('parent_id')->unsigned();
          $table->foreign('parent_id')->references('id')->on('pixels')->onDelete('cascade')->onUpdate('cascade');
          $table->integer('child_id')->unsigned();
          $table->foreign('child_id')->references('id')->on('pixels')->onDelete('cascade')->onUpdate('cascade');
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
      Schema::dropIfExists('pixel_pixel');
    }
}
