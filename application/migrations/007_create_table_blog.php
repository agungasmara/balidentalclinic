<?php
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class Migration_Create_Table_Blog extends CI_Migration 
{
	public function up()
	{
		$this->createTable();
		$this->seedBlogTypes();
	}

	public function down()
	{
		Capsule::schema()->drop('blog_metas');
		Capsule::schema()->drop('blogs');
		Capsule::schema()->drop('blog_types');
	}

	private function createTable()
	{
		// create blog_types
		Capsule::schema()->create('blog_types', function (Blueprint $table)
		{
			$table->smallIncrements('id')->unsigned();
			$table->string('name', 50);
			$table->timestamps();
		});

		// create blogs
		Capsule::schema()->create('blogs', function (Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('slug', 50);
			$table->string('title', 50);
			$table->string('lead', 75);
			$table->string('cover', 40)->nullable();
			$table->smallInteger('type_id')->unsigned();
			$table->text('content');
			$table->integer('user_id')->unsigned();
			$table->date('published_at');
			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users')
				->onDelete('cascade')
				->onUpdate('cascade');

			$table->foreign('type_id')->references('id')->on('blog_types')
				->onDelete('cascade')
				->onUpdate('cascade');
		});

		// create blog_metas
		Capsule::schema()->create('blog_metas', function (Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->integer('blog_id')->unsigned();
			$table->string('title', 50);
			$table->string('description', 150);
			$table->string('keywords', 100);
			$table->timestamps();

			$table->foreign('blog_id')->references('id')->on('blogs')
				->onDelete('cascade')
				->onUpdate('cascade');
		});
	}

	private function seedBlogTypes()
	{
		$types = [
			[
				'name'  => 'picture'
			],
			[
				'name'  => 'text'
			],
		];
		foreach ($types as $type) {
			M_Blog_Type::create($type);
		}
	}

}