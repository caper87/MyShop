<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('subcat', function (Blueprint $table) {
		 $table->increments('subcat_id');
		 $table->integer('cat_id');
		 $table->string('subcat_descr', 255);
		 
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
         Schema::drop('subcat');
    }
}
