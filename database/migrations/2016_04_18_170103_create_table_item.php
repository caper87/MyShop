<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
		 $table->increments('item_id');
		 $table->string('title', 255);
         $table->string('slug', 255);
         $table->integer('price');
		 $table->string('description', 255);
		 $table->string('features', 255);
		 $table->timestamps();
         $table->softDeletes();
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
