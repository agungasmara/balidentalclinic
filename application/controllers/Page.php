<?php

class Page extends FrontController
{
	protected $modelObj = 'M_Page';
	protected $record = 'page';
	protected $viewDirectory = 'front/page/';
	protected $activeMenu = 'front-home';
	protected $publicPermissionActive = TRUE;


	public function show($id = NULL)
	{
		$obj = new $this->modelObj;
		$record = $this->getRecord($obj, $id);
		if (empty($record)) {
			$this->showErrorPage();
			return;
		}

		$_view = $record->sidebar ? 'show_with_sidebar' : 'show';

		$views = [
			'content' => $this->viewDirectory . $_view,
			$this->record => $record
		];

		$this->load->view($this->masterTemplate, $this->getControllerViews($views, $record));
	}

	protected function getRecord($obj, $id)
	{
		return $obj->isSlug($id)
			->first();
	}

	protected function getJsScripts()
	{
		$scripts = [ 
			$this->jsDirectory . strtolower($this->controllerName),
			$this->jsDirectory . 'email',
		];
		return $scripts;
	}

	protected function getAdditionalViewData($record)
	{
		$views = [
			'activeMenu' => $record->active_menu
		];
		return $views; 
	}

}