<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiftCelebrationTable extends Migration {

	public function up()
	{
		Schema::create('gift_celebration', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('gift_id')->unsigned()->index();
			$table->integer('celebration_id')->unsigned()->index();
		});
	}

	public function down()
	{
		Schema::drop('gift_celebration');
	}
}