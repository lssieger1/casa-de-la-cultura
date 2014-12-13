<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 * creates backup tables.
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
			$table->increments('id')->unsigned();
			$table->string('username')->unique();
			$table->string('email')->unique();
			$table->string('name');
			$table->string('password');
			$table->string('password_temp');
			$table->string('phoneNo');
			$table->integer('user_type');
			$table->string('securityQue');
			$table->string('securityAns');
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
