<?php
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class Migration_Create_Table_Error_Email extends CI_Migration 
{
	public function up()
	{
		$this->createTable();
	}

	public function down()
	{
		Capsule::schema()->drop('error_emails');
	}

	private function createTable()
	{
		// create error_emails
		Capsule::schema()->create('error_emails', function (Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('type', 100);
			$table->string('description', 100);
			$table->timestamps();
		});
	}

}