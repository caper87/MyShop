<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableItemParam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_param', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id');
            $table->foreign('param_id')->references('item_id')->on('item');
            $table->integer('param_id');
            $table->foreign('item_id')->references('param_id')->on('param');
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
        Schema::drop('item_param');
    }
}
