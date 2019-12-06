<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as DB;

class M_Email_Blast extends Eloquent
{
	protected $table = 'email_blast';
	protected $fillable = [
		'email', 'name', 'template_id'
	];
	protected $rules = [
		'email' => [
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'trim|valid_email|required|max_length[100]'
		],
		'name' => [
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'trim|required|max_length[100]'
		],
		'template_id' => [
			'field' => 'template_id',
			'label' => 'Email Template',
			'rules' => 'trim|required',
			'errors' => [
				'required' => 'Please select valid %s'
			]
		]
	];


	public function template()
	{
		return $this->belongsTo('M_Email_Template', 'template_id');
	}

	public function getRules()
	{			
		return $this->rules;
	}

	public function setData($input)
	{
		$data = [
			'name' => isset($input['name']) ? $input['name'] : '',
			'template_id' => isset($input['template_id']) ? $input['template_id'] : ''
		];
		return $data;
	}
	
	public function scopeFindHashId($query, $val)
	{
		return $query->where(DB::raw('MD5(id)'), '=', $val);
	}
	
	public function scopeGetRecords($query, $search)
	{
		$name = isset($search['name']) ? $search['name'] : '';
		$email = isset($email['email']) ? $search['email'] : '';

		return $query->where('name', 'like', "%$name%")
			->where('email', 'like', "%$email%");
	}

	public function scopeNeedProcess($query)
	{
		return $query->where('is_process', '=', FALSE);
	}

}