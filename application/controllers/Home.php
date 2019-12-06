<?php
use Carbon\Carbon;

class Home extends FrontController
{
	protected $viewDirectory = 'front/home/';
	protected $publicPermissionActive = TRUE;
	private $numberOfBlog = 3;

	public function index()
	{
		$this->load->helper('file');

		$instaFeed = new M_InstaFeed;
		$instaFeed->curlFeeds();

		$contentDir = $this->config->item('configurationDir') . 'static_content/';
		
		$blogs = M_Blog::with('meta', 'type')
			->orderBy('published_at', 'DESC')
			->take($this->numberOfBlog)->get();

		$promotion = M_Promotion::onGoing()->first();

		$sliderFile = $contentDir . 'slider.json';
		$sliders = read_file($sliderFile);
		if (! empty($sliders)) $sliders = json_decode($sliders);

		$servcieFile = $contentDir . 'service.json';
		$services = read_file($servcieFile);
		if (! empty($services)) $services = json_decode($services);

		$scheduleFile = $contentDir . 'schedule.json';
		$schedules = read_file($scheduleFile);
		if (! empty($schedules)) $schedules = json_decode($schedules);

		$teamFile = $contentDir . 'team.json';
		$teams = read_file($teamFile);
		if (! empty($teams)) $teams = json_decode($teams);

		$extraFile = $contentDir . 'extra.json';
		$extras = read_file($extraFile);
		if (! empty($extras)) $extras = json_decode($extras);

		$views = [
			'noticeBoard' => TRUE,
			'sliders' => $sliders,
			'services' => $services,
			'schedules' => $schedules,
			'teams' => $teams,
			'instaFeeds' => $instaFeed->getFeeds(),
			'blogs' => $blogs,
			'promotion' => $promotion,
			'instaFeedCode' => $instaFeed->getResponseCode(),
			'extras' => $extras,
			'transparantHeader' => TRUE,
			'contents' => [
				$this->viewDirectory . '_slider',
				$this->viewDirectory . '_subscribe',
				$this->viewDirectory . '_promotion_media',
				$this->viewDirectory . '_services',
				$this->viewDirectory . '_introduction',
				$this->viewDirectory . '_section_dental',
				$this->viewDirectory . '_section_healthcare',
				$this->viewDirectory . '_schedule',
				$this->viewDirectory . '_team',
				$this->viewDirectory . '_blog',
				$this->viewDirectory . '_extra',
				$this->viewDirectory . '_contact',
				$this->viewDirectory . '_promotion_dialog',
			]
		];
		$this->load->view(
			$this->masterTemplate,
			$this->getControllerViews($views)
		);
	}

	public function subscribe()
	{
		$subscriber = new M_Subscriber;
		$data = $subscriber->setData($_POST);
		$rules = $subscriber->getRules();

		$existedEmail = M_Subscriber::where('email', '=', $data['email'])
			->first();
		if (! empty($existedEmail)) {
			$result = $this->ajax_response->getInsertResult(FALSE);
			$result['message'] = '<span class="font-weight-semibold">Ups, something wrong !</span><br>
				You have subscribed to our newsletter and promotion with this email address.<br>
				Please enter another email address to subscribe.';
			echo json_encode($result);
			return;
		}

		// run validation
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

		$subscriber->create($data);
		$email = new M_Email_Queue;
		$voucherCode = strtoupper(substr(md5(microtime()),rand(0,26),6));
		$emailData = [
			'name' => $data['name'],
			'email' => $data['email'],
			'type' => 'subscription',
			'template' => 'subscription',
			'subject' => 'Confident Voucher : ' . $voucherCode,
			'message' => '<h4>Hi Admin Confident,</h4>
				<p><i>This System Notification for you</i></p>
				<p>
				We just received new subscription and issued <strong>Voucher ' . $voucherCode . '</strong> for : <br>
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
				Your email has been stored in our system.<br>
				We will send you discount voucher and our newsletter.<br>
				Thank you for subscribing.';
		echo json_encode($result);
	}

	public function post_email()
	{
		$email = new M_Email_Queue;
		$data = $email->setData($_POST);
		$rules = $email->getRules();

		$this->setValidation($rules, $data);
		if ($this->validation->run() == FALSE) {
			$result = $this->ajax_response->getInsertResult(FALSE);
			$result['message'] = '<span class="font-weight-semibold">Ups, something wrong !</span><br>
				An error has occurred during saving process.<br>
				Please check your input.' 
				. '<ul>' . validation_errors('<li>','</li>') . '</ul>';
			echo json_encode($result);
			return;
		}

		$data['created_at'] = Carbon::now();
		$data['updated_at'] = Carbon::now();
		$id = $email->insertGetId($data);

		$result = $this->ajax_response->getInsertResult(TRUE, NULL, TRUE);
		$result['callbackUrl'] = base_url('home/process_email/' . md5($id));
		$result['callback'] = 'processEmail';
		$result['message'] = '<span class="font-weight-semibold">Yey, success !</span><br>
				Thank you for sending us message.<br> Our representative will response to your email soon.<br>
				Just sit and tight :)';
		echo json_encode($result);
	}

	public function process_email($id = NULL)
	{
		$email = M_Email_Queue::findHashId($id)->first();
		if (empty($email)) {
			$result = [
				'status' => 'error',
				'message' => 'Data not found'
			];
			echo json_encode($result);
			return;
		}

		$this->load->library('email');
		if (! $email->is_reply) {
			if ($this->replyEmail($email) === TRUE) {
				$email->is_reply = TRUE;
				$email->save();
			}
		}

		if (! $email->is_saving) {
			if ($this->storeEmail($email) === TRUE) {
				$email->is_saving = TRUE;
				$email->save();
			}
		}

		$result = [
			'status' => 'success',
			'message' => 'Email sent'
		];
		echo json_encode($result);
	}

	public function email_tracker($id)
	{
		$blaster = M_Email_Blast::findHashId($id)->first();
		if (! empty($blaster)) {
			$blaster->is_read = TRUE;
			$blaster->save();
		}

		$filename = $this->config->item('siteAssetDir') . 'email-tracker.png';
		$mime = mime_content_type($filename);
		header('Content-Length: ' . filesize($filename));
		header("Content-Type: $mime");
		header('Content-Disposition: inline; filename="' . $filename . '";');
		readfile($filename);
		die();
		exit;
	}

	private function replyEmail($email)
	{
		$sender = $this->config->item('realEmail');
		$name = 'Confident Bali';
		$receiver = $email->email;
		$prefix = $email->type == 'chat' ? 'Response on : ' : '';
		$subject = $prefix . $email->subject;
		$viewFile = $this->config->item('emailTemplateDir') . $email->template;
		$body = $this->load->view($viewFile , ['email' => $email], TRUE);

		$this->email->from($sender, $name);
		$this->email->to($receiver);
		$this->email->subject($subject);
		$this->email->message($body);
		
		if ($this->email->send()) {
			return TRUE;
		}
		return FALSE;
	}

	private function storeEmail($email)
	{
		$name = ucwords($email->name);
		$sender = $email->email;
		$receiver = $this->config->item('realEmail');
		$bccEmails = ! empty( $this->config->item('bccEmails') ) ?
			$this->config->item('bccEmails') : NULL;
		$subject = $email->subject;
		$body = $email->message;

		$this->email->from($sender, $name);
		$this->email->to($receiver);
		if (isset($bccEmails) && ! is_null($bccEmails)) $this->email->bcc($bccEmails);
		$this->email->subject($subject);
		$this->email->message($body);
		
		if ($this->email->send()) {
			return TRUE;
		}
		return FALSE;
	}

	protected function getJsScripts()
	{
		$scripts = [ 
			$this->jsDirectory . 'home_vue',
			$this->jsDirectory . strtolower($this->controllerName),
			$this->jsDirectory . 'gmap',
			$this->jsDirectory . 'email',
		];
		return $scripts;
	}

	protected function getAdditionalViewData($record)
	{
		$views['externalScripts'] = [
			'https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.min.js',
			'https://cdn.jsdelivr.net/npm/vue-resource@1.4.0',
			'https://cdn.jsdelivr.net/lodash/4.13.1/lodash.min.js',
			'https://maps.googleapis.com/maps/api/js?key=AIzaSyCAZVtnB0oj4k0WaDPWVvWRebFymcGfVBY'
		];
		$views['homepageNavigation'] = TRUE;
		return $views;
	}
}