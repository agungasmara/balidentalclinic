<?php

class Dashboard extends AccountController
{
	protected $model = 'dashboard';
	protected $activeMenu = 'back-dashboard';
	protected $viewDirectory = 'account/dashboard/';
	protected $jsDirectory = 'js/back/';
	protected $privateMethod = [
		'index' => 0
	];

	public function index()
	{
		$views = [
			'content' => $this->viewDirectory . 'list',
		];

		$this->load->view($this->masterTemplate, $this->getControllerViews($views));
	}

}