<?php
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;
use Carbon\Carbon;

class Migration_Seeder_Sys extends CI_Migration
{
	public function up()
	{
		$this->seedAppSettings();
		$this->seedPermissions();
		$this->seedRoles();
		$this->seedUsers();
		$this->seedMenus();
	}

	public function down()
	{
		// do nothing
	}


	private function seedRoles()
	{
		$roles = [
			'admin' => [
				'name' => 'administrator',
				'default_for' => 'administrator',
				'actived' => 1,
				'deleteable' => 0,
			],
		];
		foreach ($roles as $role) {
			M_Role::create($role);
		}

		$permissions = M_Permission::get()->pluck('id')->toArray();
		$role = M_Role::where('default_for', '=', 'administrator')->first();
		$role->permissions()->attach($permissions);
	}

	private function seedUsers()
	{
		$users = [
			'admin' => [
				'first_name' => 'administrator',
				'last_name' => 'sistem',
				'password' => md5('1234567890'),
				'email' => 'admin@balidentalclinic.com',
				'actived' => 1
			]
		];
		foreach ($users as $user) {
			M_User::create($user);
		}

		$admin = M_Role::where('default_for', '=', 'administrator')->first();
		$user = M_User::where('email', '=', 'admin@balidentalclinic.com')->first();
		$user->roles()->attach($admin->id);
	}

	private function seedAppSettings()
	{
		$settings = [
			[
				'code'  => 'site_name',
				'name'  => 'Site Name',
				'type'  => 'text',
				'value' => 'Bali Dental Clinic'
			],
			[
				'code'  => 'site_motto',
				'name'  => 'Site Subtitle',
				'type'  => 'text',
				'value' => 'Best Traveller Health Care in Bali'
			],
			[
				'code'  => 'site_description',
				'name'  => 'Site Meta name',
				'type'  => 'text',
				'value' => 'Bali dental clinic'
			],
			[
				'code'  => 'site_keywords',
				'name'  => 'Site Meta Keywords',
				'type'  => 'text',
				'value' => 'bali dental clinic, traveller health care bali, tourist health care in bali'
			],
			[
				'code'  => 'site_logo',
				'name'  => 'Site Logo',
				'type'  => 'image',
				'value' => 'site-logo.png'
			],
			[
				'code'  => 'default_avatar',
				'name'  => 'Default Avatar',
				'type'  => 'image',
				'value' => 'default.jpg'
			]
		];
		foreach ($settings as $setting) {
			M_App_Setting::create($setting);
		}
	}

	private function seedPermissions()
	{
		$permissions = [
			'sys' => [
				'user' => [
					'index' => 'list user di sistem',
					'add' => 'tampilkan form tambah user',
					'insert' => 'tambahkan data user',
					'edit' => 'tampilkan form edit user',
					'update' => 'update data user',
					'delete' => 'hapus data user',
				],
				'role' => [
					'index' => 'list role di sistem',
					'add' => 'tampilkan form tambah role',
					'insert' => 'tambahkan data role',
					'edit' => 'tampilkan form edit role',
					'update' => 'update data role',
					'delete' => 'hapus data role',
					'permission' => 'tampilkan permission yang dimiliki role',
					'permitted' => 'simpan data permission untuk role',
				],
				'permission' => [
					'index' => 'list permission di sistem',
					'add' => 'tampilkan form tambah permission',
					'insert' => 'tambahkan data permission',
					'edit' => 'tampilkan form edit permission',
					'update' => 'update data permission',
					'delete' => 'hapus data permission',
				],
				'menu' => [
					'index' => 'list menu di sistem',
					'add' => 'tampilkan form tambah menu',
					'insert' => 'tambahkan data menu',
					'edit' => 'tampilkan form edit menu',
					'update' => 'update data menu',
					'delete' => 'hapus data menu',
				],
				'setting' => [
					'index' => 'list application setting di sistem',
					'edit' => 'tampilkan form edit application setting',
					'update' => 'update data application setting',
				]
			]
		];
		foreach ($permissions as $module => $controllers) {
			foreach ($controllers as $controller => $methods) {
				foreach ($methods as $method => $name) {
					$permission = [
						'module' => $module,
						'controller' => $controller,
						'method' => $method,
						'name' =>$name
					];
					M_Permission::create($permission);
				}
			}
					
		}
	}

	private function seedMenus()
	{
		$menus = [
			[
				'nav_type' => 'backend',
				'name' => 'dashboard',
				'html_id' => 'back-admin',
				'icon' => 'icons icon-home',
				'link' => 'account/dashboard',
				'index' => 0
			],
			[
				'nav_type' => 'backend',
				'name' => 'administrator',
				'html_id' => 'back-sys',
				'icon' => 'icons icon-settings',
				'link' => '#',
				'index' => 1
			],
			[
				'nav_type' => 'backend',
				'name' => 'kelola user',
				'html_id' => 'back-sys-user',
				'icon' => 'icons icon-people',
				'link' => 'sys/user',
				'index' => 0,
				'parent' => 'back-sys',
				'permission_id' => 'sys-user-index'
			],
			[
				'nav_type' => 'backend',
				'name' => 'kelola role',
				'html_id' => 'back-sys-role',
				'icon' => 'icons icon-badge',
				'link' => 'sys/role',
				'index' => 1,
				'parent' => 'back-sys',
				'permission_id' => 'sys-role-index'
			],
			[
				'nav_type' => 'backend',
				'name' => 'kelola permission',
				'html_id' => 'back-sys-permission',
				'icon' => 'icons icon-lock',
				'link' => 'sys/permission',
				'index' => 2,
				'parent' => 'back-sys',
				'permission_id' => 'sys-permission-index'
			],
			[
				'nav_type' => 'backend',
				'name' => 'kelola menu',
				'html_id' => 'back-sys-menu',
				'icon' => 'icons icon-grid',
				'link' => 'sys/menu',
				'index' => 3,
				'parent' => 'back-sys',
				'permission_id' => 'sys-menu-index'
			],
			[
				'nav_type' => 'backend',
				'name' => 'konfigurasi aplikasi',
				'html_id' => 'back-sys-setting',
				'icon' => 'icons icon-wrench',
				'link' => 'sys/setting',
				'index' => 4,
				'parent' => 'back-sys',
				'permission_id' => 'sys-setting-index'
			],
		];
		foreach ($menus as $menu) {
			if (isset($menu['parent'])) {
				$parent = M_Menu::where('html_id', '=', $menu['parent'])->first();
				$menu['parent'] = $parent->id;
			}

			if (isset($menu['permission_id'])) {
				list($module, $controller, $method) = explode('-', $menu['permission_id']);
				
				$permission = M_Permission::where('module', '=', $module)
					->where('controller', '=', $controller)
					->where('method', '=', $method)
					->first();

				$menu['permission_id'] = $permission->id;
			}

			M_Menu::create($menu);
		}
	}

}