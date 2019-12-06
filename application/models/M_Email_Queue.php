<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as DB;

class M_Email_Queue extends Eloquent
{
	protected $table = 'email_queue';
	protected $fillable = [
		'name', 'type', 'template', 'email', 'subject', 'message'
	];
	protected $rules = [
		'name' => [
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'trim|required|max_length[100]'
		],
		'email' => [
			'field' => 'email',
			'label' => 'Email Address',
			'rules' => 'trim|required|valid_email|max_length[100]'
		],
		'subject' => [
			'field' => 'subject',
			'label' => 'Subject',
			'rules' => 'trim|required|max_length[100]'
		],
		'message' => [
			'field' => 'message',
			'label' => 'message',
			'rules' => 'trim|required'
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
			'email' => isset($input['email']) ? strtolower($input['email']) : '',
			'type' => isset($input['type']) ? strtolower($input['type']) : 'chat',
			'template' => isset($input['template']) ? strtolower($input['template']) : 'auto_reply',
			'subject' => isset($input['subject']) ? $input['subject'] : '',
			'message' => isset($input['message']) ? $input['message'] : ''
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

	public function scopeFindHashId($query, $val)
	{
		return $query->where(DB::raw('MD5(id)'), '=', $val);
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