<?php
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class Migration_Create_Table_Profile_Subscriber extends CI_Migration 
{
	public function up()
	{
		$this->createTable();
	}

	public function down()
	{
		Capsule::schema()->drop('pages');
		Capsule::schema()->drop('subscribers');
		Capsule::schema()->drop('profiles');
	}

	private function createTable()
	{
		// create profiles
		Capsule::schema()->create('profiles', function (Blueprint $table)
		{
			$table->integer('user_id')->unsigned();
			$table->string('pic', 40)->nullable();
			$table->string('phone', 20)->nullable();
			$table->string('address', 200)->nullable();
			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users')
				->onDelete('cascade')
				->onUpdate('cascade');
		});

		// create subscribers
		Capsule::schema()->create('subscribers', function (Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 100);
			$table->string('email', 100)->unique();
			$table->timestamps();
		});

		// create pages
		Capsule::schema()->create('pages', function (Blueprint $table)
		{
			$table->increments('id');
			$table->string('slug', 60);
			$table->string('title', 50);
			$table->string('active_menu', 50);
			$table->string('type', 10)->default('text');
			$table->text('content');
			$table->integer('user_id')->unsigned();
			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users')
				->onDelete('cascade')
				->onUpdate('cascade');
		});
	}

}