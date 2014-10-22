
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function(Blueprint $table)
		{
			$table->unsignedInteger('type_id');
			$table->foreign('type_id')->references('type_id')
					->on('eventType')
					->onDelete('cascade')
					->onUpdate('cascade');
			$table->increments('event_id')->unsigned();
			$table->string('name');
			$table->date('date');
			$table->longText('description');
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
		Schema::drop('events');
	}

}
