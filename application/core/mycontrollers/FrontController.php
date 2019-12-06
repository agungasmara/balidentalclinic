<?php

class FrontController extends CrudController
{ 
	protected $navigationType = 'frontend';
	protected $masterTemplate = 'layout/front';
	protected $jsDirectory = 'js/front/';
	

	protected function getControllerViews($input, $record = NULL)
	{
		$views = [
			'scripts' => $this->getJsScripts(),
			'navigation' => $this->navigation->getJsonMenu($this->navigationType),
			'activeMenu' => $this->activeMenu,
			'transparantHeader' => FALSE
		];

		return array_merge($this->getBaseViews(), $views, $this->getAdditionalViewData($record), $input);
	}

	protected function setCssFiles()
	{
		$this->cssFiles = [
			'../vendor/bootstrap/css/bootstrap.css',
			'../vendor/animate/animate.css',
			'../vendor/simple-line-icons/css/simple-line-icons.css',
			'../vendor/owl.carousel/assets/owl.carousel.min.css',
			'../vendor/owl.carousel/assets/owl.theme.default.min.css',
			'../vendor/magnific-popup/magnific-popup.css',
			'front/theme.css',
			'front/theme-elements.css',
			'front/theme-blog.css',
			'front/theme-shop.css',
			'../vendor/rs-plugin/css/settings.css',
			'../vendor/rs-plugin/css/layers.css',
			'../vendor/rs-plugin/css/navigation.css',
			'front/skin.css',
			'front/custom.css',
		];
	}

	protected function setJsFiles()
	{
		$this->jsFiles = [
			'../vendor/jquery/jquery.js',
			'../vendor/jquery.appear/jquery.appear.min.js',
			'../vendor/jquery.easing/jquery.easing.min.js',
			'../vendor/jquery-cookie/jquery-cookie.min.js',
			'../vendor/popper/umd/popper.js',
			'../vendor/bootstrap/js/bootstrap.min.js',
			'../vendor/common/common.min.js',
			'../vendor/jquery.gmap/jquery.gmap.min.js',
			'../vendor/jquery.lazyload/jquery.lazyload.min.js',
			'../vendor/isotope/jquery.isotope.min.js',
			'../vendor/owl.carousel/owl.carousel.min.js',
			'../vendor/magnific-popup/jquery.magnific-popup.min.js',
			'../vendor/vide/vide.min.js',
			'../vendor/jquery-form/jquery-form.min.js',
			'../vendor/select2/js/select2.js',
			'../vendor/jquery.autogrow/jquery.autogrow-textarea.js',
			'front/theme.js',
			'../vendor/rs-plugin/js/jquery.themepunch.tools.min.js',
			'../vendor/rs-plugin/js/jquery.themepunch.revolution.min.js',
			'front/theme.init.js',
			'back/app.js',
			'front/chat.js',
		];
	}
}