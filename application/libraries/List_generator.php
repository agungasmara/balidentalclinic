<?php
use Illuminate\Database\Capsule\Manager as DB;

class List_Generator {
	private $CI;


	public function __construct()
	{
		$this->CI =& get_instance();
	}

	// list generator for site management
	public function getModelStatus($intro)
	{
		$list = ['99' => $intro] + $this->CI->config->item('modelStatus');
		return array_map('strtoupper', $list);
	}

	public function getRoleDeleteStatus()
	{
		$role = new M_Role;
		return ['99' => 'STATUS DELETE'] + array_map('strtoupper', $role->getDeleteStatus());
	}

	public function getRole()
	{
		return ['0' => 'ROLE USER'] + array_map('strtoupper', M_Role::orderBy('name', 'asc')->pluck('name', 'id')->toArray());
	}

	public function getPermissionModule()
	{
		return ['0' => 'MODULE'] + array_map('strtoupper', M_Permission::orderBy('module', 'asc')->pluck('module', 'module')->unique()->toArray());
	}

	public function getPermissionController()
	{
		return ['0' => 'CONTROLLER'] + array_map('strtoupper', M_Permission::orderBy('controller', 'asc')->pluck('controller', 'controller')->unique()->toArray());
	}

	public function getPermissionMethod()
	{
		return ['0' => 'METHOD'] + array_map('strtoupper', M_Permission::orderBy('method', 'asc')->pluck('method', 'method')->unique()->toArray());
	}

	public function getPermission()
	{
		return ['0' => 'PERMISSION'] + array_map('strtoupper', M_Permission::orderBy('name', 'asc')->pluck('name', 'id')->toArray());
	}

	public function getMenu()
	{
		return ['0' => 'MENU PARENT'] + array_map('strtoupper', M_Menu::orderBy('name', 'asc')->pluck('name', 'id')->toArray());
	}
	
}