<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

class M_Menu extends Eloquent
{
	protected $table = 'menus';
	protected $fillable = ['nav_type', 'name', 'html_id', 'icon', 'is_internal', 'link', 'index', 'parent', 'is_login', 'permission_id'];
	protected $navigationTypes = [
		'backend' => 'backend',
		'frontend' => 'frontend'
	];
	protected $rules = [
		'nav_type' => [
			'field' => 'nav_type',
			'label' => 'Tipe Navigasi',
			'rules' => 'trim|required|max_length[20]'
		],
		'name' => [
			'field' => 'name',
			'label' => 'Nama',
			'rules' => 'trim|required|max_length[50]'
		],
		'html_id' => [
			'field' => 'html_id',
			'label' => 'HTML ID',
			'rules' => 'trim|required|max_length[50]'
		],
		'icon' => [
			'field' => 'icon',
			'label' => 'Icon',
			'rules' => 'trim|required|max_length[50]'
		],
		'link' => [
			'field' => 'link',
			'label' => 'Link',
			'rules' => 'trim|required'
		],
		'index' => [
			'field' => 'index',
			'label' => 'Index',
			'rules' => 'trim|numeric'
		],
	];


	public function permission()
	{
		return $this->belongsTo('M_Permission', 'permission_id');
	}

	public function menuParent()
	{
		return $this->belongsTo('M_Menu', 'parent');
	}

	public function getRules()
	{
		return $this->rules;
	}

	public function getNavigationTypes()
	{
		return $this->navigationTypes;
	}

	public function setData($input)
	{
		$data = [
			'name' => isset($input['name']) ? strtolower($input['name']) : '',
			'nav_type' => isset($input['nav_type']) ? strtolower($input['nav_type']) : '',
			'html_id' => isset($input['html_id']) ? strtolower($input['html_id']) : '',
			'icon' => isset($input['icon']) ? strtolower($input['icon']) : '',
			'is_internal' => isset($input['external']) ? 0 : 1,
			'link' => isset($input['link']) ? strtolower($input['link']) : '',
			'is_login' => isset($input['is_login']) && $input['is_login'] == 'on' ? 1 : 0,
			'permission_id' => isset($input['permission_id']) && $input['permission_id'] != '0' ? $input['permission_id'] : NULL,
		];

		if ($data['is_login'] == 1) $data['permission_id'] = NULL;

		return $data;
	}

	public function scopeGetRecords($query, $search) {
		$name = isset($search['name']) ? $search['name'] : '';
		$navType = isset($search['type']) ? $search['type'] : NULL;

		return $query->where('name', 'like', "%$name%")
			->isNavigationType($navType);
	}

	public function scopeIsNavigationType($query, $val)
	{
		if (is_null($val)) return;
		return $query->where('nav_type', '=', $val);
	}

}