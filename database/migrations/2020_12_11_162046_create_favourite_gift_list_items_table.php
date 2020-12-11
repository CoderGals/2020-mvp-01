<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateFavouriteGiftListItemsTable extends Migration {

	public function up()
	{
		Schema::create('favourite_gift_list_items', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('favourite_gift_list_id')->unsigned()->index();
			$table->integer('gift_id')->unsigned()->index();
		});
	}

	public function down()
	{
		Schema::drop('favourite_gift_list_items');
	}
}