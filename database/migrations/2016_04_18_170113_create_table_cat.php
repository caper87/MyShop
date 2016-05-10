<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat', function (Blueprint $table) {
		 $table->increments('cat_id');
		 $table->string('cat_name', 255);
		 $table->string('cat_descr', 255);
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
         Schema::drop('cat');
    }
}
