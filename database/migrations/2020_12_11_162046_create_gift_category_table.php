<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateGiftCategoryTable extends Migration {

	public function up()
	{
		Schema::create('gift_category', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('gift_id')->unsigned()->index();
			$table->integer('category_id')->unsigned()->index();
		});
	}

	public function down()
	{
		Schema::drop('gift_category');
	}
}