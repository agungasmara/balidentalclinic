<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as DB;

class M_Email_Template extends Eloquent
{
	protected $table = 'email_templates';
	protected $fillable = [
		'name', 'subject', 'description'
	];
	protected $rules = [
		'name' => [
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'trim|required|max_length[50]|alpha_dash'
		],
		'subject' => [
			'field' => 'subject',
			'label' => 'Email SUbject',
			'rules' => 'trim|required|max_length[100]'
		],
		'description' => [
			'field' => 'description',
			'label' => 'Description',
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
			'name' => isset($input['name']) ? $input['name'] : '',
			'subject' => isset($input['subject']) ? $input['subject'] : '',
			'description' => isset($input['description']) ? $input['description'] : ''
		];
		return $data;
	}
	
	public function scopeGetRecords($query, $search)
	{
		$name = isset($search['name']) ? $search['name'] : '';
		$subject = isset($search['subject']) ? $search['subject'] : '';

		return $query->where('name', 'like', "%$name%")
			->where('subject', 'like', "%$subject%");
	}

}