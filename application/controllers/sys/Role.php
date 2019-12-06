<?php

class Role extends SysController
{
	protected $model = 'role';
	protected $modelObj = 'M_Role';
	protected $record = 'role';
	protected $records = 'roles';
	protected $activeMenu = 'back-sys-role';
	protected $viewDirectory = 'sys/role/';
	protected $jsDirectory = 'js/back/';
	protected $localPrivateMethod = [
		'permission' => 1,
		'permitted' => 1
	];


	public function edit($id = NULL)
	{
		$obj = new $this->modelObj;
		$record = $this->getRecord($obj, $id);
		if (empty($record)) {
			$this->showErrorPage();
			return;
		}

		$roleName = ucwords($record->name);
		$usersCount = $record->users->count();
		$views = [
			'content' => $this->viewDirectory . 'edit',
			$this->record => $record
		];

		if ($usersCount > 0) {
			$views['infoShow'] = TRUE;
			$views['infoMessage'] = '<span class="font-weight-semibold">Role ' . $roleName . '</span> saat ini telah di assign ke <span class="font-weight-semibold">' . $usersCount . ' users</span>. Melakukan perubahan terhadap data role akan merubah akses ke user-user terkait.';
		}

		$this->load->view($this->masterTemplate, $this->getControllerViews($views));
	}

	public function delete($id = NULL)
	{
		$obj = new $this->modelObj;
		$record = $this->getRecord($obj, $id);

		if (empty($record)) {
			echo json_encode( $this->ajax_response->getNotFoundResult('delete') );
			return;
		}

		$name = $this->getRecordName($record);

		if ($record->deleteable == 0) {
			$result = $this->ajax_response->getNotFoundResult('delete');
			$result['message'] = '<span class="font-weight-semibold">Ups, proses gagal !</span> Data role <span class="font-weight-semibold">' . $name . '</span> tidak dapat dihapus karena role bersifat <span class="font-weight-semibold">undeleteable</span>.';
			echo json_encode($result);
			return;
		}

		if ($record->users->count() > 0) {
			$result = $this->ajax_response->getNotFoundResult('delete');
			$result['message'] = '<span class="font-weight-semibold">Ups, proses gagal !</span> Data role <span class="font-weight-semibold">' . $name . '</span> tidak dapat dihapus karena ada <span class="font-weight-semibold">' . $record->users->count() . ' user </span> yang teregistrasi dengan role ' . $name . '.';
			echo json_encode($result);
			return;
		}

		$record->delete();
		$result = $this->ajax_response->getDeleteResult($name);
		$result['link'] = $this->getDeleteRefreshLink();
		echo json_encode($result);
	}

	public function permission($id = NULL)
	{
		$role = M_Role::with('permissions')->find($id);
		if (empty($role)) {
			$this->showErrorPage();
			return;
		}

		$permissions = M_Permission::orderBy('module', 'asc')
			->orderBy('controller', 'asc')
			->orderBy('method', 'asc')
			->get();

		$views = [
			'content' => $this->viewDirectory . 'permission',
			'role' => $role,
			'permissions' => $permissions
		];

		$this->load->view($this->masterTemplate, $this->getControllerViews($views));
	}

	public function permitted($id = NULL)
	{
		$role = M_Role::find($id);
		if (empty($role)) {
			echo json_encode( $this->ajax_response->getNotFoundResult('update') );
			return;
		}

		$permissions = isset($_POST['permissions']) ? $_POST['permissions'] : [];
		$role->permissions()->sync($permissions);

		$name = $this->getRecordName($role);
		$result = $this->ajax_response->getUpdateResult(TRUE);
		$result['message'] = '<span class="font-weight-semibold">Berhasil !</span> Permission untuk role <span class="font-weight-semibold">' . $name . '</span> telah disesuaikan dan disimpan di dalam sistem.';
		echo json_encode($result);
	}

	protected function getRecords($obj, $search, $skip, $take)
	{
		return $obj->withCount('users')
			->getRecords($search)
			->orderBy('name', 'asc')
			->skip($skip)->take($take)
			->get();
	}

	protected function getRules($obj , $input, $record = NULL)
	{
		$rules = $obj->getRules();

		if ($this->controllerMethod == 'update' && strtolower($input['name']) == $record->name) {
			unset($rules['name']);
		}

		return $rules;
	}

	protected function getAdditionalViewData($record)
	{
		$this->load->library('list_generator');
		$views = [
			'rolesStatus' => $this->list_generator->getModelStatus('status role'),
			'rolesDeleteStatus' => $this->list_generator->getRoleDeleteStatus()
		];
		return $views;
	}

	protected function setupSearch($input)
	{
		$search = [];
		if (isset($input['name']) && ! empty($input['name'])) $search['name'] = $input['name'];
		if (isset($input['status']) && $input['status'] != '99' ) $search['status'] = $input['status'];
		if (isset($input['deleted']) && $input['deleted'] != '99' ) $search['deleted'] = $input['deleted'];
		return $search;
	}

}