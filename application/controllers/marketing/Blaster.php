<?php

class Blaster extends MarketingController
{
	protected $model = 'email blast';
	protected $modelObj = 'M_Email_Blast';
	protected $record = 'blaster';
	protected $records = 'blasters';
	protected $activeMenu = 'back-marketing-blaster';
	protected $viewDirectory = 'marketing/blaster/';
	private $maxEmails = 5;
	protected $publicPermissionActive = TRUE;


	public function run()
	{
		set_time_limit(300);
		$blasters = M_Email_Blast::with('template')
			->needProcess()
			->take($this->maxEmails)
			->get();

		if (count($blasters) == 0) {
			echo 'email queue empty';
			return;
		}

		$this->load->library('email');
		$emailConfig = [
	        'smtp_host' => 'mail.balidentalclinic.com',
        	'smtp_port' => 465,
        	'smtp_user' => 'marketing@balidentalclinic.com',
        	'smtp_pass' => 'marketingconfident',  
	    ];
		$this->email->initialize($emailConfig);
		
		$blaster = $blasters->first();
		$subject = $blaster->template->subject;
		$sender = $this->config->item('realEmail');
		$name = 'Confident Clinic Bali';
		

		foreach ($blasters as $blaster) {
			$this->processingBlaster($blaster, TRUE);
			$receiver = $blaster->email;
			$receiverName = $blaster->name;

			$views = [
				'blaster' => $blaster,
				'imagesDir' => base_url(
						$this->config->item('emailImagesDir')
						. $blaster->template->name . '/'
					)
			];
			$template = $this->load->view(
					$this->config->item('emailTemplateDir')
					. $blaster->template->name,
					$views, TRUE
				);
			$body = $template;

			$this->email->from($sender, $name);
			$this->email->to($receiver);
			$this->email->subject($subject);
			$this->email->message($body);
			
			if ($this->email->send()) {
				$this->finishingBlaster($blaster, TRUE);
				echo 'success : ' . $blaster->email . '<br>';
				continue;
			}

			$this->processingBlaster($blaster, FALSE);
			echo 'fail : ' . $blaster->email . '<br>';
		}
		
		$blaster = M_Email_Blast::needProcess()->count();
		echo $blaster . ' emails waiting in queue';
	}

	private function processingBlaster($blaster, $val)
	{
		$blaster->is_process = $val;
		$blaster->save();
	}

	private function finishingBlaster($blaster, $val)
	{
		$blaster->is_finish = $val;
		$blaster->save();
	}

}