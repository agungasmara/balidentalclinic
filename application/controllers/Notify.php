<?php

class Notify extends CI_COntroller
{
	private $clientName = 'Confident Bali';

	public function about($method = NULL)
	{
		if (method_exists($this, $method)) {
			$params = [];
			call_user_func_array([$this, $method], $params);
		}
	}

	private function instafeed()
	{
		$instaFeed = new M_InstaFeed;
		$instaFeed->curlFeeds();
		if ($instaFeed->getResponseCode() == 400) {
			$error = M_Error_Email::isType('instafeed')
				->isToday()->count();

			if ($error == 0) {
				$data = [
					'type' => 'instafeed',
					'description' => 'can\'t get data from instagram account'
				];
				M_Error_Email::create($data);
				$this->load->library('email');
				
				$params = [
					'subject' => 'Insta Feed Error',
					'body' => 'notification/instafeed'
				];
				$this->sendEmail($params);
			}
		}

		$result = [
			'status' => 'success',
			'message' => 'Process done'
		];
		echo json_encode($result);
	}

	private function sendEmail($data)
	{
		$name = $this->clientName;
		$receiver = $this->config->item('notificationEmail');
		$subject = $data['subject'];
		$body = $this->load->view($data['body'], [], TRUE);

		$this->email->from($name);
		$this->email->to($receiver);
		$this->email->subject($subject);
		$this->email->message($body);
		$this->email->send();
	}

}