<?php

class Email_Template extends MarketingController
{
	protected $model = 'email template';
	protected $modelObj = 'M_Email_Template';
	protected $record = 'template';
	protected $records = 'templates';
	protected $activeMenu = 'back-marketing-email-template';
	protected $viewDirectory = 'marketing/email_template/';


	public function show($id = NULL)
	{
		$obj = new $this->modelObj;
		$record = $this->getRecord($obj, $id);
		if (empty($record)) {
			$this->showErrorPage();
			return;
		}

		$this->load->view('email_templates/' . $record->name);
	}

	protected function setupSearch($input)
	{
		$search = [];
		if (isset($input['name']) && ! empty($input['name'])) $search['name'] = $input['name'];
		if (isset($input['subject']) && ! empty($input['subject'])) $search['subject'] = $input['subject'];
		return $search;
	}

}