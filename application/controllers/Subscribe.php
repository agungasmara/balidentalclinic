<?php

class Subscribe extends FrontController
{
	protected $viewDirectory = 'front/subscribe/';
	protected $publicPermissionActive = TRUE;

	public function index()
	{
		$views = [
			'contents' => [
				$this->viewDirectory . '_subscribe',
			]
		];
		$this->load->view(
			$this->masterTemplate,
			$this->getControllerViews($views)
		);
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