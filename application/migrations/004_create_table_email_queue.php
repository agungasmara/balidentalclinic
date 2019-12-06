<?php
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class Migration_Create_Table_Email_Queue extends CI_Migration 
{
	public function up()
	{
		$this->createTable();
	}

	public function down()
	{
		Capsule::schema()->drop('email_queue');
	}

	private function createTable()
	{
		// create email_queue
		Capsule::schema()->create('email_queue', function (Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('email', 100);
			$table->string('name', 100);
			$table->string('subject', 100);
			$table->text('message');
			$table->boolean('is_reply')->default(0);
			$table->boolean('is_saving')->default(0);
			$table->timestamps();
		});
	}

}