<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateCategoryCelebrationTable extends Migration {

	public function up()
	{
		Schema::create('category_celebration', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('category_id')->unsigned()->index();
			$table->integer('celebration_id')->unsigned()->index();
		});
	}

	public function down()
	{
		Schema::drop('category_celebration');
	}
}