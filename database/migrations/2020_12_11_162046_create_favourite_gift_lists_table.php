<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateFavouriteGiftListsTable extends Migration {

	public function up()
	{
		Schema::create('favourite_gift_lists', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->integer('user_id')->unsigned()->index();
		});
	}

	public function down()
	{
		Schema::drop('favourite_gift_lists');
	}
}