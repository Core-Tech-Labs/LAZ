<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
				Schema::create('usersImages', function(Blueprint $table)
				{
						$table->increments('id'); //image_id
						$table->integer('user_id')->unsigned();
						$table->string('image_path')->unique();
						$table->string('image_name')->unique()->nullable;
						$table->integer('timestamps');

						$table->foreign('user_id')
									->references('id')
									->on('users');
				});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('usersImages', function(Blueprint $table)
		{
			//
		});
	}

}
