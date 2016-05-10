<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrderItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_item', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id');
            $table->foreign('order_id')->references('item_id')->on('item');
            $table->integer('order_id');
            $table->foreign('item_id')->references('order_id')->on('param');
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
        Schema::drop('order_item');
    }
}
