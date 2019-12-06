<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class M_Profile extends Eloquent
{
	protected $table = 'profiles';
	protected $fillable = [
		'phone', 'pic'
	];
	protected $rules = [
		'first_name' => [
			'field' => 'first_name',
			'label' => 'First Name',
			'rules' => 'trim|required|alpha_numeric_spaces|min_length[3]|max_length[100]'
		],
		'last_name' => [
			'field' => 'last_name',
			'label' => 'Last Name',
			'rules' => 'trim|alpha_numeric_spaces|min_length[3]|max_length[100]'
		],
		'email' => [
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'trim|required|valid_email|is_unique[users.email]|max_length[100]'
		],
		'phone' => [
			'field' => 'phone',
			'label' => 'Phone',
			'rules' => 'trim|required|numeric'
		],
		'address' => [
			'field' => 'address',
			'label' => 'Address',
			'rules' => 'trim|required|max_length[200]'
		]
	];


	public function getRules()
	{			
		return $this->rules;
	}

	public function setData($input)
	{
		$data = [
			'first_name' => isset($input['first_name']) ? strtolower($input['first_name']) : '',
			'last_name' => isset($input['last_name']) ? strtolower($input['last_name']) : '',
			'email' => isset($input['email']) ? $input['email'] : '',
			'phone' => isset($input['phone']) ?  $input['phone'] : '',
			'address' => isset($input['address']) ?  $input['address'] : ''
		];
		return $data;
	}
}