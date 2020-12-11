<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateGiftsTable extends Migration {

	public function up()
	{
		Schema::create('gifts', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name', 255);
			$table->string('number', 255);
			$table->text('description');
			$table->integer('price');
			$table->string('pic_url', 255);
		});
	}

	public function down()
	{
		Schema::drop('gifts');
	}
}