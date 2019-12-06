<?php

class MarketingController extends CrudController
{
	protected $moduleName = 'marketing';
	protected $controllerDirectory = 'marketing/';
	protected $masterTemplate = 'layout/back';
	protected $navigationType = 'backend';
	protected $jsDirectory = 'js/back/';
	protected $urlSearchSegment = 4;
}