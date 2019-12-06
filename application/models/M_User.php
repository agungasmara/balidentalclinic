<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as DB;

class M_User extends Eloquent
{
	protected $table = 'users';
	protected $fillable = [
		'first_name', 'last_name', 'email', 'password', 'actived', 'token', 'token_expired_at'
	];
	protected $rules = [
		'first_name' => [
			'field' => 'first_name',
			'label' => 'Nama Depan',
			'rules' => 'trim|required|alpha_numeric_spaces|min_length[3]|max_length[100]'
		],
		'last_name' => [
			'field' => 'Nama Belakang',
			'label' => 'Last Name',
			'rules' => 'trim|alpha_numeric_spaces|min_length[3]|max_length[100]'
		],
		'email' => [
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'trim|required|valid_email|is_unique[users.email]|max_length[100]'
		],
		'password' => [
			'field' => 'password',
			'label' => 'Kata Kunci',
			'rules' => 'required|min_length[6]'
		],
		'password_confirmation' => [
			'field' => 'password_confirmation',
			'label' => 'Konfirmasi Kata Kunci',
			'rules' => 'required|min_length[6]|matches[password]'
		],
		'role_id' => [
			'field' => 'role_id',
			'label' => 'User Role',
			'rules' => 'required'
		]
	];
	protected $passwordRules = [
		'current' => [
			'field' => 'current',
			'label' => 'Kata Kunci saat ini',
			'rules' => 'required'
		],
		'new' => [
			'field' => 'new',
			'label' => 'Kata Kunci baru',
			'rules' => 'required|min_length[6]'
		],
		'confirm' => [
			'field' => 'confirm',
			'label' => 'Konfirmasi Kata Kunci baru',
			'rules' => 'required|min_length[6]|matches[new]'
		]
	];


	public function roles()
	{
		return $this->belongsToMany('M_Role', 'role_user', 'user_id', 'role_id')->withPivot('actived')
			->withTimestamps();
	}

	public function profile()
	{
		return $this->hasOne('M_Profile', 'user_id');
	}

	public function getRules()
	{			
		return $this->rules;
	}

	public function getPasswordRules()
	{
		return $this->passwordRules;
	}

	public function getRegistrationRules()
	{
		return $this->rules;
	}

	public function setData($input)
	{
		$data = [
			'first_name' => isset($input['first_name']) ? strtolower($input['first_name']) : '',
			'last_name' => isset($input['last_name']) ? strtolower($input['last_name']) : '',
			'email' => isset($input['email']) ? $input['email'] : '',
			'role_id' => isset($input['role_id']) ? $input['role_id'] : 0,
			'actived' => isset($input['actived']) && $input['actived'] == 'on' ? 1 : 0
		];

		if (isset($input['password_needed'])) {
			$data['password'] = isset($input['password']) ? $input['password'] : '';
			$data['password_confirmation'] = isset($input['password_confirmation']) ? $input['password_confirmation'] : '';
		}

		return $data;
	}

	public function setPasswordData($input)
	{
		$data = [
			'current' => isset($input['current']) ? $input['current'] : '',
			'new' => isset($input['new']) ? $input['new'] : '',
			'confirm' => isset($input['confirm']) ? $input['confirm'] : '',
		];
		return $data;
	}
	
	public function scopeGetRecords($query, $search)
	{
		$name = isset($search['name']) ? $search['name'] : '';
		$email = isset($search['email']) ? $search['email'] : '';
		$role = isset($search['role']) ? $search['role'] : NULL;
		$actived = isset($search['actived']) ? $search['actived'] : NULL;

		return $query->nameLike($name)
			->emailLike($email)
			->isRole($role)
			->isActived($actived);
	}

	public function scopeNameLike($query, $val)
	{
		return $query->Where(DB::raw("CONCAT(first_name, ' ', COALESCE(last_name,'') )"), 'like', "%$val%");
	}

	public function scopeEmailLike($query, $val)
	{
		return $query->Where('email', 'like', "%$val%");
	}

	public function scopeIsRole($query, $val)
	{
		if ( is_null($val) ) return;
		return $query->whereHas('roles', function ($query) use ($val) {
			$query->where('id', '=', $val);
		});
	}

	public function scopeIsActived($query, $val)
	{
		if ( is_null($val) ) return;
		return $query->where('actived', '=', $val);
	}

}