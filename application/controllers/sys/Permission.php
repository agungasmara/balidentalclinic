<?php

class Permission extends SysController
{
	protected $model = 'permission';
	protected $modelObj = 'M_Permission';
	protected $record = 'permission';
	protected $records = 'permissions';
	protected $activeMenu = 'back-sys-permission';
	protected $viewDirectory = 'sys/permission/';
	protected $jsDirectory = 'js/back/';


	protected function getRecords($obj, $search, $skip, $take)
	{
		return $obj->withCount('roles')
			->getRecords($search)
			->skip($skip)->take($take)
			->orderBy('name', 'asc')
			->get();
	}

	protected function getAdditionalViewData($record)
	{
		$this->load->library('list_generator');
		$views = [
			'permissionsStatus' => $this->list_generator->getModelStatus('status permission'),
			'modules' => $this->list_generator->getPermissionModule(),
			'controllers' => $this->list_generator->getPermissionController(),
			'methods' => $this->list_generator->getPermissionMethod(),
		];
		return $views;
	}

	protected function setupSearch($input)
	{
		$search = [];
		if (isset($input['name']) && ! empty($input['name'])) $search['name'] = $input['name'];
		if (isset($input['status']) && $input['status'] != '99') $search['status'] = $input['status'];
		if (isset($input['module']) && $input['module'] != '0') $search['module'] = $input['module'];
		if (isset($input['controller']) && $input['controller'] != '0') $search['controller'] = $input['controller'];
		if (isset($input['method']) && $input['method'] != '0') $search['method'] = $input['method'];
		return $search;
	}

}