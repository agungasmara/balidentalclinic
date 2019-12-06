<?php

class Ajax_Response
{
	private $model;
	private $CI;

	public function __construct($params)
	{
		$this->CI =& get_instance();
		$this->model = $params['model'];
	}

	public function setModel($model)
	{
		$this->model = $model;
	}

	public function getInsertResult($success, $errors = NULL, $reset = FALSE)
	{
		$result = [];
		$result['reset'] = $reset;
		$result['csrf'] = [
			'name' => $this->CI->security->get_csrf_token_name(),
			'hash' => $this->CI->security->get_csrf_hash()
		];

		if (! $success) {
			$result['status'] = 'error';
			$result['message'] = $this->getInsertErrorMsg($errors);
			return $result;
		}

		$result['status'] = 'success';
		$result['message'] = $this->getInsertSuccessMsg();
		return $result;
	}

	public function getUpdateResult($success, $errors = NULL)
	{
		$result = [];
		$result['csrf'] = [
			'name' => $this->CI->security->get_csrf_token_name(),
			'hash' => $this->CI->security->get_csrf_hash()
		];

		if (! $success) {
			$result['status'] = 'error';
			$result['message'] = $this->getUpdateErrorMsg($errors);
			return $result;
		}

		$result['status'] = 'success';
		$result['message'] = $this->getUpdateSuccessMsg();
		return $result;
	}

	public function getDeleteResult($obj)
	{
		$result = [];
		$result['status'] = 'success';
		$result['message'] = $this->getDeleteSuccessMsg($obj);
		return $result;
	}

	public function getNotFoundResult($process)
	{
		$process = ($process == 'delete') ? 'deleting' : 'updating';

		$result = [
			'status' => 'error',
			'message' => ucwords($process) . ' has been terminated.<br>Record ' . $this->model . ' not found in the system',
			'csrf' => [
				'name' => $this->CI->security->get_csrf_token_name(),
				'hash' => $this->CI->security->get_csrf_hash()
			]
		];
		return $result;
	}

	private function getInsertErrorMsg($errors)
	{
		$message = ucwords($this->model) . ' can\'t be stored in the system.<br>Please check again your input :';
		$errors = is_null($errors) ? validation_errors('<li>','</li>') : $errors;
		$message .= '<ul>'. $errors .'</ul>';

		return $message;
	}

	private function getInsertSuccessMsg()
	{
		$message = '<span class="font-weight-semibold">Success !</span> ' . ucwords($this->model) . ' has been stored in the system.';
		return $message;
	}

	private function getUpdateErrorMsg($errors)
	{
		$message = ucwords($this->model) . ' can\'t be stored in the system.<br>Please check again your input :';
		$errors = is_null($errors) ? validation_errors('<li>','</li>') : $errors;
		$message .= '<ul>'. $errors .'</ul>';

		return $message;
	}

	private function getUpdateSuccessMsg()
	{
		$message = '<span class="font-weight-semibold">Success !</span>  ' . ucwords($this->model) . ' has been updated in the system';
		return $message;
	}

	private function getDeleteSuccessMsg($val)
	{
		$message = 'Data <span class="text-primary">' . ucwords($val) . '</span> has been deleted from the system<br>Please reload this page to see <span class="text-primary">data ' . $this->model .  ' has been updated</span>';
		return $message;
	}

}