<?php
use Carbon\Carbon;

class Login extends BaseController
{
	protected $firstPage;


	public function __construct()
	{
		parent::__construct();
		$this->firstPage = $this->config->item('redirectingLoginPage');
	} 

	public function index($error = NULL)
	{
		if (isset($this->loginSession)) {
			redirect($this->firstPage);
			return;
		}

		$views['content'] = 'front/login/login';

		if (isset($error) && $error == 'invalid') {
			$views['errorMessage'] = '<span class="font-weight-bold">Username</span> dan <span class="font-weight-bold">password</span> Anda tidak sesuai. Silahkan ulangi kembali proses login';
			$views['errorShow'] = TRUE;
		}

		if (isset($error) && $error == 'inactive') {
			$views['errorMessage'] = '<span class="font-weight-bold">Akun</span> anda belum diaktifkan. Silahkan menghubungi Administrator untuk mengaktifkan akun Anda';
			$views['errorShow'] = TRUE;
		}

		$views = array_merge($views, $this->getBaseViews());
		$this->load->view('layout/basic', $views);
	}

	public function validate()
	{
		$email = $_POST['username'];
		$pass = $_POST['password'];
		$user = $this->auth->getUser($email);

		if (empty($user)) {
			$error = 'invalid';
			redirect('login/index/' . $error);
			return;
		}

		$valid = $this->auth->basicAuth($email, $pass);

		if (! $valid) {
			$error = 'invalid';
			redirect('login/index/' . $error);
			return;
		}
		
		$actived = $user->actived == 1 ? TRUE : FALSE;
		if (! $actived) {
			$error = 'inactive';
			redirect('login/index/' . $error);
			return;
		}

		$today = Carbon::now();
		$user->last_login_at = $today;
		$user->save();

		$this->auth->setupSession($email);
		redirect($this->firstPage);
	}

	public function destroy()
	{
		$this->session->unset_userdata('login_data');
		$this->session->sess_destroy();
		redirect('login');
	}

}