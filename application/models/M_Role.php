<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

class M_Role extends Eloquent
{
	protected $table = 'roles';
	protected $fillable = ['name', 'default_for', 'actived', 'deleteable'];
	protected $deleteStatus = [
		'0' => 'UNDELETE',
		'1' => 'DELETEABLE',
	];
	protected $rules = [
		'name' => [
			'field' => 'name',
			'label' => 'Nama',
			'rules' => 'trim|required|min_length[3]|max_length[100]|is_unique[roles.name]'
		],
		'default_for' => [
			'field' => 'default_for',
			'label' => 'Default Untuk',
			'rules' => 'trim|min_length[3]|max_length[100]'
		]
	];

	public function permissions()
	{
		return $this->belongsToMany('M_Permission', 'permission_role', 'role_id', 'permission_id')
			->withTimestamps();
	}

	public function users()
	{
		return $this->belongsToMany('M_User', 'role_user', 'role_id', 'user_id')
			->withTimestamps();
	}

	public function setData($input)
	{
		$data = [
			'name' => isset($input['name']) ? strtolower($input['name']) : '',
			'default_for' => isset($input['default_for']) ? strtolower($input['default_for']) : '',
			'actived' => isset($input['actived']) && $input['actived'] == 'on' ? 1 : 0,
			'deleteable' => isset($input['deleteable']) && $input['deleteable'] == 'on' ? 1 : 0
		];

		return $data;
	}

	public function getRules()
	{
		return $this->rules;
	}

	public function getDeleteStatus()
	{
		return $this->deleteStatus;
	}

	public function getRolePermissions($role)
	{
		$this->setRolePermissions();

		if (array_key_exists($role, $this->permissions)) {
			return $this->permissions[$role];
		}

		return [];
	}

	public function scopeGetRecords($query, $search)
	{
		$name = isset($search['name']) ? $search['name'] : '';
		$default_for = isset($search['default_for']) ? $search['default_for'] : '';
		$actived = isset($search['status']) ? $search['status'] : NULL;
		$deleteable = isset($search['deleted']) ? $search['deleted'] : NULL;

		return $query->where('name', 'like', "%$name%")
			->where('default_for', 'like', "%$default_for%")
			->isActived($actived)
			->isDeleteable($deleteable);
	}

	public function scopeIsActived($query, $val)
	{
		return (is_null($val)) ? '' : $query->where('actived', '=', $val);
	}

	public function scopeIsDeleteable($query, $val)
	{
		return (is_null($val)) ? '' : $query->where('deleteable', '=', $val);
	}

}