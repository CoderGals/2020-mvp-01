<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateCelebrationsTable extends Migration {

	public function up()
	{
		Schema::create('celebrations', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 255);
		});
	}

	public function down()
	{
		Schema::drop('celebrations');
	}
}