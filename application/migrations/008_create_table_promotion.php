<?php
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class Migration_Create_Table_Promotion extends CI_Migration 
{
	public function up()
	{
		$this->createTable();
	}

	public function down()
	{
		Capsule::schema()->drop('client_promotions');
		Capsule::schema()->drop('promotions');
	}

	private function createTable()
	{
		// create promotions
		Capsule::schema()->create('promotions', function (Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('code', 50);
			$table->string('email_template', 100);
			$table->string('img', 100);
			$table->date('started_at');
			$table->date('expired_at');
			$table->timestamps();
		});

		// create client_promotions
		Capsule::schema()->create('client_promotions', function (Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('email', 100);
			$table->integer('promotion_id')->unsigned();
			$table->timestamps();

			$table->foreign('promotion_id')->references('id')->on('promotions')
				->onDelete('restrict')
				->onUpdate('cascade');
		});
	}

}