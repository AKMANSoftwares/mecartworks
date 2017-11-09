<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialSizePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_size', function(Blueprint $table){
           $table->increments('id');
           $table->integer('material_id')->unsigned();
           $table->foreign('material_id')->references('id')->on('materials')->onDelete('cascade')->onUpdate('cascade');
           $table->integer('size_id')->unsigned();
           $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('material_size');
    }
}
