<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
      $table->increments('id');
			$table->string('email')->unique();
      $table->string('username')->unique();
      $table->string('password', 60);
      $table->date('_dob');
      $table->rememberToken();
      $table->nullabletimestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			DB::statement('SET FOREIGN_KEY_CHECKS = 0');
			Schema::drop('users');
			DB::statement('SET FOREIGN_KEY_CHECKS = 1');

		});
	}

}
