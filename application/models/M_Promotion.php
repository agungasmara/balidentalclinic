<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as DB;
use Carbon\Carbon;

class M_Promotion extends Eloquent
{
	protected $table = 'promotions';
	protected $fillable = [
		'code', 'email_template', 'started_at', 'expired_at'
	];
	protected $rules = [
		'name' => [
			'field' => 'name',
			'label' => 'name',
			'rules' => 'trim|required|max_length[100]'
		],
		'code' => [
			'field' => 'code',
			'label' => 'Code',
			'rules' => 'trim|required|max_length[50]|alpha_numeric'
		],
		'email_template' => [
			'field' => 'email_template',
			'label' => 'Email Template',
			'rules' => 'trim|required|max_length[100]|alpha_dash'
		],
		'started_at' => [
			'field' => 'started_at',
			'label' => 'Started At',
			'rules' => 'trim|required|valid_date[Y-m-d]'
		],
		'expired_at' => [
			'field' => 'expired_at',
			'label' => 'Expired At',
			'rules' => 'trim|required|valid_date[Y-m-d]'
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
			'code' => isset($input['code']) ? strtolower($input['code']) : '',
			'email_template' => isset($input['email_template']) ? strtolower($input['email_template']) : '',
			'started_at' => isset($input['started_at']) ? $input['started_at'] : '',
			'expired_at' => isset($input['expired_at']) ? $input['expired_at'] : ''
		];
		return $data;
	}
	
	public function scopeGetRecords($query, $search)
	{
		$name = isset($search['name']) ? $search['name'] : '';
		$code = isset($search['code']) ? $search['code'] : '';

		return $query->codeLike($code)
			->nameLike($name);
	}

	public function scopeNameLike($query, $val)
	{
		return $query->Where('name', 'like', "%$val%");
	}

	public function scopeCodeLike($query, $val)
	{
		return $query->Where('code', 'like', "%$val%");
	}

	public function scopeOnGoing($query)
	{
		$today = Carbon::today();
		return $query->Where('started_at', '<=', $today)
			->where('expired_at', '>=', $today);
	}

}