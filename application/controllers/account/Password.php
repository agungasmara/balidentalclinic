<?php

class Password extends AccountController
{
	protected $model = 'password';
	protected $activeMenu = 'back-account-pass';
	protected $viewDirectory = 'account/';
	protected $jsDirectory = 'js/back/';
	protected $privateMethod = [
		'index' => 0,
		'update' => 0
	];

	public function index()
	{
		$views = [
			'content' => 'account/password/edit'
		];
		$this->load->view($this->masterTemplate, $this->getControllerViews($views));
	}

	public function update($id = NULL)
	{
		$userId = isset($this->loginSession['id']) ? $this->loginSession['id'] : NULL;

		$user = M_User::find($userId);
		$rules = $user->getPasswordRules();
		$data = $user->setPasswordData($_POST);

		$this->setValidation($rules, $data);
		if ($this->validation->run() == FALSE) {
			echo json_encode( $this->ajax_response->getUpdateResult(FALSE) );
			return;
		}

		if ($user->password !== md5($data['current'])) {
			$result = $this->ajax_response->getInsertResult(FALSE);
			$result['message'] = 'Password anda tidak dapat diganti karena password lama anda tidak sama dengan data yang tersimpan di database.<br>Silahkan ulangi masukan password lama anda.';

			echo json_encode($result);
			return;
		}

		$user->password = md5($data['new']);
		$user->save();
		$result = $this->ajax_response->getUpdateResult(TRUE);
		$result['message'] = '<span class="font-weight-semibold">Berhasil !</span> password anda tealh di-udpate. Untuk memastikan bahwa password anda telah ter-update, silahkan login ulang ke dalam sistem'; 
		echo json_encode($result);
	}

	public function reset()
	{

	}

	public function reset_reqeust($userId = NULL, $token =  NULL)
	{

	}

	public function change($userId = NULL, $token =  NULL)
	{

	}
}