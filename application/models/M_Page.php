<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

class M_Page extends Eloquent
{
	protected $table = 'pages';
	protected $fillable = [
		'slug', 'title', 'active_menu', 'type', 'sidebar', 'content', 'user_id'
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

	public function scopeIsSlug($query, $val)
	{
		return $query->where('slug', '=', $val);
	}

}