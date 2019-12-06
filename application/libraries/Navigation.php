<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * this is libraries for navigation
 * read all pages and create unlimited menu tree level
 */

class Navigation
{
	private $CI;
	private $menuConfigurationDir = 'menus';

	// initiate navigation class
	public function __construct()
	{
		$this->CI =& get_instance();
		$this->menuConfigurationDir = $this->CI->config->item('configurationDir') . $this->menuConfigurationDir . '/';
	}

	public function getJsonMenu($module)
	{
		$this->CI->load->helper('file');
		$this->CI->load->library('auth');

		$loginSession = isset($_SESSION['login_data']) ? $_SESSION['login_data'] : NULL;
		$filename = $this->menuConfigurationDir . $module . '.json';
		$json = read_file($filename);

		if ($json === FALSE) {
			return [
				'menus' => [],
				'permissions' => $this->CI->auth->getUserPermissions($loginSession)
			];
		}

		$result = [
			'menus' => json_decode($json),
			'permissions' => $this->CI->auth->getUserPermissions($loginSession),
		];
		return $result;
	}

	public function sqlMenuToJsonMenu($module)
	{
		$menus = M_Menu::where('nav_type', '=', $module)
			->orderBy('index', 'asc')->get();

		if ($menus->count() == 0) return FALSE;

		$compiledMenus = $this->build($menus);
		$this->CI->load->helper('file');
		$filename = $this->menuConfigurationDir . $module . '.json';
		return write_file($filename, json_encode($compiledMenus), 'w+');
	}


	/**
	 * recursive function itterate manus
	 * transform singular list into parent-child list
	 * @param  array 	$menus 	list of menus
	 * @param  Int 		$parent menu parent id, NULL indicate root
	 * @return Array          	menus in parent-child relation
	 */
	public function build($menus, $parent = NULL)
	{
		$result = [];

		$currentMenus = $menus->filter( function ($item) use ($parent) {
				return (is_null($parent)) ? is_null($item->parent) : $item->parent == $parent;
			})->sortBy('index');

		foreach ($currentMenus as $menu) {
			array_push($result, $menu->toArray());
			$numberOfChildren = $menus->where('parent', $menu->id)->count();

			// setup parent permission to array if not NULL
			$parentPermissions = $result[ count($result) - 1 ]['permission_id'];
			if (! is_null($parentPermissions)) {
				$result[ count($result) - 1 ]['permission_id'] = [ $parentPermissions ];
			}
			
			if ($numberOfChildren > 0) {
				$result[ count($result) - 1 ]['children'] = $this->build($menus, $menu->id);

				// build permisison list
				// combine all child permissions with current permissions
				$children = $result[ count($result) - 1 ]['children'];
				$isLogin = $result[ count($result) - 1 ]['is_login'];
				$permissions = [];
				foreach ($children as $child) {
					// setup is_login status for parent menu
					// if one of child need login for access, change parent is_login value
					if (! $isLogin && $child['is_login'] == 1) {
						$isLogin = 1;
					}

					// setup permissions for parent menu
					// if one of the child menus is null, parent should be open for public
					if (is_null($child['permission_id'])) {
						$permissions = NULL;
						break;
					}

					// combine permissions data
					// check if single or array
					if (is_array($child['permission_id'])) {
						$permissions = array_merge($permissions, $child['permission_id']);
						continue;
					}
					array_push($permissions, $child['permission_id']);
				}

				$result[ count($result) - 1 ]['is_login'] = $isLogin;

				// check for parentPermissions status
				// if array then merge, if not array then push
				if (is_array($permissions) && is_array($parentPermissions)) {
					$permissions = array_unique($permissions);
					$permissions = array_merge($permissions, $parentPermissions);
				}

				$result[ count($result) - 1 ]['permission_id'] = $permissions;
			}
		}

		return $result;
	}

}