<?php
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as DB;

class M_Client_Promotion extends Eloquent
{
	protected $table = 'client_promotions';
	protected $fillable = [
		'email', 'name', 'promotion_id'
	];
	protected $rules = [
		'email' => [
			'field' => 'email',
			'label' => 'email',
			'rules' => 'trim|required|max_length[100]|valid_email'
		],
		'name' => [
			'field' => 'name',
			'label' => 'name',
			'rules' => 'trim|required|max_length[100]'
		],
		'promotion_id' => [
			'field' => 'promotion_id',
			'label' => 'promotion Code',
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
			'promotion_id' => isset($input['promotion_id']) ? strtolower($input['promotion_id']) : ''
		];
		return $data;
	}

	public function scopeFindRecord($query, $email, $promotion)
	{
		return $query->where('email', '=', $email)
			->where('promotion_id', '=', $promotion);
	}
}