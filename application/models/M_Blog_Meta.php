<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

class M_Blog_Meta extends Eloquent
{
	protected $table = 'blog_metas';
	protected $fillable = [
		'blog_id', 'title', 'description', 'keywords'
	];
	protected $rules = [];


	public function getRules()
	{
		return $this->rules;
	}

	public function setData($input)
	{
		$data = [];
		return $data;
	}

}