<?php
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class Migration_Create_Table_Email_Blast extends CI_Migration 
{
	public function up()
	{
		$this->createTable();
	}

	public function down()
	{
		Capsule::schema()->drop('email_blast');
		Capsule::schema()->drop('email_templates');
	}

	private function createTable()
	{
		// create email_templates
		Capsule::schema()->create('email_templates', function (Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('name', 50);
			$table->string('subject', 100);
			$table->string('description', 200);
			$table->timestamps();
		});

		// create email_blast
		Capsule::schema()->create('email_blast', function (Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('email', 100);
			$table->integer('template_id')->unsigned();
			$table->boolean('is_process')->default(0);
			$table->boolean('is_finish')->default(0);
			$table->boolean('is_read')->default(0);
			$table->timestamps();

			$table->foreign('template_id')->references('id')->on('email_templates')
				->onDelete('cascade')
				->onUpdate('cascade');
		});
	}

}