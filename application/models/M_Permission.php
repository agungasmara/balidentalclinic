<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

class M_Permission extends Eloquent
{
	protected $table = 'permissions';
	protected $fillable = ['module', 'controller', 'method', 'name', 'actived'];
	protected $rules = [
		'module' => [
			'field' => 'module',
			'label' => 'Module',
			'rules' => 'trim|required|max_length[50]'
		],
		'controller' => [
			'field' => 'controller',
			'label' => 'Controller',
			'rules' => 'trim|required|max_length[50]'
		],
		'method' => [
			'field' => 'method',
			'label' => 'Method',
			'rules' => 'trim|required|max_length[100]'
		],
		'name' => [
			'field' => 'name',
			'label' => 'Nama',
			'rules' => 'trim|required|max_length[150]'
		],
	];

	public function roles()
	{
		return $this->belongsToMany('M_Role', 'permission_role', 'permission_id', 'role_id')
			->withTimestamps();
	}

	public function getRules()
	{
		return $this->rules;
	}

	public function setData($input)
	{
		$data = [
			'name' => isset($input['name']) ? strtolower($input['name']) : '',
			'module' => isset($input['module']) ? strtolower($input['module']) : '',
			'controller' => isset($input['controller']) ? strtolower($input['controller']) : '',
			'method' => isset($input['method']) ? strtolower($input['method']) : '',
			'actived' => isset($input['actived']) && $input['actived'] == 'on' ? 1 : 0,
		];

		return $data;
	}

	public function scopeGetRecords($query, $search)
	{
		$name = isset($search['name']) ? $search['name'] : '';
		$status = isset($search['status']) ? $search['status'] : NULL;
		$module = isset($search['module']) ? $search['module'] : NULL;
		$controller = isset($search['controller']) ? $search['controller'] : NULL;
		$method = isset($search['method']) ? $search['method'] : NULL;

		return $query->where('name', 'like', "%$name%")
			->isStatus($status)
			->isModule($module)
			->isController($controller)
			->isMethod($method);
	}

	public function scopeIsStatus($query, $val)
	{
		If (is_null($val)) return;
		return $query->where('actived', '=', $val);
	}

	public function scopeIsController($query, $val)
	{
		If (is_null($val)) return;
		return $query->where('controller', '=', $val);
	}

	public function scopeIsModule($query, $val)
	{
		If (is_null($val)) return;
		return $query->where('module', '=', $val);
	}

	public function scopeIsMethod($query, $val)
	{
		If (is_null($val)) return;
		return $query->where('method', '=', $val);
	}

	public function scopeAccessiblePermission($query, $module, $controller, $method)
	{
		return $query->where('module', '=', $module)
			->where('controller', '=', $controller)
			->where('method', '=', $method)
			->where('actived', '=', 1);
	}
	
}