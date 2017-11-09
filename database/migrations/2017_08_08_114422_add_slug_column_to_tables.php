<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugColumnToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('collections', function (Blueprint $table) {
          $table->string('slug')->unique();
      });

      Schema::table('collection_types', function (Blueprint $table) {
          $table->string('slug')->unique();
      });

      Schema::table('collection_items', function (Blueprint $table) {
        $table->string('slug')->unique();
      });

      Schema::table('pixels', function (Blueprint $table) {
        $table->string('slug')->unique();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('collections', function(Blueprint $table){
          $table->dropColumn('slug');
      });
      Schema::table('collection_types', function(Blueprint $table){
          $table->dropColumn('slug');
      });
      Schema::table('collection_items', function(Blueprint $table){
          $table->dropColumn('slug');
      });
      Schema::table('pixels', function(Blueprint $table){
          $table->dropColumn('slug');
      });
    }
}
