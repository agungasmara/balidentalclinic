<?php
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class Migration_Create_Table_Sys extends CI_Migration
{
	public function up()
	{
		// create app settings
		Capsule::schema()->create('app_settings', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('code', 30);
			$table->string('name', 50);
			$table->string('type', 10);
			$table->string('value', 150)->nullable();
			$table->timestamps();
		});

		// create roles
		Capsule::schema()->create('roles', function (Blueprint $table)
		{
			$table->smallIncrements('id')->unsigned();
			$table->string('name', 100);
			$table->string('default_for', 100)->nullable();
			$table->boolean('actived')->default(FALSE);
			$table->boolean('deleteable')->deafult(FALSE);
			$table->timestamps();
		});

		// create permissions
		Capsule::schema()->create('permissions', function (Blueprint $table) {
			$table->mediumIncrements('id')->unsigned();
			$table->string('module', 50);
			$table->string('controller', 50);
			$table->string('method', 100);
			$table->string('name', 150);
			$table->boolean('actived')->default(TRUE);
			$table->timestamps();
		});

		// create permission role link
		Capsule::schema()->create('permission_role', function (Blueprint $table) {
			$table->mediumInteger('permission_id')->unsigned();
			$table->smallInteger('role_id')->unsigned();
			$table->text('filter')->nullable();
			$table->timestamps();

			$table->foreign('role_id')->references('id')->on('roles')
				->onDelete('cascade')
				->onUpdate('cascade');

			$table->foreign('permission_id')->references('id')->on('permissions')
				->onDelete('cascade')
				->onUpdate('cascade');
		});

		// create users
		Capsule::schema()->create('users', function (Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('first_name', 100);
			$table->string('last_name', 100)->nullable();
			$table->string('password', 32);
			$table->string('email', 100)->unique();
			$table->boolean('actived')->default(TRUE);
			$table->string('token')->nullable();
			$table->string('token_expired_at')->nullable();
			$table->timestamp('last_login_at')->nullable();
			$table->timestamps();
		});

		// create users roles link
		Capsule::schema()->create('role_user', function (Blueprint $table) {
			$table->integer('user_id')->unsigned();
			$table->smallInteger('role_id')->unsigned();
			$table->boolean('actived')->default(TRUE);
			$table->timestamps();

			$table->foreign('role_id')->references('id')->on('roles')
				->onDelete('restrict')
				->onUpdate('cascade');

			$table->foreign('user_id')->references('id')->on('users')
				->onDelete('cascade')
				->onUpdate('cascade');
		});

		// create menus
		Capsule::schema()->create('menus', function (Blueprint $table) {
			$table->smallIncrements('id')->unsigned();
			$table->string('nav_type', 20);
			$table->string('name', 50);
			$table->string('html_id', 50);
			$table->string('icon', 50);
			$table->boolean('is_internal')->default(TRUE);
			$table->text('link');
			$table->smallInteger('index')->default(0);
			$table->smallInteger('parent')->unsigned()->nullable();
			$table->boolean('is_login')->default(FALSE);
			$table->mediumInteger('permission_id')->unsigned()->nullable();
			$table->timestamps();

			$table->foreign('parent')->references('id')->on('menus')
				->onDelete('set null')
				->onUpdate('cascade');

			$table->foreign('permission_id')->references('id')->on('permissions')
				->onDelete('set null')
				->onUpdate('cascade');
		});
	}

	public function down()
	{
		Capsule::schema()->drop('menus');
		Capsule::schema()->drop('role_user');
		Capsule::schema()->drop('users');
		Capsule::schema()->drop('permission_role');
		Capsule::schema()->drop('permissions');
		Capsule::schema()->drop('roles');
		Capsule::schema()->drop('app_settings');
	}
}