<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

class M_Blog extends Eloquent
{
	protected $table = 'blogs';
	protected $fillable = [
		'slug', 'title', 'type_id', 'content', 'published_at', 'user_id'
	];
	protected $rules = [];


	public function type()
	{
		return $this->belongsTo('M_Blog_Type', 'type_id');
	}

	public function meta()
	{
		return $this->hasOne('M_Blog_Meta', 'blog_id');
	}

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