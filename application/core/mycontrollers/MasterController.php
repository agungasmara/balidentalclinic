<?php

class MasterController extends CrudController
{
	protected $moduleName = 'master';
	protected $controllerDirectory = 'master/';
	protected $masterTemplate = 'layout/back';
	protected $navigationType = 'backend';
	protected $jsDirectory = 'js/back/';
	protected $urlSearchSegment = 4;
}