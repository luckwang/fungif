<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGifsTable extends Migration 
{
	public function up()
	{
		Schema::create('gifs', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title')->index();
            $table->string('path', 2083);
            $table->char('description')->nullable();
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('gifs');
	}
}
