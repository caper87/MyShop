<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
		 $table->increments('order_id');
		 $table->string('user', 255);
		 $table->string('status', 255);
		 $table->integer('amount');
		 $table->string('payment', 255);
		 $table->string('delivery', 255);
		 $table->string('comment', 255);
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
        Schema::drop('item');
    }
}
