<?php

class Auth
{
	private $CI;

	public function __construct()
	{
		$this->CI =& get_instance();
	}

	public function getUser($email)
	{
		$user = M_User::with('roles')
			->where('email', $email)
			->first();

 		return $user;
	}

	public function basicAuth($email, $password)
	{
		$user = M_User::where('email', $email)
 			->where('password', md5($password))
 			->first();

 		if (! empty($user) ) return TRUE;

 		return FALSE;
	}


	/**
	 * setup session data after user successfully login
	 * @param  string $email user email
	 */
	public function setupSession($email)
	{
		$user = $this->getUser($email);

		$role = NULL;
		if ($this->CI->config->item('singleRole')) {
			$role = $user->roles->first();
		}

		$sessionUser = [
			'id' => $user->id,
			'first_name' => $user->first_name,
			'last_name' => $user->last_name,
			'role_id' => ! is_null($role) ? $role->id : NULL,
			'role' => ! is_null($role) ? $role->name : NULL,
			'email' => $user->email
		];

		$this->CI->session->set_userdata('login_data', $sessionUser);
	}


	/**
	 * check if user has permission to access some method in controller
	 * @param  Array  	$loginSession session data
	 * @param  string  	$module       
	 * @param  string  	$controller   
	 * @param  string  	$method       
	 * @return boolean  
	 */
	public function hasPermission($loginSession, $module, $controller, $method)
	{
		if (is_null($loginSession)) return FALSE;

		$userPermissions = $this->getUserPermissions($loginSession);
		if (is_null($userPermissions)) return FALSE;

		// find permission by controller attribute
		// and permission must be actived (TRUE)
		$permission = M_Permission::accessiblePermission($module, $controller, $method)->first();
		if (empty($permission)) return FALSE;
		
		if ( array_search($permission->id, $userPermissions) === FALSE ) {
			return FALSE;
		}
		return TRUE;
	}


	/**
	 * get user roles based on session data
	 * @param  Array 	$loginSession	session data
	 * @return Object              		return NULL or object M_Role
	 */
	public function getUserRole($loginSession)
	{
		$roleId = ! is_null($loginSession) && isset($loginSession['role_id']) ? $loginSession['role_id'] : NULL;
		$userId = ! is_null($loginSession) && isset($loginSession['id']) ? $loginSession['id'] : NULL;

		$user = M_User::with([
				'roles' => function ($query) {
					$query->where('roles.actived', '=', 1)
						->where('role_user.actived', '=', 1);
				}
			])
			->find($userId);

		if (empty($user) || $user->roles->count() == 0 || is_null($roleId)) return NULL;
		
		$role = $user->roles->where('id', $roleId)->first();
		if (empty($role)) return NULL;

		return $role;
	}


	/**
	 * get user permissions based on session data
	 * @param  Array 	$loginSession	session data
	 * @return Array					user permissions
	 */
	public function getUserPermissions($loginSession)
	{
		$role = $this->getUserRole($loginSession);
		if (is_null($role)) return [];

		$permissions = $role->permissions()->pluck('id')->toArray();
		return $permissions;
	}
}