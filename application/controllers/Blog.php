<?php

class Blog extends FrontController
{
	protected $modelObj = 'M_Blog';
	protected $record = 'blog';
	protected $viewDirectory = 'front/blog/';
	protected $activeMenu = 'front-news';
	protected $publicPermissionActive = TRUE;


	protected function getRecord($obj, $id)
	{
		return $obj->with('type', 'meta')
			->isSlug($id)
			->first();
	}

	protected function getJsScripts()
	{
		$scripts = [ 
			'js/front/page',
			'js/front/email',
		];
		return $scripts;
	}

}