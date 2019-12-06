<?php
use Carbon\Carbon;

class User extends SysController
{
	protected $model = 'user';
	protected $modelObj = 'M_User';
	protected $record = 'user';
	protected $records = 'users';
	protected $activeMenu = 'back-sys-user';
	protected $viewDirectory = 'sys/user/';
	protected $jsDirectory = 'js/back/';


	public function insert()
	{
		$user = new M_User;
		$data = $this->setData($user, $_POST);
		$rules = $user->getRules();

		if (! isset($_POST['password_needed'])) {
			unset($rules['password_confirmation']);
			$data['password'] = $data['email'];
		}

		$this->setValidation($rules, $data);
		if ($this->validation->run() == FALSE) {
			echo json_encode( $this->ajax_response->getInsertResult(FALSE) );
			return;
		}

		$role = $data['role_id'];
		$data['password'] = md5($data['password']);
		$data['created_at'] = Carbon::now();
		$data['updated_at'] = Carbon::now();
		unset($data['password_confirmation']);
		unset($data['role_id']);

		$userId = $user->insertGetId($data);
		$user = M_User::find($userId);
		$user->roles()->attach($role);
		
		echo json_encode( $this->ajax_response->getInsertResult(TRUE, NULL, TRUE) );
	}

	public function update($id = NULL)
	{
		$user = M_User::find($id);

		if (empty($user)) {
			echo json_encode( $this->ajax_response->getNotFoundResult('update') );
			return;
		}

		$data = $this->setData($user, $_POST);
		$rules = $user->getRules();
		if ($user->email == $data['email']) unset($rules['email']);
		if (! isset($_POST['password_needed'])) {
			unset($rules['password']);
			unset($rules['password_confirmation']);
		}

		$this->setValidation($rules, $data);
		if ($this->validation->run() == FALSE) {
			echo json_encode( $this->ajax_response->getUpdateResult(FALSE) );
			return;
		}

		if (isset($_POST['password_needed'])) {
			$data['password'] = md5($data['password']);
		}
		$role = $data['role_id'];
		unset($data['password_confirmation']);
		unset($data['role_id']);

		$user->update($data);
		$user->roles()->sync([$role]);
		
		echo json_encode( $this->ajax_response->getUpdateResult(TRUE) );
	}

	protected function getRecords($obj, $search, $skip, $take)
	{
		return $obj->with('roles')
			->getRecords($search)
			->orderBy('first_name', 'asc')
			->orderBy('last_name', 'asc')
			->skip($skip)->take($take)
			->get();
	}

	protected function getRecordName($data)
	{
		return ucwords($data->first_name . ' ' . $data->last_name);
	}

	protected function getAdditionalViewData($record)
	{
		$this->load->library('list_generator');
		$views = [
			'statusList' => $this->list_generator->getModelStatus('status user'),
			'roles' => $this->list_generator->getRole()
		];

		return $views; 
	}

	protected function setData($obj, $input, $record = NULL)
	{
		$data = $obj->setData($input);

		$role = M_Role::find($data['role_id']);
		if (empty($role)) unset($data['role_id']);
		return $data;
	}

	protected function setupSearch($input)
	{
		$search = [];
		if (isset($input['name']) && ! empty($input['name'])) $search['name'] = $input['name'];
		if (isset($input['email']) && ! empty($input['email'])) $search['email'] = $input['email'];
		if (isset($input['type']) && $input['type'] != '0' ) $search['type'] = $input['type'];
		if (isset($input['role']) && $input['role'] != '0' ) $search['role'] = $input['role'];
		if (isset($input['actived']) && $input['actived'] != '99' ) $search['actived'] = $input['actived'];
		return $search;
	}

}