<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as DB;

class M_Subscriber extends Eloquent
{
	protected $table = 'subscribers';
	protected $fillable = [
		'name', 'email'
	];
	protected $rules = [
		'name' => [
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'trim|required|max_length[100]'
		],
		'email' => [
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'trim|required|valid_email|is_unique[subscribers.email]|max_length[100]'
		]
	];


	public function getRules()
	{			
		return $this->rules;
	}

	public function setData($input)
	{
		$data = [
			'name' => isset($input['name']) ? strtolower($input['name']) : '',
			'email' => isset($input['email']) ? strtolower($input['email']) : ''
		];
		return $data;
	}
	
	public function scopeGetRecords($query, $search)
	{
		$email = isset($search['email']) ? $search['email'] : '';
		$name = isset($search['name']) ? $search['name'] : '';

		return $query->emailLike($email)
			->nameLike($name);
	}

	public function scopeEmailLike($query, $val)
	{
		return $query->Where('email', 'like', "%$val%");
	}

	public function scopeNameLike($query, $val)
	{
		return $query->Where('name', 'like', "%$val%");
	}

}