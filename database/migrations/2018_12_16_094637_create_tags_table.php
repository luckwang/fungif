<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration 
{
	public function up()
	{
		Schema::create('tags', function(Blueprint $table) {
            $table->increments('id');
            $table->char('name')->index();
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('tags');
	}
}