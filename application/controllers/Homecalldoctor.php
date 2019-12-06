<?php

class Homecalldoctor extends FrontController
{
	protected $modelObj = 'M_Page';
	protected $record = 'page';
	protected $viewDirectory = 'front/homecalldoctor/';
	protected $activeMenu = 'front-homecalldoctor';
	protected $publicPermissionActive = TRUE;


	public function index()
	{
		$this->load->helper('file');
		$contentDir = $this->config->item('configurationDir') . 'static_content/';

		$servcieFile = $contentDir . 'homecall-doctor-service.json';
		$services = read_file($servcieFile);
		if (! empty($services)) $services = json_decode($services);

		$stepFile = $contentDir . 'homecall-doctor-step.json';
		$steps = read_file($stepFile);
		if (! empty($steps)) $steps = json_decode($steps);

		$views = [
			'services' => $services,
			'steps' => $steps,
			'contents' => [
				$this->viewDirectory . '_pageheader',
				$this->viewDirectory . '_promotion_media',
				$this->viewDirectory . '_services',
				$this->viewDirectory . '_how_it_work',
				$this->viewDirectory . '_steps',
				$this->viewDirectory . '_pricelist',
				$this->viewDirectory . '_cta',
			]
		];
		$this->load->view(
			$this->masterTemplate,
			$this->getControllerViews($views)
		);
	}

}