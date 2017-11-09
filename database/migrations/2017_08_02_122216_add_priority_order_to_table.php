<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPriorityOrderToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('collection_types', function (Blueprint $table) {
            $table->integer('priority_order')->unsigned();

        });

        Schema::table('collection_items', function (Blueprint $table) {

            $table->integer('priority_order')->unsigned();

        });

        Schema::table('materials', function (Blueprint $table) {

            $table->integer('priority_order')->unsigned();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('collection_types', function (Blueprint $table) {
            $table->dropColumn('priority_order');
        });
        Schema::table('collection_items', function (Blueprint $table) {
            $table->dropColumn('priority_order');
        });
        Schema::table('materials', function (Blueprint $table) {
            $table->dropColumn('priority_order');
        });

    }
}
