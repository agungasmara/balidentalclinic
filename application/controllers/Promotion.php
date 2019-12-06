<?php

use Carbon\Carbon;

class Promotion extends FrontController
{
	protected $viewDirectory = 'front/promotion/';
	protected $publicPermissionActive = TRUE;

	public function index($code = NULL)
	{
		$promotion = M_Promotion::onGoing()
			->where('code', '=', $code)
			->first();

		if (empty($promotion)) {
			$this->showErrorPage();
			return;
		}

		$views = [
			'promotion' => $promotion,
			'contents' => [
				$this->viewDirectory . '_promotion',
			]
		];

		$this->load->view(
			$this->masterTemplate,
			$this->getControllerViews($views)
		);
	}

	public function subscribe($code = NULL)
	{
		$promotion = M_Promotion::onGoing()
			->where('code', '=', $code)
			->first();

		if (empty($promotion)) {
			$result = $this->ajax_response->getNotFoundResult('update');
			$result['message'] = '<span class="font-weight-semibold">Ups, something wrong !</span><br>
				We can\'t find promotion that you requested.<br>Please check your promotion code or contact our Administrator.';
			echo json_encode($result);
			return;
		}

		$clientPromotion = new M_Client_Promotion;
		$data = $clientPromotion->setData($_POST);
		$data['promotion_id'] = $promotion->id;
		$rules = $clientPromotion->getRules();

		$this->setValidation($rules, $data);
		if ($this->validation->run() == FALSE) {
			$result = $this->ajax_response->getInsertResult(FALSE);
			$result['message'] = '<span class="font-weight-semibold">Ups, something wrong !</span><br>
				An error has occurred during saving process
				and we can\'t store yout email address.<br>
				Please enter valid name and email address and resubmit your request.';
			echo json_encode($result);
			return;
		}


		$record = M_Client_Promotion::findRecord($data['email'], $promotion->id)
			->first();

		if (! empty($record)) {
			$result =$this->ajax_response->getInsertResult(FALSE);
			$result['message'] = '<span class="font-weight-semibold">Ups, something wrong !</span><br>
				Your email already registered for this promotion.<br>Please check your email for promotion code or contact our Administrator.';
			echo json_encode($result);
			return;
		}

		$clientPromotion->create($data);

		$email = new M_Email_Queue;
		$voucherCode = strtoupper(substr(md5(microtime()),rand(0,26),6));
		$subject = ucwords($promotion->name);
		$emailData = [
			'name' => $data['name'],
			'email' => $data['email'],
			'type' => 'promotion',
			'template' => 'promotion_' . $promotion->email_template,
			'subject' => $subject . ' Voucher : ' . $voucherCode,
			'message' => '<h4>Hi Admin Confident,</h4>
				<p><i>This System Notification for you</i></p>
				<p>
				We just received new promotion request for ' . ucwords($subject) . ' campaign and issued <strong>Voucher ' . $voucherCode . '</strong> for : <br>
				Name : <strong>' . ucwords($data['name']) . '</strong><br>
				Email : <strong>' . $data['email'] . '</strong><br>
				</p>
				<p>
					Don\'t reply this email and thank you for using creactive email notification system
				</p>'
				
		];
		$data['created_at'] = Carbon::now();
		$data['updated_at'] = Carbon::now();
		$id = $email->insertGetId($emailData);

		$result = $this->ajax_response->getInsertResult(TRUE, NULL, TRUE);
		$result['callbackUrl'] = base_url('home/process_email/' . md5($id));
		$result['callback'] = 'processEmail';
		$result['message'] = '<span class="font-weight-semibold">Yey, success !</span><br>
				Thank you for response to our promotion.<br>
				We will send you our special offer via email.';
		echo json_encode($result);
	}

	protected function setData($obj, $input, $record = NULL)
	{
		$data = $obj->setData($input);
		$data = $this->sanitizeData($data, $record);

		// check if table store user id in sistem
		if ($this->includedUserIdLog) {
			$data[ $this->userIdLog ] = $this->loginSession['id'];
		}

		return $data;
	}

	protected function getJsScripts()
	{
		$scripts = [ 
			$this->jsDirectory . 'home',
			$this->jsDirectory . 'email',
		];
		return $scripts;
	}

}